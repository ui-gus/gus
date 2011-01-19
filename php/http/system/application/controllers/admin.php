<?php

class Admin extends Controller {
	var $pdata; //page data

	function Admin()
	{
		parent::Controller();	
		$this->load->model('Page');
		
		//set page content
		$this->pdata['footer'] = $this->Page->get_footer();
	}
	
	function index() {
		//set page name
		$page_name = "admin";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		//footer already set
		if(!$this->Page->authed()) {
			$this->load->view('login',$this->pdata);
		}
		else {
			$this->load->view('home',$this->pdata);
		}
	}

	function groupview() {
		//set page name
		$page_name = "home";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		//footer already set
		$this->load->view('main',$this->pdata);
	}

}