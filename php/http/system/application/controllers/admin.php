<?php
/**
 * Gus - Groups in a University Setting
 * University of Idaho CS 384 - Spring 2011
 * GusPHP Subteam
 * File Authors:
 * @author Colby Blair <cblair@vandals.uidaho.edu>
 * Documentation:
 *              Cynthia Rempel
 * Models used: Page
 * Views used: login, admin, groups/main, home
 * Libraries used: unit_test
 * @package GusPackage
 */


/**
 * @package GusPackage
 * @subpackage Admin
 * @author Colby Blair <cblair@vandals.uidaho.edu>
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
		
		echo $this->unit->run(true,$this->users(), 'admin forums');
		
		
	}
}
