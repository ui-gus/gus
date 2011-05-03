<?php

//functions here should be for testing models only (or everything except 
// controllers). 
/**
 * @package GusPackage
 * subpackage Test
 * @author Colby Blair <cblair@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */


class Test extends Controller {
	var $pdata; //page data

	function Test() {
		parent::Controller();	
		$this->load->model('Page');
		$this->load->library('unit_test');
		$page_name = "test";
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		$this->pdata['footer'] = $this->Page->get_footer();
	}
	
	function index() {
		$this->load->view('test', $this->pdata);
	}

	function page() { //test page model
		echo "This test logs you out.<br />";
		$this->Page->logout();

		//get_header
		//todo: add admin tests

		//login
		echo $this->unit->run(false,$this->Page->login("test","password"), 'login.1');
		echo $this->unit->run(true,$this->Page->login("test","ALT!hel6"), 'login.2');
	
		//authed
		echo $this->unit->run(true,$this->Page->authed(), 'authed.1');
	
		//save
		echo $this->unit->run(true,$this->Page->save(array("name" => "test",
								"content" => "Test content"
								)
							), 
					'save.1');	

		//get_content
		echo $this->unit->run("Test content",$this->Page->get_content("test"),"get_content.1");
		echo $this->unit->run("",$this->Page->get_content("testasfasfafafasdfafafa"),"get_content.2");

		//get_pagelist
		echo $this->unit->run(true,$this->Page->get_pagelist(), 'pagelist.1');

		//logout
		echo $this->unit->run(true,$this->Page->logout(), 'logout.1');
		
		
	}

	function group() {
		$this->load->model('Group');

		//get_grouplist
		echo $this->unit->run(true,$this->Group->get_grouplist(), 'get_grouplist.1');

		//save
		echo $this->unit->run("test_desc",$this->Group->save(
					array("name" => "test_group",
						"description" => "test_desc"
					)
				), 'save.1');

		//get_description
		echo $this->unit->run("test_desc",$this->Group->get_description("test_group"), 'get_description.1');
	}

	function user() {
		$this->load->model('User');
		$this->User->mode = "test";
		//get_userlist
		$this->unit->run(true,$this->User->get_userlist(), 'get_userlist.1');

		//save
		$this->unit->run("test_desc",$this->User->save(
					array("un" => "test_user",
						"pw" => "ALT!shf6"
					)
				), 'save.1');
	
		echo $this->unit->report();
	}

	function allModels() {
		$this->page();
		$this->group();
		$this->user();
	}
}
