<?php

class Admin extends Controller {
	var $pdata; //page data

	function Admin()
	{
		parent::Controller();	
		$this->load->model('Page');
		$this->load->helper('form'); 
		
		//set page content
		$this->pdata['footer'] = $this->Page->get_footer();
	}
	
	function index() {
		print_r($_POST);
		//set page name
		$page_name = "admin";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		//footer already set
		if(!$this->Page->authed()) {
			$attributes = array('class' => 'email', 'id' => 'myform');
			//$this->pdata['content'] .= "\n" . form_open('admin',$attributes);
			$this->pdata['content'] .= "\n" . form_input(array(
              		'name'        => 'username',
	              	'id'          => 'username',
              		'value'       => '',
              		'maxlength'   => '20',
              		'size'        => '20',
			)
			);
			$this->pdata['content'] .= "\n<br />" . form_input(array(
              		'name'        => 'password',
	              	'id'          => 'password',
              		'value'       => '',
              		'maxlength'   => '20',
              		'size'        => '20',
			'type'	      => 'password'
			)
			);
			$this->pdata['content'] .= form_submit('login', 'Login');
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
