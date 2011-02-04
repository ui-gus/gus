<?php

class Grouppage extends Controller {

	function Grouppage(){
		parent::Controller();
		$this->load->model('Page');
		$this->load->helper('url');
	}
	
	function index() {
		$data['title'] = "Group Page";
		$data['heading'] = "Group Page";

		$data['header'] = $this->Page->get_header('groups');
		$data['content'] = $this->Page->get_content('groups');
		$data['footer'] = $this->Page->get_footer();				
			
		$this->load->view( 'grouppage_view.php', $data );

		
				
	}

	function test(){
		//set page name
		$this->load->library('unit_test');
                echo $this->unit->run('Gus Groups.',$this->Page->get_content('groups'), 'Userpage test');
		//$this->load->view('test', $this->pdata);	
	}	

}
