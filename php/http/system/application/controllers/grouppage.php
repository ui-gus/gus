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
    $this->load->model('User');
    $this->load->model('Group');
    $this->load->helper('url');
    $this->load->database();
    
    $this->testing = false;
  }
  
  function index() {
    $data['header'] = $this->Page->get_header('groups');
    $data['footer'] = $this->Page->get_footer();	
    
    if( !$this->Page->authed() ){
      $data['authed'] = false;
    }				
    else{
      $data['authed'] = true;
      $data['groups'] = $this->Group->get_grouplist();
    }

    //Send all information to the view.
    if( $this->testing == false ){
      $this->load->view( 'grouppage.php', $data );
    }
    return( true );
  }

  function view( $testgroup ){
    $data['header'] = $this->Page->get_header('groups');
    $data['footer'] = $this->Page->get_footer();
    
    if( !$this->Page->authed() ){
      $data['authed'] = false;
    }	
    else{
      $data['authed'] = true;
      $t = $this->uri->segment(3);
      
      if( $t == "" && $this->testing == false ){
	redirect("grouppage");
      }      
      else {
	$query = $this->db->get_where( 'ggroup', array('id' => $t) )->result();
	$userlist = $this->db->get_where( 'usergroup', array('gid' => $t) )->result_array();
	
	if( sizeof($query) > 0 ){
	  $data['group'] = $query[0];
	}
	$data['gid'] = $t;
	$data['members'] = $userlist;
      }
      //Send all information to the view.
      if( $this->testing == false ){
	$this->load->view( 'grouppage_view.php', $data );
      }
    }
    return( true );
  }

  function join( $testgroup ){
    $t = $this->uri->segment(3);
    $data['header'] = $this->Page->get_header('groups');
    $data['footer'] = $this->Page->get_footer();

    if( $testgroup != "" && $this->testing == true ){
      $t = $testgroup;
    }

    if( $t == "" && $this->testing == false ){
      redirect("grouppage");
    }	
    else {
      if( !$this->Page->authed() ){
	$data['authed'] = false;
      }	
      else { //Main part.
	$user = $this->session->userdata('un');
	$uid = $this->User->get_id( $user );
	$assoc = $this->db->get_where( 'usergroup', array('uid'=>$uid,'gid'=>$t) )->result();

	$data['authed'] = true;
	$data['gid'] = $t;
	if( empty( $assoc ) ){ // User is not currently in the selected group. Add them.
	  $data['successful'] = true;
	  $this->Group->add_member( $this->Group->get_name( $t ) , $user, 0 );
	}
	else { // User is already in the group. Do not add.
	  $data['successful'] = false;
	}
      }
      //Send all information to the view.
      if( $this->testing == false ){
	$this->load->view( 'grouppage_join.php', $data );
      }
    }
    return( true );  
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
	$data['authed'] = false;
      }	
      else { //Main part.
	$user = $this->session->userdata('un');
	$uid = $this->User->get_id( $user );
	$assoc = $this->db->get_where( 'usergroup', array('uid'=>$uid,'gid'=>$t) )->result();
	
	$data['authed'] = true;
	$data['gid'] = $t;
	if( empty( $assoc ) ){ // User is not currently in the selected group. Do nothing.
	  $data['successful'] = false;
	}
	else { // User is already in the group. Attempt to leave it.
	  $data['successful'] = true;
	  
	  $this->Group->delete_member( $this->Group->get_name( $t ) , $user );
	}
      }
      //Send all information to the view.
      if( $this->testing == false ){
	$this->load->view( 'grouppage_leave.php', $data );
      }
    }
    return( true ); 
  }

  function test(){
    $this->load->library('unit_test');

    $this->testing = true;
    echo $this->unit->run(true,$this->index(), 'Grouppage index() test');
    echo $this->unit->run(true,$this->view(''), 'Attempting to go to grouppage/view/ without a group id. Redirect to grouppage.');
    echo $this->unit->run(true,$this->view('0'), 'Attempting to view Group.');
  }	
  
}

?>