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
    $this->load->model('User');
    $this->load->model('Group');
    $this->load->helper('url');
    $this->load->helper('form');

    $this->testing = false;
  }

  function index() { //This page may never be used...
    $data['header'] = $this->Page->get_header('user');
    $data['footer'] = $this->Page->get_footer();

    if( !$this->Page->authed() ){			
      $data['authed'] = false;
    }	
    else{
      $data['authed'] = true;
    }	
    
    //Send all information to the view.
    $this->load->view( 'userpage.php', $data, $this->testing );
    return( $data['authed'] );
  }
  

function view( $testuser ){
  $data['header'] = $this->Page->get_header('user');
  $data['content'] = $this->Page->get_content('user');
  $data['footer'] = $this->Page->get_footer();
  
  if( $this->testing == true && $testuser == "" ){
    return false;
  }
  
  if( !$this->Page->authed() /*&& $this->testing == false*/ ){
    $data['authed'] = false;
    $this->load->view( 'userpage_view.php', $data, $this->testing );
    return false;
  }
  else{
    $t = $this->uri->segment(3);
    if( $t == "" ){
      $t = $testuser;
    }
    if( $t == "" && $this->testing == false ){
      redirect("home");
    }
    else{ //Main part
      $grouplist = $this->db->get_where( 'usergroup', array('uid' => $t) )->result_array();
      $personal = $this->User->get_id($this->session->userdata('un'));
      $temp = $this->db->get_where( 'user', array('id' => $t) )->result_array();
      
      $data['name'] = $this->User->get_name( $t );
      $data['id'] = $t;
      $data['authed'] = true;
      $data['grouplist'] = $grouplist;
      $data['personal']['fullname'   ] = $temp[0]['fullname'];
      $data['personal']['description'] = $temp[0]['description'];
      $data['personal']['profile']     = $temp[0]['profile'];
      $data['personal']['email']       = $temp[0]['email'];
      $data['personal']['contact']     = $temp[0]['contact'];
      $data['personal']['major']       = $temp[0]['major'];
      if( $personal == $t ){
	$this->load->view( 'userpage_personal.php', $data, $this->testing );
      }
      else {
	$this->load->view( 'userpage_view.php', $data, $this->testing );
      }
    }
  }   
  return( true );
}

 function edit(){
   if( !$this->Page->authed() ){
     if($this->testing == false) {
       redirect("home");
     } else {
       return(false);
     }
   }
   $data['header'] = $this->Page->get_header('user');
   $data['content'] = $this->Page->get_content('user');
   $data['footer'] = $this->Page->get_footer();
   
   $t = $this->User->get_id( $this->session->userdata('un') );
   $temp = $this->db->get_where( 'user', array('id' => $t) )->result_array();
   $data['personal']['fullname'   ] = $temp[0]['fullname'];
   $data['personal']['description'] = $temp[0]['description'];
   $data['personal']['profile']     = $temp[0]['profile'];
   $data['personal']['email']       = $temp[0]['email'];
   $data['personal']['contact']     = $temp[0]['contact'];
   $data['personal']['major']       = $temp[0]['major'];
   
   if(!empty($_POST)){
     //redirect($this->uri->uri_string());
     $this->db->update('user', 
		       array('fullname'=>$_POST['fullname'], 'description'=>$_POST['description'],
			     'profile'=>$_POST['profile']  , 'email'=>$_POST['email'],
			     'contact'=>$_POST['contact']  , 'major'=>$_POST['major']),
		       array('id'=>$t));
     if($this->testing == false) {
       redirect( 'userpage/personal' );
     } else {
       $status = true;
     }
   }
   else {
     $status = false; 
   }
  
   if( $this->testing == false ){
     $this->load->view( 'userpage_edit', $data );
   }
   return( $status );
 }
 
 function personal(){
   $status = true;
   if( !$this->Page->authed()){
     if($this->testing != true) redirect("home");
     else $status = false;
   }
   $personal = $this->User->get_id($this->session->userdata('un'));
   if ($this->testing != true) redirect("userpage/view/".$personal);
   return($status);
 }
 
 function test() {
   $this->load->library('unit_test');
   $this->testing = true;

   //unauthed tests
   echo $this->unit->run(false, $this->index(), 'Unauthed index() test');
   echo $this->unit->run(false, $this->view( '' ), 'Unauthed incorrect attempt to view User.');
   echo $this->unit->run(false, $this->view( "0" ), 'Unauthed attempt to view User.');
   echo $this->unit->run(false, $this->edit(), "Unauthed attempt to edit User's personal page." );
   echo $this->unit->run(false, $this->personal(), "Unauthed attempt to view User's personal page.");
 
  
   //authed tests
   //setup a user session
   $this->Page->login("test","test123");
   echo $this->unit->run(true, $this->index(), 'Userpage index() test');
   echo $this->unit->run(false, $this->view( '' ), 'Attempting to incorrectly view User.');
   echo $this->unit->run(true, $this->view( "0" ), 'Attempting to view User.');
   echo $this->unit->run(false, $this->personal(), 'personal');
   
   //no POST data
   echo $this->unit->run(true, $this->edit(), "Attempting to edit User's personal page." );

   
   //POST data
   $_POST['profile'] = "test";
   $_POST['email'] = "test@gus.org";
   $_POST['contact'] = "800 555-TEST";
   $_POST['major'] = "computer science";
   echo $this->unit->run(true, $this->edit(), "Attempting to edit User's personal page." );
 }	
 
}
