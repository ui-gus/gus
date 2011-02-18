<?php

class Forum extends Controller 
{
  function Forum()
  {
    parent::COntroller();
	
	$this->load->helper('url');
	$this->load->helper('form');
  }

  function index()
  {
    $data['title'] = "GUS Forum";
	$data['heading'] = "GUS Forum";
	$data ['query'] = $this->db->get('threads');
	
	$this->load->view('forum_view', $data);
	
  }
  
  function view_thread()
  {
    $data['title'] = "GUS Thread";
	$data['heading'] = "GUS Thread";
	$data['thread_id'] = $this->uri->segment(3);
	$this->db->where('thread_id', $this->uri->segment(3));
	$data ['reply'] = $this->db->get('replies');
	$this->load->view('thread_view', $data);
  }
  
  function create_thread()
  {
	$this->load->view('create_thread_view');
  }
  
  function thread_insert()
  {
    $_POST['datetime']=date("d/m/y h:i:s");
    $this->db->insert('threads', $_POST);
	redirect('forum');
  }
  
  function reply_insert()
  { 

    $_POST['datetime']=date("d/m/y h:i:s");
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

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>

