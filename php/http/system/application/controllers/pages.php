<?php
/**
 * @package GusPackage
 * subpackage Pages
 * @author Colby Blair <cblair@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */


class Pages extends Controller {
	var $pdata; //page data
	var $testmode;

	function Pages (){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->helper('form');
		$this->testmode = false;
		$this->load->model('tinyMCE');
		$page_name = 'pages';
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name); 
		$this->pdata['footer'] = $this->Page->get_footer();
		$this->pdata['tinyMCE'] = $this->tinyMCE->outputJScript(array("newpagecontent"));
	}

	//used for class wide reroute to login if not authed
	function _remap($method) {
		if(!$this->Page->authed() && $method != "test") {
			$this->load->view('login');
		} else {
			$this->$method();
		}
	}
	
	function index() {
		$this->pdata['content'] .= "\n<br />\n<br />" . 
		 "<a href=\"".site_url()."/pages/add\">Add</a>\n<br />\n" . 
		 "<a href=\"".site_url()."/pages/edit\">Edit</a>\n<br />" .
		 "<a href=\"".site_url()."/pages/delete\">Delete</a>\n<br />";
		$this->load->view('home',$this->pdata,$this->testmode);
		return(true);
	}

	function add() {
		$this->pdata['add_name'] = $this->pdata['add_content'] = "";
		if(!empty($_POST)) {
			$this->pdata['add_name'] = $_POST['name'];
			$this->pdata['add_content'] = $this->Page->get_content($_POST['name']);
		}
		$this->load->view('pages/add',$this->pdata,$this->testmode);
		return(true);
	}

	function edit() {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->pdata['pagelist'] = $this->Page->get_pagelist(); 
		$this->load->view('pages/edit',$this->pdata, $this->testmode);
		return(true);
	}

	function delete() {
                if(!empty($_POST)) { //delete mode
                 $this->load->database('admin');
		 unset($_POST['delete']); //dont need the delete button val
		 foreach($_POST as $name) {
                  if($this->db->delete('page',array('name' => $name))) {
                        $this->pdata['content'] .= "<br />\nPage $name deleted."
                                . "<br />\n";
			$status = true;
                  } else {
                        show_error("Page '$name' could not be delete");
			$status = false;
                  }
		 }
                 $this->load->view('home',$this->pdata,$this->testmode);
                } else { //list users to delete... mode...
                        $this->pdata['pagelist'] = $this->Page->get_pagelist();
                        $this->load->view('pages/delete',$this->pdata,$this->testmode);
			$status = true;
                }
		return($status);
        }
	
	function save() {
		$data = array('name' => $_POST['name'], 'content' => $_POST['content']);
		if($this->Page->save($data)) {
		 $this->pdata['content'] .= "Page saved successfully.<br />\n";
		 $success = true;
		} else {
		 show_error('Page could not be saved');
		 $success = false;
		}
		$this->load->view('pages/save',$this->pdata,$this->testmode);
		return($success);
	}
	
	function test() {
		$page_name = 'admin';
		$this->load->library('unit_test');
		$this->testmode = true;

		//index
		$this->unit->run(true,$this->index(), "index");
		$this->unit->run(true,$this->pdata['content'] != "", "index");

		//save
		unset($_POST);
		$this->unit->run(false,$this->save(), "save"); //should fail but doesn't
		$_POST['name'] = 'test'; $_POST['content'] = "Test content";
		$this->unit->run(true,$this->save(), "save");
		$_POST['name'] = 'test2'; $_POST['content'] = "Test content";
		$this->unit->run(true,$this->save(), "save");

		//add
		// view, not default data
		$this->unit->run(true,$this->add(), "add");
		// view, default data
		$_POST['name'] = 'test';
		$this->unit->run(true,$this->add(), "add");
		$this->unit->run("Test content",$this->pdata['content'], "add");

		//edit
		$this->unit->run(true,$this->edit(), "edit");
		$this->unit->run($this->Page->get_pagelist(),$this->pdata['pagelist'], "edit");

		//delete
		// list page to delete
		unset($_POST);
		$this->unit->run(true,$this->delete(), "delete");
		$this->unit->run($this->pdata['pagelist'], $this->Page->get_pagelist(),"delete");
		// non-existent page to delete
		$_POST = array("tesafasasdfafafa");
		$this->unit->run(false,$this->delete(), "delete");
		//delete real page
		$_POST = array("test2"); //delete page created by this test
		$this->unit->run(true,$this->delete(), "delete");


		echo $this->unit->report();
	}
}
