<?php

class Search extends Controller {
	var $pdata;

	function Search(){
		parent::Controller();
		$this->load->model('Page');
		$this->load->helper('form');
		$this->pdata['footer'] = $this->Page->get_footer();		
	}
	
	function index() {
		$page_name = 'search';
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name); 
		$this->load->view('search',$this->pdata);
	}

	function testQuery(){
		$this->load->library('unit_test');
		$value = $this->db->select('title, content,');
		echo $this->unit->run();
		
	}
	
	
}
