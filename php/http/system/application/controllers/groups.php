<?php

/**
 * Uses: database('admin')
 * Models Used: Page, Group
 * Views Used: Login, groups/main, groups/add, groups/edit, home
 * groups/delete, groups/save
 * @package GusPackage
 */

/**
 * @package GusPackage
 * subpackage Groups
 * @author Colby Blair <cblair@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

class Groups extends Controller {
	var $pdata; //page data
	var $testmode;

	function Groups (){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->model('Group');
		$page_name = 'groups';
		$this->testmode = false;
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name); 
		$this->pdata['footer'] = $this->Page->get_footer();
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
		$this->load->view('groups/main',$this->pdata, $this->testmode);
		return(true);
	}

	function add() {
		$this->pdata['default_name'] = $this->pdata['default_description'] = "";
		if(!empty($_POST)) {
			$this->pdata['default_name'] = $_POST['name'];
			$this->pdata['default_description'] = $this->Group->get_description($_POST['name']);
		}
		$this->load->view('groups/add',$this->pdata,$this->testmode);
		return(true);
	}

	function edit() {
		$this->pdata['grouplist'] = $this->Group->get_grouplist();	
		$this->load->view('groups/edit',$this->pdata,$this->testmode);
		return(true);
	}

	function delete() {
		if(!empty($_POST)) { //delete mode
		 $this->load->database('admin');
		 unset($_POST['delete']); //dont need the delete button val
		 foreach($_POST as $name) {
		  if($this->db->delete('ggroup',array('name' => $name))) {
		 	$this->pdata['content'] .= "<br />\nGroup $name deleted."
				. "<br />\n";
		  } else {
			show_error("Group '$name' could not be delete");
		  }
		 }
		 $this->load->view('home',$this->pdata,$this->testmode);
		} else { //list groups to delete... mode...
			$this->pdata['grouplist'] = $this->Group->get_grouplist();
			$this->load->view('groups/delete',$this->pdata,$this->testmode);
		}
		return(true);
	}
	
	function save() {
		$this->load->database('admin');
		if(empty($_POST)) return(false);
		$data = array('name' => $_POST['name'], 'description' => $_POST['description']);
		if($this->Group->save($data)) {
		 $this->pdata['content'] .= "Group saved successfully.<br />\n";
		} else {
		 show_error('Group could not be saved');
		}
		$this->load->view('groups/save',$this->pdata,$this->testmode);
	}

	function test() {
		$page_name = "groups";
                $this->load->library('unit_test');
                $this->testmode = true;

                //index
                echo $this->unit->run(true,$this->index(), 'index.1');
                echo $this->unit->run($this->Page->get_content($page_name)
					,$this->pdata['content'], 'index.2');

		//add
                echo $this->unit->run(true,$this->add(), 'add.1');
                echo $this->unit->run("",$this->pdata['default_name'],'add.2');
                echo $this->unit->run("",$this->pdata['default_description'],'add.3');
                //forms automatically populated
		$_POST['name'] = "test";
                echo $this->unit->run(true,$this->add(), 'add.4');
		echo $this->unit->run("test",$this->pdata['default_name'], 'add.5');
                echo $this->unit->run("test_desc",$this->pdata['default_description'], 'add.6');
	
		//save
		// nothing to save
		unset($_POST);
		echo $this->unit->run(false,$this->save(), 'save.1');
		// real save test
		$_POST['name'] = "test2"; // will be deleted in delete test
		$_POST['description'] = 'test2';
		echo $this->unit->run(false,$this->save(), 'save.2');

	
		//edit
                echo $this->unit->run(true,$this->edit(), 'edit.1');
		echo $this->unit->run($this->pdata['grouplist'],$this->Group->get_grouplist(),'edit.2');
		echo $this->unit->run(false,empty($this->pdata['grouplist']),'edit.3');

		//delete
		// display groups to delete
		unset($_POST);
		echo $this->unit->run(true,$this->delete(), 'delete.1');
		echo $this->unit->run($this->pdata['grouplist'],$this->Group->get_grouplist(),'delete.2');
		echo $this->unit->run(false,empty($this->pdata['grouplist']),'delete.3');
		// delete page
		$this->pdata['grouplist'] = array();
		$_POST['delete_test2'] = "test2";
		echo $this->unit->run(true,$this->delete(), 'delete.4');
		echo $this->unit->run(true,empty($this->pdata['grouplist']),'delete.5');
		
	}
}
