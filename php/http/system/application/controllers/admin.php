<?php

/******************************************************************************
*Gus - Groups in a University Setting
 University of Idaho CS 384 - Spring 2011
 GusPHP Subteam
 File Authors:
		Colby Blair
		others!
******************************************************************************/

class Admin extends Controller {
	var $pdata; //page data
	var $testmode; //disables views on testing

	function Admin(){
		parent::Controller();	
		$this->load->model('Page');
		
		$this->testmode = false;

		//set page footer
		$this->pdata['footer'] = $this->Page->get_footer();
	}
	
	function index() {
		//set page name
		$page_name = "admin";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name);
		if(!$this->Page->authed()) {
			$this->load->view('login',$this->pdata,$this->testmode);
		}
		else {
			$this->load->view('admin',$this->pdata,$this->testmode);
		}
		return(true);
	}

	function test() {
		$page_name = 'admin';
		$this->load->library('unit_test');
		$this->testmode = true;

		//index
		echo $this->unit->run(true,$this->index(), 'index 01');
		echo $this->unit->run($this->pdata['content'], 
			$this->Page->get_content($page_name),
			'index 02');

		echo $this->unit->run(true, $this->load->view('login',$this->pdata,$this->testmode), 'admin login');
		
		echo $this->unit->run(true,$this->Page->authed(), 'admin auth');
		
		//needs more! who wrote all these other functions??
	}
}
