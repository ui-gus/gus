<?php

/**
 * Models Used: Page
 * Helpers Used: Form
 * Views Used: Login, Home
 * Libraries Used: Unit_test
 */

/**
 * @package GusPackage
 * subpackage Authorization
 * @author Colby Blair <cblair@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

class Auth extends Controller {
	var $pdata; //page data
	var $testmode;

	function Auth(){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->helper('form'); 
		$this->testmode = false;

		//set page footer
		$this->pdata['footer'] = $this->Page->get_footer();
	}

	//direct forms' POST here to login	
	function index() {
		$un = $pw = "";
		//handle POST data
		if(!empty($_POST)) {
			$this->Page->login($_POST['un'],$_POST['pw']);
		}
		//set page name
		$page_name = "auth";
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name);
		if(!$this->Page->authed()) {
			$this->load->view('login',$this->pdata,$this->testmode);
		}
		else {
			$this->pdata['content'] .= "<br />
				<p>You are logged in.<br />\n";
			$this->load->view('home',$this->pdata,$this->testmode);
		}
		return(true);
	}

	function logout() {
		$this->Page->logout();
		$page_name = "auth";
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name) 
		 . "<br />\nLogged out.<br />\n";
		$this->load->view('home',$this->pdata,$this->testmode);
		return(true);
	}

	function test() {
		$this->load->library('unit_test');
		$this->testmode = true;

		//index
		// not logged in, direct to login page
		echo "This test must log you out of your session. Sorry!<br />\n";
		$this->Page->logout();
                echo $this->unit->run(true,$this->index(), 'index.1');
                echo $this->unit->run(0,substr_count($this->pdata['content'],"logged in"),
					'index.2'
					);
		//attempting incorrectly to login
		$_POST['un'] = "test";
		$_POST['pw'] = 'password'; //wrong pw
                echo $this->unit->run(true,$this->index(), 'index.3');
                echo $this->unit->run(0,substr_count($this->pdata['content'],"logged in"),
					'index.4'
					);
		//attempting correctly to login
		$_POST['un'] = "test";
		$_POST['pw'] = 'ALT!shf6'; //right pw, probably should find a better way to
					   // store this. Shame on me
                echo $this->unit->run(true,$this->index(), 'index.4');
                echo $this->unit->run(true,0 < substr_count($this->pdata['content'],"logged in"),
					'index.5'
					);
		//reroute to the login page
                echo $this->unit->run(true,$this->index(), 'index.6');
                echo $this->unit->run(true,0 < substr_count($this->pdata['content'], "logged in"),
					'index.7'
					);	

		//logout
		echo $this->unit->run(true,$this->logout(), 'logout.1');
                echo $this->unit->run(true,0 < substr_count($this->pdata['content'],"Logged out"),
					'index.2'
					);
	}
}
