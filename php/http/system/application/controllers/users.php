<?php

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
		$this->pdata['content'] .= "\n<br />\n<br />" . 
		 "<a href=\"users/add\">Add</a>\n<br />\n" . 
		 "<a href=\"users/edit\">Edit</a>\n<br />" .
		 "<a href=\"users/delete\">Delete</a>\n<br />";
		$this->load->view('home',$this->pdata);
	}

	function add() {
		$this->pdata['default_un'] = "";
		$this->pdata['content'] .= "<br />\nAdd User.\n";
		if(!empty($_POST)) {
			$this->pdata['default_un'] = $_POST['un'];
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
		  if($this->db->delete('user',array('un' => $un))) {
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
		$this->load->database('admin');
		$data = array('un' => $_POST['un'], 'pw' => $_POST['pw']);
		if($this->db->insert('user',$data)) {
		 $this->pdata['content'] .= "User saved successfully.<br />\n";
		} else {
		 show_error('User could not be saved');
		}
		$this->load->view('users/save',$this->pdata);
	}
}
