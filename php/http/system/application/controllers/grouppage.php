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
		$this->load->database();
	}
	
	function index() {
		$data['header'] = $this->Page->get_header('groups');
		$data['footer'] = $this->Page->get_footer();			
		$data['query'] = $this->db->get('ggroup')->result_array();	
	
		if( !$this->Page->authed() ){
			$data['content'] = "You must be logged in to view this page.";
		}				
		else{
			$query = $this->db->get('ggroup');
			$qquery = $query->result_array();
			$s = "";
			foreach( $qquery as $group ):{
				//$s .= $item['id']; 			
				//$s .= ("- " . $item['id'] . "<br>");			
		$s.=anchor('grouppage/view/'.$group['id'] , $group['name'])."<br>";			
			
			}
			endforeach;
			$data['content'] = $s;
		}
			
			
		$this->load->view( 'grouppage_view.php', $data );

		
				
	}

	function view(){
		if( !$this->Page->authed() ){
			$data['content'] = "You must be logged in to view this page.";
		}	
		else{
			$data['header'] = $this->Page->get_header('groups');
			$data['footer'] = $this->Page->get_footer();
			if( $this->uri->segment(3) == "" ){
				$data['content'] = "Empty page.";
			}	
			else{
				$t = $this->uri->segment(3);
				$query = $this->db->query("SELECT * FROM ggroup WHERE id = $t")->result();
				$data['content'] = "Group #".$query[0]->id."<br>Name: ".$query[0]->name.
						"<br>Description: ".$query[0]->description;
			}

			$this->load->view( 'grouppage_view.php', $data );
		}
	}
	function test(){
		//set page name
		$this->load->library('unit_test');
                echo $this->unit->run('Gus Groups.',$this->Page->get_content('groups'), 'Userpage test');
		//$this->load->view('test', $this->pdata);
        echo $this->unit->run(true,$this->index(), 'group page index');
	}	

}
