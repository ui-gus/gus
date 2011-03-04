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
    //Send all information to the view.
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
	#$query = $this->db->query("SELECT * FROM user WHERE id = $t")->result();
	$query = $this->db->get_where( 'user', array('id' => $t) )->result();
	//Scott's CSS stuff.
	$data['content'] = "<div class=\"update\">"
	  . "<img src=\"" . base_url() . "/uploads/colby.png\" class=\"profile_pic\">"
	  . "<br><h1> User Profile:" . $query[0]->un . "</h1>"
	  . "User #" . $query[0]->id
	  . "<br><br><img src=\"" . base_url() ."templates/quote_left.png\"> "
	  .	"See, A description should go here, but guess what? There isn't one in the db yet! I should probably add that. :("
	  . " <img src=\"" . base_url() ."templates/quote_right.png\">"
	  . "</div>"
	  ;	
      }
      $this->load->view( 'userpage_view.php', $data );
    }
  }

  function test() {
    $this->load->library('unit_test');
    echo $this->unit->run('Gus User Page.',$this->Page->get_content('user'), 'Userpage test');
  }	
  
}
