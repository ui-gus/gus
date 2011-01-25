<?php

class Userpage extends Controller {

	function Userpage(){
		parent::Controller();
		
		$this->load->helper('url');
	}
	
	function index() {
		$data['title'] = "User Page";
		$data['heading'] = "Something here";
		$data['query'] = $this->db->get( 'gusphp' );

		$this->load->view( 'userpage_view', $data );
	}

}
