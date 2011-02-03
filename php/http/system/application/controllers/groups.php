<?php

class Groups extends Controller {
	var $pdata; //page data

	function Groups (){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->model('Group');
		$page_name = 'groups';
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
		 "<a href=\"groups/add\">Add</a>\n<br />\n" . 
		 "<a href=\"groups/edit\">Edit</a>\n<br />" .
		 "<a href=\"groups/delete\">Delete</a>\n<br />";
		$this->load->view('home',$this->pdata);
	}

	function add() {
		$this->pdata['default_name'] = $this->pdata['default_description'] = "";
		$this->pdata['content'] .= "<br />\nAdd Group.\n";
		if(!empty($_POST)) {
			$this->pdata['default_name'] = $_POST['name'];
			$this->pdata['default_description'] = $this->Group->get_description($_POST['name']);
		}
		$this->load->view('groups/add',$this->pdata);
	}

	function edit() {
		$this->pdata['grouplist'] = $this->Group->get_grouplist();	
		$this->load->view('groups/edit',$this->pdata);
	}

	function delete() {
		if(!empty($_POST)) { //delete mode
		 $this->load->database('admin');
		 unset($_POST['delete']); //dont need the delete button val
		 foreach($_POST as $name) {
		  if($this->db->delete('ggroup',array('name' => $name))) {
		 	$this->pdata['content'] .= "<br />\nGroup $name deleted."
				. "<br />\n";
		  } else {
			show_error("Group '$name' could not be delete");
		  }
		 }
		 $this->load->view('home',$this->pdata);
		} else { //list groups to delete... mode...
			$this->pdata['grouplist'] = $this->Group->get_grouplist();
			$this->load->view('groups/delete',$this->pdata);
		}
	}
	
	function save() {
		$this->load->database('admin');
		$data = array('name' => $_POST['name'], 'description' => $_POST['description']);
		if($this->Group->save($data)) {
		 $this->pdata['content'] .= "Group saved successfully.<br />\n";
		} else {
		 show_error('Group could not be saved');
		}
		$this->load->view('groups/save',$this->pdata);
	}
}
