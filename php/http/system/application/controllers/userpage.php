<?php

class Userpage extends Controller {

	function Userpage(){
		parent::Controller();
		
		$this->load->helper('url');
	}
	
	function index() {
		$data['title'] = "User Page";
		$data['heading'] = "User Page";
		$data['query'] = $this->db->get( 'user' );

		$this->load->view( 'userpage_view.php', $data );
	}

}
