<?php
  /**
   * @package GusPackage
   * subpackage Userpage
   * @author Brett Hitchcock <hitc8494@vandals.uidaho.edu>
   * @version 0.4
   * @copyright University of Idaho 2011
   */

class Registration extends Controller {
  function Registration(){
    parent::Controller();
    $this->load->model('Page');
    $this->load->model('User');
    $this->load->model('Group');
    $this->load->helper('url');
    $this->load->helper('form');

    $this->testing = false;
  }
  
  function index(){
    $data['header'] = $this->Page->get_header('registration');
    $data['content'] = $this->Page->get_content('registration');
    $data['footer'] = $this->Page->get_footer();
    
    $data['error'] = "";
    if(!empty($_POST)){
      
      
      $at = strpos($_POST['email'],"@");
      $rest = substr($_POST['email'], $at+1);
      
      $data['status'] = true;
      $data['un'] = substr($_POST['email'], 0, $at);
      $data['pw'] = $_POST['pw'];
      //         If there is no @              If there is no name        If the ending is wrong
      if( ! strpbrk( $_POST['email'], "@" ) || $data['un'] == NULL || $rest != "vandals.uidaho.edu" ){
	$data['error'] .= "ERROR: Invalid email address.<br>";
      }
      if( $_POST['email'] != $_POST['email2'] ){
	$data['error'] .= "ERROR: Email addresses do not match.<br>";
      }
      if( ! $this->Page->is_pw_secure( $data['pw'] ) ){
	$data['error'] .= "ERROR: Password is not secure enough.<br>";
      }
      if( $_POST['pw'] != $_POST['pw2'] ){
	$data['error'] .= "ERROR: Passwords do not match.<br>";
      }
      
      //No errors found. Add the user.
      if( $data['error'] == "" ){
	$newuser['un'] = $data['un'];
	$newuser['pw'] = $data['pw'];
	$newuser['email'] = $_POST['email'];
	$this->User->save( $newuser );     
	$this->load->view( 'registration_success', $data );      
      }
      else{

	$this->load->view( 'registration', $data );
      }
    }
    else {
      $data['status'] = false;
      $_POST['email'] = "@vandals.uidaho.edu";
      $_POST['email2'] = "@vandals.uidaho.edu";
	$this->load->view( 'registration', $data );
    }
    
  }
  }