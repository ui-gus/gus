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
    $this->load->model('Group');
    $this->load->helper('url');
    $this->load->database();
  }
  
  function index() {
    $data['header'] = $this->Page->get_header('groups');
    $data['footer'] = $this->Page->get_footer();		
    $data['query'] = $this->db->get('ggroup')->result_array();	
    
  #  $tests = "";
  #  $test =  $this->Group->delete_member( "test", "test");
#foreach( $test as $key ):{
    #    $tests .= $key;
#    echo $key['gid'];
    #  }
#  endforeach;
    #echo $test;
    
    
    if( !$this->Page->authed() ){
      $data['content'] = "You must be logged in to view this page.";
    }				
    else{
      $query = $this->db->get('ggroup');
      $qquery = $query->result_array();
      $s = "";
      foreach( $qquery as $group ):{
	//Display all groups and link to their group/view.
	$s.=anchor('grouppage/view/'.$group['id'] , $group['name'])."<br>";			
      }
      endforeach;
      $data['content'] = "<u>All Groups</u><br>" . $s;
    }

    //Send all information to the view.
    $this->load->view( 'grouppage_view.php', $data );
    return( true );
  }

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

	//$t is the third segment of the URL, in this case, grouppage/view/___ 
	$t = $this->uri->segment(3);
	$query = $this->db->query("SELECT * FROM ggroup WHERE id = $t")->result();
	//Scott's CSS stuff below.
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
      //Send all information to the view.
      $this->load->view( 'grouppage_view.php', $data );
    }
    return( true );
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
    }
    //Send all information to the view.
    $this->load->view( 'grouppage_view.php', $data );
    return( true );  
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
    }
    //Send all information to the view.
    $this->load->view( 'grouppage_view.php', $data );
    return( true );  
  }

  //Debug function at the moment to show user / group associations.
  //Will be phased out when Admin is complete.
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
    //Send all information to the view.
    $this->load->view( 'grouppage_view.php', $data );
  }
  //--------------------------------------------------------

  function test(){
    $this->load->library('unit_test');
    echo $this->unit->run(true,$this->index(), 'Group page index');
    echo $this->unit->run(true,$this->view(), 'Group page index');
    echo $this->unit->run(true,$this->join(), 'Group page index');
    echo $this->unit->run(true,$this->leave(), 'Group page index');
    
  }	
  
  }

?>