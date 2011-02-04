<?php

/******************************************************************************
*Gus - Groups in a University Setting
 University of Idaho CS 384 - Spring 2011
 GusPHP Subteam
 File Authors:
                Colby Blair
******************************************************************************/

class Auth extends Controller {
	var $pdata; //page data

	function Auth(){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->helper('form'); 

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
			$this->load->view('login',$this->pdata);
		}
		else {
			$this->pdata['content'] .= "<br />
				<p>You are logged in.<br />\n";
			$this->load->view('home',$this->pdata);
		}
	}

	function logout() {
		$this->Page->logout();
		$page_name = "auth";
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name) 
		 . "<br />\nLogged out.<br />\n";
		$this->load->view('home',$this->pdata);
	}
}
