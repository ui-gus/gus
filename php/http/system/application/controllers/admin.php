<?php

class Admin extends Controller {
	var $pdata; //page data

	function Admin(){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->helper('form'); 
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
			$this->pdata['content'] .= "\n<br />Please Login.";
			$attributes = array('class' => 'email', 'id' => 'myform');
			$this->pdata['content'] .= "\n" . form_open('admin',$attributes);
			$this->pdata['content'] .= "\n" . form_input(array(
              		'name'        => 'un',
	              	'id'          => 'un',
              		'value'       => $un,
              		'maxlength'   => '20',
              		'size'        => '20',
			)
			);
			$this->pdata['content'] .= "\n<br />" . form_input(array(
              		'name'        => 'pw',
	              	'id'          => 'pw',
              		'value'       => '',
              		'maxlength'   => '20',
              		'size'        => '20',
			'type'	      => 'password'
			)
			);
			$this->pdata['content'] .= "\n<br />" . form_submit('login', 'Login');
			$this->load->view('login',$this->pdata);
		}
		else {
			$this->load->view('home',$this->pdata);
		}
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

}
