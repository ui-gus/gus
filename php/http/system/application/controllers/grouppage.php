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
  #  $test = $this->Group->get_membershiplist( "brett" );
  #foreach( $test as $key ):{
  #    $tests .= $key['read'] . "<br>";
  #    #echo $key['id'];
  #  }
  #  endforeach;
  #  echo $tests;
        
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
	#$query = $this->db->query("SELECT * FROM ggroup WHERE id = $t")->result();
	$query = $this->db->get_where( 'ggroup', array('id' => $t) )->result(); # <-- Better.
	$userlist = $this->db->get_where( 'usergroup', array('gid' => $t) )->result_array();
	
	//$uid = $this->User->get_id( $this->session->userdata('un') );
	

	//Scott's CSS stuff below.
	$data['content'] = "<div class=\"update\">"
	  . "<img src=\"" . base_url() . "/uploads/images_(3).jpg\" class=\"profile_pic\">"
	  . "<h1>Group Title: " . $query[0]->name . "</h1>"
	  . "Group id" . $query[0]->id 
	  . "<br><br><img src=\"" . base_url() ."templates/quote_left.png\">"
	  . $query[0]->description
	  . "<img src=\"" . base_url() ."templates/quote_right.png\">"
	  . "<br><br>" 
	  . anchor('grouppage/join/'.$t , "Join this group<br>") 
	  . anchor('grouppage/leave/'.$t , "Leave this group<br>")
	  . "</div>"
	  // Display all users in the group.
	  . "<div class=\"update\">"
	  . "<h3><u>__List of Users__</u></h3>"
	  ;
      foreach( $userlist as $key ):{
	  $data['content'] .= "<h4>" 
	    . anchor('userpage/view/'.$key['uid'] , $this->User->get_name( $key['uid']) )
	    . "</h4>"
	    ;
	}
	endforeach;
	$data['content'] .= "<u>__________________</u>"
	  . " "
	  . "</div>"
	  ;
      }
      //Send all information to the view.
      $this->load->view( 'grouppage_view.php', $data );
    }
    return( true );
  }

  function join(){
    $t = $this->uri->segment(3);
    $data['header'] = $this->Page->get_header('groups');
    $data['footer'] = $this->Page->get_footer();

    if( $t == "" ){
      redirect("grouppage");
    }	
    else {
      if( !$this->Page->authed() ){
	$data['content'] = "You must be logged in to view this page.";
      }	
      else { //Main part. 
	$user = $this->session->userdata('un');
	$uid = $this->User->get_id( $user );
	$assoc = $this->db->get_where( 'usergroup', array('uid'=>$uid,'gid'=>$t) )->result();

	if( empty( $assoc ) ){ // User is not currently in the selected group. Add them.
	  $data['content'] = "You have joined "
	    . $this->Group->get_name( $t )
	    . "<br><br>"
	    . anchor( 'grouppage/view/'.$t , "Return to group page" )
	    ;
	  $this->Group->add_member( $this->Group->get_name( $t ) , $user, 0 );
	}
	else { // User is already in the group. Do not add.
	  $data['content'] = "You are already a member of this group.<br><br>"
	    . anchor( 'grouppage/view/'.$t , "Return to group page" )
	    ;
	}
      }
      //Send all information to the view.
      $this->load->view( 'grouppage_view.php', $data );
      return( true );  
    }
  } 

  function leave(){
    $t = $this->uri->segment(3);
    $data['header'] = $this->Page->get_header('groups');
    $data['footer'] = $this->Page->get_footer();

    if( $t == "" ){
      redirect("grouppage");
    }
    else {
      if( !$this->Page->authed() ){
	$data['content'] = "You must be logged in to view this page.";
      }	
      else { //Main part.
	$user = $this->session->userdata('un');
	$uid = $this->User->get_id( $user );
	$assoc = $this->db->get_where( 'usergroup', array('uid'=>$uid,'gid'=>$t) )->result();

	if( empty( $assoc ) ){ // User is not currently in the selected group. Do nothing.
	  $data['content'] = "You are not a member of "
	    . $this->Group->get_name( $t )
	    . "<br><br>"
	    . anchor( 'grouppage/view/'.$t , "Return to group page" )
	    ;
	}
	else { // User is already in the group. Attempt to leave it.
	  $data['content'] = "You have left "
	    . $this->Group->get_name( $t )
	    . "<br><br>"
	    . anchor( 'grouppage/view/'.$t , "Return to group page" )
	    ;
	  $this->Group->delete_member( $this->Group->get_name( $t ) , $user );
	}
	
	
	
      }
      //Send all information to the view.
      $this->load->view( 'grouppage_view.php', $data );
      return( true );  
    }
  }




  //$s = "Current list of all user/group associations: <br><table border=\"0\"><tr><th>Group ID</th><th>User ID</th><th>Permissions</th></tr>";
  //$s .= "<tr><td>" . $group['groupid'] . "</td><td>" . $group['userid'] . "</td><td>" . $group['grouppermissions'] . "</td></tr>"; }

  function test(){
    $this->load->library('unit_test');
    echo $this->unit->run(true,$this->index(), 'Group page index');
    echo $this->unit->run(true,$this->view(), 'Group page index');
    echo $this->unit->run(true,$this->join(), 'Group page index');
    echo $this->unit->run(true,$this->leave(), 'Group page index');
    
  }	
  
  }

?>