<?php
/**
 * Uses Models: Page
 * Uses Helpers: url
 * @package GusPackage
 * Uses Views: grouppage_view
 * Uses Libraries: unit_test
 */

/**
 * @package GusPackage
 * subpackage GroupPage
 * @author Brett Hitchcock <hitc8494@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */


class Grouppage extends Controller {

	function Grouppage(){
		parent::Controller();
		$this->load->model('Page');
		$this->load->helper('url');
	}
	
	function index() {
		//$data['title'] = "Group Page";
		//$data['heading'] = "Group Page";
		//$data['content'] = $this->Page->get_content('groups');
	

		$data['header'] = $this->Page->get_header('groups');
		
		if( !$this->Page->authed() ){
			$data['content'] = "You must be logged in to view this page.";
		}				
		else{			
			$data['content'] = "You are viewing the group page.<br><br>
				<u>Group Info (with links)</u><br>
				<ul>
				<li>Group name:<br>
				<li>Group summary:<br>
				<li>Join group: <br>				
				<li>Etc<br><br>
				</ul>
				Need to know: <br>
				<ul>
				<li>Group name and members<br>
				<li>Group calendar events<br>
				<li>**User's permissions of this group<br>
				<li>Link/info for group's forums<br>
				</ul>
				";
								
		}
		$data['footer'] = $this->Page->get_footer();				
			
		$this->load->view( 'grouppage_view.php', $data );

		
				
	}

	function test(){
		//set page name
		$this->load->library('unit_test');
                echo $this->unit->run('Gus Groups.',$this->Page->get_content('groups'), 'Userpage test');
		//$this->load->view('test', $this->pdata);
        echo $this->unit->run(true,$this->index(), 'group page index');
	}	

}
