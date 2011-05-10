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
      $this->load->model('tinyMCE');
      $this->load->model('Images');
      $this->load->helper('url');
      $this->load->database();
    
      $this->session->userdata('group_name');

      $this->testing = false;
   }
  
   function index() {
      $data['header'] = $this->Page->get_header('groups');
      $data['footer'] = $this->Page->get_footer();	
    
      if( !$this->Page->authed() ){
         $data['authed'] = false;
      }				
      else{
         $uid = $this->User->get_id( $this->session->userdata('un'));
         $grouplist = $this->db->get_where( 'usergroup', array('uid' => $uid) )->result_array();
      
         $data['authed'] = true;
         $data['groups'] = $this->Group->get_grouplist();
         $data['grouplist'] = $grouplist;
      }

      //Send all information to the view.
      $this->load->view( 'grouppage.php', $data, $this->testing );
      return( true );
   }

   function view( $testgroup ){
      $data['header'] = $this->Page->get_header('groups');
      $data['footer'] = $this->Page->get_footer();
    
      if( $this->testing == true && $testgroup == "" ){
         return false;
      }
    
      if( !$this->Page->authed() && $this->testing == false ){
         $data['authed'] = false;
      }	
      else{
         $data['authed'] = true;
         $t = $this->uri->segment(3);
         if( $t == "" ){
            $t = $testgroup;
         }
         if( $t == "" && $this->testing == false ){
            redirect("grouppage");
         }      
         else { //Main part
            $query = $this->db->get_where( 'ggroup', array('id' => $t) )->result();
            $userlist = $this->db->get_where( 'usergroup', array('gid' => $t) )->result_array();
            $un = $this->session->userdata('un');
            $uid = $this->User->get_id($un);
            $isamember = $this->db->get_where('usergroup',array('gid'=>$t,'uid'=>$uid))->result_array()==NULL; 
            $gn = $this->Group->get_name( $t );
            $perm = $this->Group->get_perm($un, $gn);
	
            if( sizeof($query) > 0 ){
               $data['group'] = $query[0];
               if( $data['group']->profile == '' ){
                  $data['group']->profile = "../templates/null_profile.png";
               }
            }
            $data['admin'] = ($perm == 7);
            $data['content'] = $this->Page->get_content( 'group_' . $gn );
            $data['permissions']['read'] = $perm & 4;
            $data['permissions']['write'] = $perm & 2;
            $data['permissions']['execute'] = $perm & 1;	
            $data['gid'] = $t;
            $data['member'] = !$isamember;
            $data['members'] = $userlist;
            $data['filelist'] = $this->Images->get_groups_pics($t);
         }
      }
      //Send all information to the view.
      $this->load->view( 'grouppage_view.php', $data, $this->testing );
      return( true );
   }
  
   function edit( $testgroup ){
      $data['header'] = $this->Page->get_header('groups');
      $data['footer'] = $this->Page->get_footer();
      if( $this->testing == true && $testgroup == "" ){
         return false;
      }
    
      if( !$this->Page->authed() && $this->testing == false ){
         $data['authed'] = false;
      }
      else{
         $data['authed'] = true;
         $t = $this->uri->segment(3);
         if( $t == "" ){
            $t = $testgroup;
         }
         if( $t == "" && $this->testing == false ){
            redirect( 'home' );
         }   
         else{ //Main part. 
            $un = $this->session->userdata('un');
            $gn = $this->Group->get_name( $t );
            $perm = $this->Group->get_perm($un, $gn);
            $temp = $this->db->get_where('ggroup', array('id'=>$t) )->result_array();
            $data['profile'] = $temp[0]['profile'];
            $data['description'] = $temp[0]['description'];
            if( $perm != 7 ){
               $data['admin'] = false;
            }
            else {
               $data['admin'] = true;
               if( !empty($_POST) ){
                  $editedpage['name']    = 'group_' . $gn;
                  $editedpage['content'] = $_POST['content'];
                  $this->db->update('ggroup', 
                                    array('profile'=>$_POST['profile'],'description'=>$_POST['description']),
                                    array('id'=>$t)
                                    );
                  $this->Page->save( $editedpage );
                  redirect( 'grouppage/view/' . $t );
               }
               else {
                  $data['gn'] = $t;
                  $data['content']= $this->Page->get_content('group_' . $gn );
                  $data['tinyMCE'] = $this->tinyMCE->outputJScript( array("grouppage_edit"), 1 );
               }
            }
         }
         $_POST['lastpage'] = $t;
      }
      $this->load->view( 'grouppage_edit.php', $data, $this->testing );
      return( true );
   }
  
   function files( $testgroup ){
      $data['header'] = $this->Page->get_header('groups');
      $data['footer'] = $this->Page->get_footer();
      if( $this->testing == true && $testgroup == "" ){
         return false;
      }
    
      if( !$this->Page->authed() && $this->testing == false ){
         $data['authed'] = false;
      }
      else{
         $data['authed'] = true;
         $t = $this->uri->segment(3);
         if( $t == "" ){
            $t = $testgroup;
         }
         if( $t == "" && $this->testing == false ){
            redirect( 'home' );
         }   
         else{ //Main part. 
            $data['gid'] = $t;
            $data['filelist'] = $this->Images->get_groups_files($t);
         }
      }
      $this->load->view( 'grouppage_files.php', $data, $this->testing );
      return true;
   }
  
   function join( $testgroup ){
      $data['header'] = $this->Page->get_header('groups');
      $data['footer'] = $this->Page->get_footer();
      if( $this->testing == true && $testgroup == "" ){
         return false;
      }
    
      if( !$this->Page->authed() && $this->testing == false ){
         $data['authed'] = false;
      }	
      else {
         $data['authed'] = true;
         $t = $this->uri->segment(3);
         if( $t == "" ){
            $t = $testgroup;
         }
         if( $t == "" && $this->testing == false ){
            redirect("grouppage");
         }	
         else { //Main part.
            $user = $this->session->userdata('un');
            $uid = $this->User->get_id( $user );
            $assoc = $this->db->get_where( 'usergroup', array('uid'=>$uid,'gid'=>$t) )->result();
            $data['gid'] = $t;
            if( empty( $assoc ) ){ // User is not currently in the selected group. Add them.
               $data['successful'] = true;
               $this->Group->add_member( $this->Group->get_name( $t ) , $user, 0 );
            }
            else { // User is already in the group. Do not add.
               $data['successful'] = false;
            }
         }
      }
      //Send all information to the view.
      $this->load->view( 'grouppage_join.php', $data, $this->testing );
      return( true );  
   } 
  
   function leave( $testgroup ){
      $data['header'] = $this->Page->get_header('groups');
      $data['footer'] = $this->Page->get_footer();
      if( $this->testing == true && $testgroup == "" ){
         return false;
      }
      if( !$this->Page->authed() && $this->testing == false ){
         $data['authed'] = false;
      }	
      else {
         $data['authed'] = true;
         $t = $this->uri->segment(3);
         if( $t == "" ){
            $t = $testgroup;
         }
         if( $t == "" && $this->testing == false ){
            redirect("grouppage");
         }
         else { //Main part.
            $user = $this->session->userdata('un');
            $uid = $this->User->get_id( $user );
            $assoc = $this->db->get_where( 'usergroup', array('uid'=>$uid,'gid'=>$t) )->result();
            $data['gid'] = $t;
            if( empty( $assoc ) ){ // User is not currently in the selected group. Do nothing.
               $data['successful'] = false;
            }
            else { // User is already in the group. Attempt to leave it.
               $data['successful'] = true;
               $this->Group->delete_member( $this->Group->get_name( $t ) , $user );
            }
         }
      }
      //Send all information to the view.
      $this->load->view( 'grouppage_leave.php', $data, $this->testing );
      return( true ); 
   }
  
   function test(){
      $this->load->library('unit_test');
      $this->testing = true;

      //index
      //not athed
      echo $this->unit->run(true,$this->index(), 'index not authed');
      //authed
      $this->Page->login("test","test123");
      echo $this->unit->run(true,$this->index(), 'index authed');
    
      //view
      echo $this->unit->run(false,$this->view(''), 'Incorrect view.');
      echo $this->unit->run(true,$this->view('0'), 'Attempting to view Group.');
    
      //edit
      echo $this->unit->run(false,$this->edit(''), 'Incorrect edit.');
      echo $this->unit->run(true,$this->edit('5'), 'Attempting to edit Group.');
    
      //join
      echo $this->unit->run(false, $this->join(''), 'Incorrect join.');
      echo $this->unit->run(true, $this->join('0'), 'Attempting to join Group.');	
    
      //leave
      echo $this->unit->run(false, $this->leave(''), 'Incorrect leave.');
      echo $this->unit->run(true, $this->leave('0'), 'Attempting to leave Group.');	

      echo $this->unit->run(true, $this->files('0'), 'Attempting to view files.');
   }	
  
  }

?>
