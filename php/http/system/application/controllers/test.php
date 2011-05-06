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

		//add_member
		$perm = array('read' => true, 'write' => true, 'execute' => true);
		echo $this->unit->run(true,
		 $this->Group->add_member('test_group', 'test_user',$perm),
		 'add_member - test_user');

		//get_grouplist
		echo $this->unit->run(true,$this->Group->get_grouplist(), 'get_grouplist.1');
		
		//get_membershiplist
		// empty list
		echo $this->unit->run(false,$this->Group->get_membershiplist('fake'), 				'empty get_membershiplist');
		// test user in test_group
		echo $this->unit->run(true,
		 array_key_exists('test_group',
			$this->Group->get_membershiplist('test_user')),
 		 'get_membershiplist test user');
		$perm = array('read' => true, 'write' => true, 'execute' => true);
		$groups = $this->Group->get_membershiplist('test_user');
		echo $this->unit->run(true,$groups['test_group'] == $perm,
 		 'get_membershiplist test user 2');


		//save
		echo $this->unit->run("test_desc",$this->Group->save(
					array("name" => "test_group",
						"description" => "test_desc"
					)
				), 'save.1');

		//get_description
		echo $this->unit->run("test_desc",$this->Group->get_description("test_group"), 'get_description.1');

		//get_id
		//false group		
		echo $this->unit->run("",
			$this->Group->get_id("fake"), 
			'get_id failure');
		// true group
		echo $this->unit->run(5,
			$this->Group->get_id("test_group"), 
			'get_id');

		//get_perm
		// true admin
		echo $this->unit->run(7,
			$this->Group->get_perm("test_user","test_group"), 
			'get_perm');
		// no perm
		echo $this->unit->run(0,
			$this->Group->get_perm("test_user","main"), 
			'get_perm');
		
		//delete_member
		echo $this->unit->run(true,
		 $this->Group->delete_member('test_group', 'test_user'),
		 'delete_member - test_user');

	}

	function user() {
		$this->load->model('User');
		$this->User->mode = "test";

		//save
		$this->unit->run("test_desc",$this->User->save(
					array("un" => "test_user",
						"pw" => "ALT!shf6"
					)
				), 'save.1');

		//get_profile
		// bad id
		$this->unit->run(false,
		 $this->User->get_profile($this->User->get_id('fake')),
		 'get_profile - fake');
		// good id
		$this->unit->run(true,
		 false !== $this->User->get_profile($this->User->get_id('test_user')),
		 'get_profile - test_user');

		//get_userlist
		$this->unit->run(true,$this->User->get_userlist(), 'get_userlist.1');

		//get_id
		// true id
		$this->unit->run(false,"" === $this->User->get_id('test_user'), 'get_id - test_user1');
		// bad id
		$this->unit->run(false,$this->User->get_id('fake'), 'get_id - fake');

		//get_name
		$this->unit->run(true,
		 "test_user" === $this->User->get_name($this->User->get_id('test_user')), 'get_name - test_user');
		$this->unit->run(false,
		 $this->User->get_name($this->User->get_id('fake')), 'get_name - fake');

		//delete
		$this->unit->run(true,
		 $this->User->delete(array('un' => 'test_user')), 
		 'delete - test_user');
	
		echo $this->unit->report();
	}

	function images() {
		$this->load->model('Images');	
		$this->load->model('User');
		$this->load->model('Group');

		//get_users_pics
		// full array
		$this->unit->run(true,
		 $this->Images->get_users_pics($this->User->get_id('test_user')),
		 'get_users_pics - test_user');
		// empty array
		$this->unit->run(false,
		 $this->Images->get_users_pics($this->User->get_id('fake')),
		 'get_users_pics - fake');

		//get_groups_pics
		// full array
		$this->unit->run(true,
		 $this->Images->get_groups_pics($this->Group->get_id('test_group')),
		 'get_groups_pics - test_group');
		// empty array
		$this->unit->run(false,
		 $this->Images->get_groups_pics($this->Group->get_id('fake')),
		 'get_groups_pics - fake');
	
		//get_groups_files
		// full array
		$this->unit->run(true,
		 $this->Images->get_groups_files($this->Group->get_id('test_group')),
		 'get_groups_pics - test_group');
		// empty array
		$this->unit->run(false,
		 $this->Images->get_groups_files($this->Group->get_id('fake')),
		 'get_groups_files - fake');

		echo $this->unit->report();
	}

	function tinymce() {
		$this->load->model('tinyMCE');	

		$tiny = $this->tinyMCE->outputJScript(array("newpagecontent"),1);	
		$this->unit->run(false,true,'test button1');
		$this->unit->run(false,true,'test button2');
		$this->unit->run(false,true,'test remaining buttons');

		echo $this->unit->report();
	}

	function usergroup() {
		$this->load->model('UserGroup');

		
		$this->unit->run(false,$this->UserGroup->save(array('un' => 'test_user')),'save valid');
		$this->unit->run(false,$this->UserGroup->save(array('un' => 'test_user')),'save invalid');
		$this->unit->run(false,$this->UserGroup->delete(array()),'delete valid');
		$this->unit->run(false,$this->UserGroup->delete(array()),'delete invalid');

		echo $this->unit->report();
	}

	function allModels() {
		$this->page();
		$this->group();
		$this->user();
		$this->images();
		$this->tinymce();
		$this->usergroup();
	}
}
