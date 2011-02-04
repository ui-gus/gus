<?php

//functions here should be for testing models only (or everything except 
// controllers). 

class Test extends Controller {
	var $pdata; //page data

	function Test() {
		parent::Controller();	
		$this->load->model('Page');
		$page_name = "test";
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		$this->pdata['footer'] = $this->Page->get_footer();
	}
	
	function index() {
		//set page name
		$this->load->library('unit_test');
                //echo $this->unit->run('test',$this->Page->get_content('test'), 'Home test');
		$this->load->view('test', $this->pdata);
	}

	function page() { //test page model
}
