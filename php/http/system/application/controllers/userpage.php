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
    $data['header'] = $this->Page->get_header('user');
    $data['footer'] = $this->Page->get_footer();

    if( !$this->Page->authed() ){			
      $data['content'] = "You must be logged in to view this page.";			
    }	
    else{
      $data['content'] = "You are viewing the user page.<br><br><u>Personal Info (with links to edit pages)</u><br>
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
   				  
    $this->load->view( 'userpage_view.php', $data );
  }
  

 function view(){
    if( !$this->Page->authed() ){
      $data['content'] = "You must be logged in to view this page.";
    }
    else{
      $data['header'] = $this->Page->get_header('user');
      $data['footer'] = $this->Page->get_footer();
      if( $this->uri->segment(3) == "" ){
	redirect("home");
      }
      else{
	$t = $this->uri->segment(3);
	$query = $this->db->query("SELECT * FROM user WHERE id = $t")->result();
	$data['content'] = ""
	  . "User #" . $query[0]->id
	  . "<br>Username : " . $query[0]->un
	  ;	
      }
      $this->load->view( 'userpage_view.php', $data );
    }
  }

  function test() {
    //set page name
    $this->load->library('unit_test');
    echo $this->unit->run('Gus User Page.',$this->Page->get_content('user'), 'Userpage test');
    //$this->load->view('test', $this->pdata);	
  }	
  
}
