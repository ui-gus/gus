<?php
/**
 * @package GusPackage
 * subpackage Users
 * @author Colby Blair <cblair@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

class Users extends Controller {
	var $pdata; //page data
	var $testmode;

	function Users (){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->model('User');
		$this->load->helper('form');
		$this->testmode = false;
		$page_name = 'users';
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name); 
		$this->pdata['footer'] = $this->Page->get_footer();
	}

	//used for class wide reroute to login if not authed
	function _remap($method) {
		if(!$this->Page->authed() && $method != 'test') {
			$this->load->view('login');
		} else {
			$this->$method();
		}
	}
	
	function index() {
		$this->load->view('users/index',$this->pdata,$this->testmode);
		return(true); //really nothing to this one
	}

	function add() {
		$this->load->model('Group');
		$this->pdata['default_un'] = "";
		$this->pdata['grouplist'] = $this->Group->get_grouplist();	
		if(!empty($_POST)) {
			$this->pdata['default_un'] = $_POST['un'];
			$this->pdata['membershiplist'] = 
			$this->Group->get_membershiplist($_POST['un']);
		}
		$this->load->view('users/add',$this->pdata,$this->testmode);
		return(true);
	}

	function edit() {
		$this->pdata['userlist'] = $this->User->get_userlist();	
		$this->load->view('users/edit',$this->pdata,$this->testmode);
		return(true);
	}

	function delete() {
		if(!empty($_POST)) { //delete mode
		 $this->load->database('admin');
		 unset($_POST['delete']); //dont need the delete button val
		 foreach($_POST as $un) {
		  //if($this->db->delete('user',array('un' => $un))) {
		  if($this->User->delete(array('un' => $un))) {
		 	$this->pdata['content'] .= "<br />\nUser $un deleted."
				. "<br />\n";
		  } else {
			show_error("User '$un' could not be delete");
		  }
		 }
		 $this->load->view('home',$this->pdata,$this->testmode);
		} else { //list users to delete... mode...
			$this->pdata['userlist'] = $this->User->get_userlist();	
			$this->load->view('users/delete',$this->pdata,$this->testmode);
		}
	}
	
	function save() {
		$status = true;
		if(!$this->Page->is_pw_secure($_POST['pw'])) {//pw is not secure
			$this->pdata['content'] .= "Password was not " .
				"good enough. Please try again.<br >\n";
			$this->pdata['default_un'] = $_POST['un'];
			$this->load->view('users/add',$this->pdata,$this->testmode);
			$status = false;
		} else { //pw is secure
			$data = array('un' => $_POST['un'], 
					'pw' => $_POST['pw']);
			if($this->User->save($data)) {
				$this->pdata['content'] .= "User saved successfully.<br />\n";
				$this->load->model('Group');
				if(isset($_POST['grouplist'])) { //sync to groups
					foreach($_POST['grouplist'] as $key) { //add user to groups
					 $perm = array('read' => false,
							'write' => false,
							'execute' => false
						);
					 if(isset($_POST[$key])) {
					  $perm = array('read' => in_array('read',$_POST[$key]),
						   'write' => in_array('write',$_POST[$key]),
						   'execute' => in_array('execute',$_POST[$key])
							);
					  }
					 if($this->Group->add_member($key,$_POST['un'],$perm)) {
					  $this->pdata['content'] .= " Added to group $key<br />\n";
					 } else {
					  $this->pdata['content'] .= " ERROR: could not add to group.<br />\n";
					  $status = false;
					 }
					} //end add user to groups
				} //end sync user to groups
				foreach($this->Group->get_grouplist() as $key) { //delete user from groups
				 if(!isset($_POST['grouplist']) || !in_array($key,$_POST['grouplist'])) {
				  if($this->Group->delete_member($key,$_POST['un'])) {
				   $this->pdata['content'] .= " Deleted from group $key<br />\n";
				  } else {
				   $this->pdata['content'] .= " ERROR: could not delete from group $key.<br />\n";
				   $status = false;
				  }
				 }
				} //end delete user from groups
			} else {
				show_error('User could not be saved');
				$status = false;
			}
			$this->load->view('users/save',$this->pdata,$this->testmode);
		} //end if secure_pw
		return($status);
	}

	function test() {
		$this->load->library('unit_test');
		$this->testmode = true;

		//index
		$this->unit->run(true, $this->index(), 'index');
		//save
		// no data, fail test
		$this->unit->run(false, $this->save(), 'save');
		// insecure pw test
		$_POST['un'] = "test";
		$_POST['pw'] = "test";
		//$this->unit->run(false, $this->save(), 'save');
		// should save
		$_POST['un'] = "test";
		$_POST['pw'] = "test123";
		$this->unit->run(true, $this->save(), 'save');
		// group test
		$_POST['grouplist'] = array('test');
		$_POST['test'] = array('read' => false,
						'write' => false,
						'execute' => false
					);
		//$this->unit->run(true, $this->save(), 'save');
	
		//add
		// view add form
   		$this->unit->run(true, $this->add(), 'add');
   		// view add form with default data
		unset($_POST);
		$_POST['un'] = 'test';
		$this->unit->run(true, $this->add(), 'add');
		//edit
		$this->unit->run(true, $this->edit(), 'edit');
		$this->unit->run(true, 
			$this->pdata['userlist'] == $this->User->get_userlist(), 
			'edit');
		//delete
		$this->unit->run(true, $this->delete(), 'delete');
		
	
		echo $this->unit->report();
	}
}
