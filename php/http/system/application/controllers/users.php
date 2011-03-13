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

	function Users (){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->model('User');
		$this->load->helper('form');
		$page_name = 'users';
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name); 
		$this->pdata['footer'] = $this->Page->get_footer();
	}

	//used for class wide reroute to login if not authed
	function _remap($method) {
		if(!$this->Page->authed()) {
			$this->load->view('login');
		} else {
			$this->$method();
		}
	}
	
	function index() {
		$this->load->view('users/index',$this->pdata);
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
		$this->load->view('users/add',$this->pdata);
	}

	function edit() {
		$this->pdata['userlist'] = $this->User->get_userlist();	
		$this->load->view('users/edit',$this->pdata);
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
		 $this->load->view('home',$this->pdata);
		} else { //list users to delete... mode...
			$this->pdata['userlist'] = $this->User->get_userlist();	
			$this->load->view('users/delete',$this->pdata);
		}
	}
	
	function save() {
		if(!$this->Page->is_pw_secure($_POST['pw'])) {//pw is not secure
			$this->pdata['content'] .= "Password was not " .
				"good enough. Please try again.<br >\n";
			$this->pdata['default_un'] = $_POST['un'];
			$this->load->view('users/add',$this->pdata);
						//$this->testmode);
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
					 }
					} //end add user to groups
				} //end sync user to groups
				foreach($this->Group->get_grouplist() as $key) { //delete user from groups
				 if(!isset($_POST['grouplist']) || !in_array($key,$_POST['grouplist'])) {
				  if($this->Group->delete_member($key,$_POST['un'])) {
				   $this->pdata['content'] .= " Deleted from group $key<br />\n";
				  } else {
				   $this->pdata['content'] .= " ERROR: could not delete from group $key.<br />\n";
				  }
				 }
				} //end delete user from groups
			} else {
				show_error('User could not be saved');
			}
			$this->load->view('users/save',$this->pdata);
		} //end if secure_pw
	}
}
