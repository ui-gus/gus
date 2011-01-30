<?php

class Pages extends Controller {
	var $pdata; //page data

	function Pages (){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->helper('form'); 
		//set page footer
		$this->pdata['footer'] = $this->Page->get_footer();	
	}
	
	function index() {
		//set page name
		$page_name = "pages";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name);
		if(!$this->Page->authed()) $this->load->view('login',$this->pdata);
		else {
			$this->pdata['content'] .= "\n<br />\n<br />" . 
			"<a href=\"pages/add\">Add</a>\n<br />\n" . 
			"<a href=\"pages/edit_delete\">Edit/Delete</a>\n<br />";
			$this->load->view('home',$this->pdata);
		}
	}

	function add() {
		//set page name
		$page_name = "pages";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name);
		$this->load->view('page-add',$this->pdata);
	}

	function edit_delete() {
		//set page name
		$page_name = "pages";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name);
		$this->Page->get_pagelist();
		$this->load->view('page-add',$this->pdata);
	}
	
	function save() {
		//set page name
		$page_name = "pages";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name) . "<br />\n";
		$data = array('name' => $_POST['name'], 'content' => $_POST['content']);
		if($this->Page->save($data)) {
		 $this->pdata['content'] .= "Page saved successfully.<br />\n";
		} else {
		 show_error('Page could not be saved');
		}
		$this->load->view('page-save',$this->pdata);
	}
}
