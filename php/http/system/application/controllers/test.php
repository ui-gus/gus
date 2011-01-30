<?php

class Test extends Controller {
	var $pdata; //page data

	function Test() {
		parent::Controller();	
		$this->load->model('Page');
		//set page content
		$this->pdata['footer'] = $this->Page->get_footer();
	}
	
	function index() {
		//set page name
		$page_name = "test";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		//footer already set
		$this->load->view('home',$this->pdata);
	}
}
