<?php

class Pages extends Controller {
	var $pdata; //page data

	function Pages (){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->helper('form'); 
		$this->load->library('session');
		//set page footer
		$this->pdata['footer'] = $this->Page->get_footer();
		
		if(!$this->session->userdata('un')) {
			$this->load->view('login',$this->pdata);
		}

	}
	
	function index() {
		//set page name
		$page_name = "pages";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name);
		$this->pdata['content'] .= "\n<br />\n<br /><a href=\"pages/add\">Add Page</a>\n<br />";
		$this->load->view('home',$this->pdata);
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

	function edit() {
	
	}
}
