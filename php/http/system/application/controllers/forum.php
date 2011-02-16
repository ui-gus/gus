<?php
/**
 * @package GusPackage
 * subpackage Forum
 * @author First Last <flast@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */
class Forum extends Controller {
	var $pdata;

	function Forum(){
		parent::Controller();
 		$this->load->model('Page');
                //set page content
                $this->pdata['footer'] = $this->Page->get_footer();		
	}
	
	function index() {
                $this->pdata['header'] = $this->Page->get_header('forum');	
                $this->pdata['content'] = $this->Page->get_content('forum');	
		
		$this->pdata['query'] = $this->db->get('threads');
		$this->load->view('forum_view', $this->pdata);
	}

function view_thread()
  {
    $this->pdata['header'] = $this->Page->get_header('forum');	
    $this->pdata['content'] = $this->Page->get_content('forum');
	$this->pdata['thread_id'] = $this->uri->segment(3);
	$this->db->where('thread_id', $this->uri->segment(3));
	$this->pdata['reply'] = $this->db->get('replies');
	$this->load->view('thread_view', $this->pdata);
  }
  
  function create_thread()
  {
    $this->pdata['header'] = $this->Page->get_header('forum');	
    $this->pdata['content'] = $this->Page->get_content('forum');
	$this->load->view('create_thread_view', $this->pdata);
  }
  
  function thread_insert()
  {
    $_POST['datetime']=date("d/M/Y h:i:s");
    $this->db->insert('threads', $_POST);
	redirect('forum');
  }
  
  function reply_insert()
  { 
    $id=$_POST['thread_id'];
    $sql="SELECT * FROM threads WHERE id='$id'";
    $thread=mysql_fetch_array(mysql_query($sql));
	
	$data['reply']=$thread['reply'] + 1;
	$this->db->where('id', $id);
    $this->db->update('threads', $data); 
	
    $_POST['datetime']=date("d/M/Y h:i:s");
    $this->db->insert('replies', $_POST);
	redirect('forum/view_thread/'.$_POST['thread_id']);	 
  }
  
  
  function delete_thread()
  {
	$id=$_POST['id'];
    mysql_query("DELETE FROM threads WHERE id='$id'");
    mysql_query("DELETE FROM replies WHERE thread_id='$id'");
	redirect('forum');
  }


}
