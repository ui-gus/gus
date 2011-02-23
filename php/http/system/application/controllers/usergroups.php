<?php
/**
 * @package GusPackage
 * subpackage UserGroup
 * @author Colby Blair <cblair@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

/**
 * @package usergroups
 */
class UserGroups extends Controller {
	/**
	* @access private
	* @var string
	*/
	var $pdata; //page data

	function UserGroups (){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->model('UserGroup');
		//$this->load->helper('form');
		$page_name = 'usergroups';
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name); 
		$this->pdata['footer'] = $this->Page->get_footer();
	}

	/**
	* used for class wide reroute to login if not authed
	*/
	function _remap($method) {
		if(!$this->Page->authed()) {
			$this->load->view('login');
		} else {
			$this->$method();
		}
	}
	
	function index() {
		$this->load->view('usergroups/index',$this->pdata);
	}

	function add() {
		$this->load->model('User');
		$this->load->model('Group');
		$this->pdata['content'] .= "<br />\nAdd User(s) to Group(s).\n";
		$this->pdata['userlist'] = $this->User->get_userlist();
		$this->pdata['grouplist'] = $this->Group->get_grouplist();
		$this->load->view('usergroups/add',$this->pdata);
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
		//secure pw check
		$this->load->database('admin');
		$data = array('un' => $_POST['un'], 
				'pw' => $_POST['pw']);
		if($this->User->save($data)) {
		 $this->pdata['content'] .= "User saved successfully.<br />\n";
		} else {
			 show_error('User could not be saved');
		}
		$this->load->view('users/save',$this->pdata);
	}
}
