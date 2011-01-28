<?php

class Admin extends Controller {
	var $pdata; //page data

	function Admin(){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->library('session');

		//set page footer
		$this->pdata['footer'] = $this->Page->get_footer();
	}
	
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
		$page_name = "admin";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name);
		if(!$this->session->userdata('un')) {
			$this->load->view('login',$this->pdata);
		}
		else {
			$this->pdata['content'] .= "<br /><br />
				<a href=\"groups\">Groups</a>\n<br />
				<a href=\"users\">Users</a>\n<br />
				<a href=\"pages\">Server Pages</a>\n<br />";
			$this->load->view('home',$this->pdata);
		}
	}
	function groupsearch() {
		//set page name
		$page_name = "Admin - Search Groups";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		//footer already set
		$this->load->view('admin/group_search',$this->pdata);
	}
	function groupview() {
		//set page name
		$page_name = "home";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		//footer already set
		$this->load->view('main',$this->pdata);
	}
	function groupadd() {
		//set page name
		$page_name = "home";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		//footer already set
		$this->load->view('main',$this->pdata);
	}
	function groupedit() {
		//set page name
		$page_name = "home";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		//footer already set
		$this->load->view('main',$this->pdata);
	}
	function groupremove() {
		//set page name
		$page_name = "home";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		//footer already set
		$this->load->view('main',$this->pdata);
	}
}
