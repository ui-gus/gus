<?php

class Pages extends Controller {
	var $pdata; //page data

	function Pages (){
		parent::Controller();	
		$this->load->model('Page');
		$this->load->helper('form'); 
		//set page footer
		$this->pdata['footer'] = $this->Page->get_footer();	
	}
	
	function index() {
		//set page name
		$page_name = "pages";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name);
		if(!$this->Page->authed()) $this->load->view('login',$this->pdata);
		else {
			$this->load->view('home',$this->pdata);
			$this->pdata['content'] .= "\n<br />\n<br /><a href=\"pages/add\">Add Page</a>\n<br />";
		}
	}

	function add() {
		//set page name
		$page_name = "pages";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name);
		$this->load->view('page-add',$this->pdata);
	}

	function edit() {
	
	}
	
	function save() {
		$this->load->database('admin');
		//this of course needs way more handling
		$data = array('name' => $_POST['name'], 'content' => $_POST['content']);
		$this->db->insert('page',$data);
		//set page name
		$page_name = "pages";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		//footer already set
		$this->pdata['content'] = $this->Page->get_content($page_name);
		$this->load->view('page-save',$this->pdata);
	}
}
