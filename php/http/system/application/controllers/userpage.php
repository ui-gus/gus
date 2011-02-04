<?php

class Userpage extends Controller {
	function Userpage(){
		parent::Controller();
		$this->load->model('Page');
		$this->load->helper('url');
	}
	
	function index() {
		$data['title'] = "User Page";
		$data['heading'] = "User Page";
		//$data['query'] = $this->db->where( 'user.id', 4 );
		//$data['query'] = $this->db->get( 'user' );	
			
		$data['header'] = $this->Page->get_header('user');
		$data['content'] = $this->Page->get_content('user');
		$data['footer'] = $this->Page->get_footer();				
						
		$this->load->view( 'userpage_view.php', $data );

		
	}

	function test() {
		//set page name
		$this->load->library('unit_test');
                echo $this->unit->run('Gus User Page.',$this->Page->get_content('user'), 'Userpage test');
		//$this->load->view('test', $this->pdata);	
	}	
	
}
