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
      $data['content'] = "<u>All Groups</u><br>" . $s;
    }
    
    
    $this->load->view( 'grouppage_view.php', $data );
  }
  
  //INSERT INTO `gusphp`.`ggroupusers` (`groupid`, `userid`, `grouppermissions`) VALUES ('1', '2', '1');

  function view(){
    if( !$this->Page->authed() ){
      $data['content'] = "You must be logged in to view this page.";
    }	
    else{
      $data['header'] = $this->Page->get_header('groups');
      $data['footer'] = $this->Page->get_footer();
      if( $this->uri->segment(3) == "" ){
	redirect("grouppage");
      }	
      else{



	$t = $this->uri->segment(3);
	$query = $this->db->query("SELECT * FROM ggroup WHERE id = $t")->result();
	$data['content'] = "<div class=\"update\">"
		. "<img src=\"" . base_url() . "/uploads/images_(3).jpg\" class=\"profile_pic\">"
		. "<h1>Group Title: " . $query[0]->name . "</h1>"
		. "Group id" . $query[0]->id 
		. "<br><br><img src=\"" . base_url() ."templates/quote_left.png\">"
		. $query[0]->description
		. "<img src=\"" . base_url() ."templates/quote_right.png\">"
		. "<br><br>" 
		. anchor('grouppage/join' , "Join this group<br>") 
		. anchor('grouppage/leave' , "Leave this group<br>")
		. "</div>";
      }
      $this->load->view( 'grouppage_view.php', $data );
    }
  }

  function join(){
    $data['header'] = $this->Page->get_header('groups');
    $data['footer'] = $this->Page->get_footer();

    if( !$this->Page->authed() ){
      $data['content'] = "You must be logged in to view this page.";
    }	
    else { //Need to know the UserID from Session.
      $data['content'] = "Attempting to join Group #" . "NUM" . "<br><ul>" . 
	"<li>Need to know which UserID to add." . 
	"<li>Should send a message to the group for review.";
      // --- Left off here ---
    }
    $this->load->view( 'grouppage_view.php', $data );
  }
  
  function leave(){
    $data['header'] = $this->Page->get_header('groups');
    $data['footer'] = $this->Page->get_footer();

    if( !$this->Page->authed() ){
      $data['content'] = "You must be logged in to view this page.";
    }	
    else { //Need to know the UserID from Session.
      $data['content'] = "Attempting to leave Group #" . "NUM" . "<br><hr><ul>" . 
	"<li>Need to know which UserID to remove." .
	"<li>Should remove the user from the group, then notify the group that the user left.";
      // --- Left off here ---
    }
    $this->load->view( 'grouppage_view.php', $data );
  }

  function associations(){
    $data['header'] = $this->Page->get_header('groups');
    $data['footer'] = $this->Page->get_footer();
    $query = $this->db->get('ggroupusers');
    $qquery = $query->result_array();
    $s = "Current list of all user/group associations: <br><table border=\"0\"><tr><th>Group ID</th><th>User ID</th><th>Permissions</th></tr>";
  foreach( $qquery as $group ):{
      $s .= "<tr><td>" . $group['groupid'] . "</td><td>" . $group['userid'] . "</td><td>" . $group['grouppermissions'] . "</td></tr>"; }
    endforeach;
    $data['content'] = $s . "</table>";
    $this->load->view( 'grouppage_view.php', $data );
  }

  function test(){
    $this->load->library('unit_test');
    //echo $this->unit->run('Gus Groups.',$this->Page->get_content('groups'), 'Userpage test');
    //$this->load->view('test', $this->pdata);
    echo $this->unit->run(NULL,$this->index(), 'Group page index');
  }	
  
  }

?>