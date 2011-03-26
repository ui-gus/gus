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
    if( $this->testing == false ){
      $this->load->view( 'userpage.php', $data );
    }
    return( true );
  }
  

function view(){
  $data['header'] = $this->Page->get_header('user');
  $data['content'] = $this->Page->get_content('user');
  $data['footer'] = $this->Page->get_footer();
  
  if( !$this->Page->authed() ){
    $data['authed'] = false;
  }
  else{
    if( $this->uri->segment(3) == "" ){
      redirect("home");
    }
    else{
      $t = $this->uri->segment(3);
      $grouplist = $this->db->get_where( 'usergroup', array('uid' => $t) )->result_array();
      $personal = $this->User->get_id($this->session->userdata('un'));
      
      $data['name'] = $this->User->get_name( $t );
      $data['id'] = $t;
      $data['authed'] = true;
      $data['grouplist'] = $grouplist;
      if( $this->testing == false ){
	if( $personal == $t ){
	  $this->load->view( 'userpage_personal.php', $data );
	}
	else {
	  $this->load->view( 'userpage_view.php', $data );
	}
      }
    }
  }
  return( true );
}

 function edit(){
   $data['header'] = $this->Page->get_header('user');
   $data['content'] = $this->Page->get_content('user');
   $data['footer'] = $this->Page->get_footer();
   if( $this->testing == false ){
     $this->load->view( 'userpage_edit.php', $data );
   }
   return( true );
 }
 
 function personal(){
   $personal = $this->User->get_id($this->session->userdata('un'));
   redirect("userpage/view/".$personal);
 }
 
 function test() {
   $this->load->library('unit_test');
   $this->testing = true;
   
   echo $this->unit->run(true, $this->index(), 'Userpage index() test');
   echo $this->unit->run(true, $this->edit(), 'Userpage view() test');
   
 }	
 
  }
