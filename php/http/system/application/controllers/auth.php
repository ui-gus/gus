<?php

class Auth extends Controller {
	var $pdata; //page data

	function Auth(){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->helper('form'); 
		$this->load->library('session');

		//set page footer
		$this->pdata['footer'] = $this->Page->get_footer();
	}

	//direct forms' POST here to login	
	function index() {
		$un = $pw = "";
		//handle POST data
		if(!empty($_POST)) {
			$un = $_POST['un']; 
			if($this->Page->login($un,$_POST['pw'])) {
				$this->session->set_userdata('un', $un);
			}
		}
		//set page name
		$page_name = "auth";
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name);
		if(!$this->session->userdata('un')) {
			$this->load->view('login',$this->pdata);
		}
		else {
			$this->pdata['content'] .= "<br />
				<p>You are already logged in.<br />\n";
			$this->load->view('home',$this->pdata);
		}
	}

	function logout() {
		$this->session->sess_destroy();
		$page_name = "auth";
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name) . "Logged out.<br />\n";
		$this->load->view('home',$this->pdata);
	}
}
