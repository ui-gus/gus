<?php
/**
 * @package GusPackage
 * subpackage Userpage
 * @author Brett Hitchcock <hitc8494@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

class Userpage extends Controller {
	function Userpage(){
		parent::Controller();
		$this->load->model('Page');
		$this->load->helper('url');
	}
	
	function index() {
		//$data['title'] = "User Page";
		//$data['heading'] = "User Page";
		//$data['query'] = $this->db->where( 'user.id', 4 );	
			
		$data['header'] = $this->Page->get_header('user');

			//$data['content'] = $this->Page->get_content('user');
		if( !$this->Page->authed() ){			
			$data['content'] = "You must be logged in to view this page.";			
		}	
		else{
			//$testsess = $this->session->sess_read();
			$data['content'] = "You are viewing the user page.<br><br>
					<u>Personal Info (with links to edit pages)</u><br>
					<ul>
					<li>Name: <br>
					<li>Age: <br>
					<li>Etc: <br><br>

					<li>Upload files<br>
					<li>Send messages<br>
					</ul>
					<br><br><br>Need to know:<br>
					<ul>					
					<li>User ID from Session to get personal info<br>
					<li>Groups the user is in (Group updates)<br>
					<li>Personal calendar events (Group info)<br>
					</ul>
					"	;
				
		}	


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
