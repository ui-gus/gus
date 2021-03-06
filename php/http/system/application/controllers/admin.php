<?php

/**
 * @package GusPackage
 * subpackage Admin
 * @author Colby Blair <cblair@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

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

	function _remap($method) {
		if(!$this->Page->is_user_admin() && $method != "test") {
			$page_name = "admin";
			$this->pdata['header'] = 
				$this->Page->get_header($page_name);
			$this->pdata['content'] = 
				"You must be an admin to do that.<br />\n";
			$this->load->view('home',$this->pdata);
		} else {
			$this->$method();
		}
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
	
	function groups()	{
		$page_name = "admin";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		

		$this->load->view('groups/main',$this->pdata, $this->testmode);
		return(true);
	}
	
	function users()	{
		$page_name = "admin";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		
		$this->pdata['content'] .= "\n<br />\n<br />" . 
		 "<a href=\"".site_url()."/users/add\">Add</a>\n<br />\n" . 
		 "<a href=\"".site_url()."/users/edit\">Edit</a>\n<br />" .
		 "<a href=\"".site_url()."/users/delete\">Delete</a>\n<br />";

		$this->load->view('home',$this->pdata, $this->testmode);
		return(true);
	}
	
	function forums()	{
		$page_name = "admin";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		

		$this->load->view('home',$this->pdata, $this->testmode);
		return(true);
	}
	
	function pages()	{
		$page_name = "admin";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		

		$this->load->view('home',$this->pdata, $this->testmode);
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
		
		echo $this->unit->run(true,$this->groups(), 'admin groups');
		
		echo $this->unit->run(true,$this->users(), 'admin users');
		
		//these are do nothing funcs and may be gotten rid of	
		echo $this->unit->run(true,$this->forums(), 'admin forums');
		
		echo $this->unit->run(true,$this->pages(), 'admin pages');
	}
}
