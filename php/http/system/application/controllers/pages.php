<?php

class Pages extends Controller {
	var $pdata; //page data

	function Pages (){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->helper('form');
		$page_name = 'pages';
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
		 "<a href=\"pages/add\">Add</a>\n<br />\n" . 
		 "<a href=\"pages/edit\">Edit</a>\n<br />" .
		 "<a href=\"pages/delete\">Delete</a>\n<br />";
		$this->load->view('home',$this->pdata);
	}

	function add() {
		$this->pdata['add_name'] = $this->pdata['add_content'] = "";
		if(!empty($_POST)) {
			$this->pdata['add_name'] = $_POST['name'];
			$this->pdata['add_content'] = $this->Page->get_content($_POST['name']);
		}
		$this->load->view('pages/add',$this->pdata);
	}

	function edit() {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->pdata['pagelist'] = $this->Page->get_pagelist(); 
		$this->load->view('pages/edit',$this->pdata);
	}

	function delete() {
                if(!empty($_POST)) { //delete mode
                 $this->load->database('admin');
                 if($this->db->delete('page',array('name' => $_POST['name']))) {
                        $this->pdata['content'] .= "<br />\nPage deleted."
                                . "<br />\n";
                 } else {
                        show_error('Page could not be delete');
                 }
                 $this->load->view('home',$this->pdata);
                } else { //list users to delete... mode...
                        $this->pdata['pagelist'] = $this->Page->get_pagelist();
                        $this->load->view('pages/delete',$this->pdata);
                }
        }
	
	function save() {
		$data = array('name' => $_POST['name'], 'content' => $_POST['content']);
		if($this->Page->save($data)) {
		 $this->pdata['content'] .= "Page saved successfully.<br />\n";
		} else {
		 show_error('Page could not be saved');
		}
		$this->load->view('pages/save',$this->pdata);
	}
}
