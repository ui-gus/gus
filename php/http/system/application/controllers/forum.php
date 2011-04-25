<?php
/**
 * @package GusPackage
 * subpackage Forum
 * @author First Last <flast@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

class Forum extends Controller 
{
	var $pdata;					//page daga
	var $fdata;					//Holds query data for use in views
	var $current_group_id;
	var $current_group_name;
	
	
	function Forum()
	{
		date_default_timezone_set('America/Los_Angeles');
		parent::Controller();
 		$this->load->model('Page');
        $this->pdata['footer'] = $this->Page->get_footer();		
	}
	
	
	//This function checks if you are logged in and directs you accordingly
	function index() 
	{	
		$this->load->model('User');
		$this->load->model('Group');
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');	   

		if( !$this->Page->authed() )
		{
			$this->pdata['message'] = "You must be logged in to view this page.";
			$this->load->view('/forum/forum_error', $this->pdata);
		}				
		else
		{
			$this->fdata['groups'] = $this->db->get_where('usergroup', array('uid' => $this->User->get_id($this->session->userdata['un'])));
			$this->load->view('/forum/forum_main', $this->fdata, $this->pdata);
		}	
		return( true );	
	}
	
	
	//This function pulls all the threads of a given forum from teh DB then calls the forun view.
	
	
	function set_group()
	{
		$current_group = array('group_name'=>$_POST['group_name'], 'group_id'=>$_POST['group_id'], 'group_perm'=>$_POST['group_perm']);
		$this->session->set_userdata($current_group);
		$this->view_forum();
	}
	
	function view_forum()
	{
	    $this->fdata['query'] = $this->db->get_where('threads', array('group_id' => $this->session->userdata('group_id')));

		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('/forum/forum_view', $this->fdata, $this->pdata);
	}
	
	
	
	//fills fdata with the chosen thread id and all of that threads replies and calls the thread view
	function view_thread()
	{
		$this->fdata['thread_id'] = $this->uri->segment(3);
		$this->fdata['thread'] = $this->db->get_where('threads', array('thread_id' => $this->fdata['thread_id']));
		$this->fdata['reply'] = $this->db->get_where('replies', array('thread_id' => $this->fdata['thread_id']));
		
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('/forum/thread_view', $this->fdata, $this->pdata);
	}
  
    //calls the create thread view
	function create_thread()
	{
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('/forum/create_thread_view', $this->pdata, $this->fdata); 
	}
  
  
    //calls the search forum view
	function search_forum()
	{
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('/forum/search_forum_view', $this->pdata, $this->fdata);
	}
	function search_by_topic()
	{
		$this->search_criteria = $_POST['search_criteria'];
		
		$this->db->like('thread_topic', $this->search_criteria);
	    $thread_query = $this->db->get_where('threads', array('group_id' => $this->session->userdata('group_id')));
		
		foreach($thread_query->result() as $curr_result) {$temp_array[]=$curr_result->thread_id;}

		$this->fdata['results'] = $temp_array;
	
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('/forum/forum_search_results_view', $this->fdata, $this->pdata);			
	}	
	
	
	function search_by_user()
	{
		$this->search_criteria = $_POST['search_criteria'];

		$thread_query = $this->db->get_where('threads', array('thread_author' => $this->search_criteria, 'group_id' => $this->session->userdata('group_id')));
		$reply_query = $this->db->get_where('replies', array('author' => $this->search_criteria, 'group_id' => $this->session->userdata('group_id')));

		foreach($thread_query->result() as $curr_result) {$temp_array[]=$curr_result->thread_id;}
		foreach($reply_query->result() as $curr_result) {$temp_array[]=$curr_result->thread_id;}
		$this->fdata['results'] = array_unique($temp_array);
		
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('/forum/forum_search_results_view', $this->fdata, $this->pdata);			
	}
	
	function search_by_content()
	{
		$this->search_criteria = $_POST['search_criteria'];
		
		$this->db->like('thread_body', $this->search_criteria);
	    $thread_query = $this->db->get_where('threads', array('group_id' => $this->session->userdata('group_id')));
		$this->db->like('body', $this->search_criteria);
	    $reply_query = $this->db->get_where('replies', array('group_id' => $this->session->userdata('group_id')));
		
		foreach($thread_query->result() as $curr_result) {$temp_array[]=$curr_result->thread_id;}
		foreach($reply_query->result() as $curr_result) {$temp_array[]=$curr_result->thread_id;}
		$this->fdata['results'] = array_unique($temp_array);
		
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('/forum/forum_search_results_view', $this->fdata, $this->pdata);			
	}	
  
  
  
  
    //takes thread id and pulls the topic and the body data from the database and puts it in fdata
	//then calls the edit thread view.
	function edit_thread()
	{
		$this->fdata['thread_id']=$_POST['thread_id'];
		
		$this->db->select('thread_body, thread_topic');
		$query=$this->db->get_where('threads', array('thread_id' => $this->fdata['thread_id']));
		foreach ($query->result() as $result)  
		{
			$this->fdata['thread_topic']=$result->thread_topic;
			$this->fdata['thread_body']=$result->thread_body;
		}
		
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('/forum/edit_thread_view', $this->pdata, $this->fdata);  
	}
	function edit_reply()
	{
		$this->fdata['reply_id']=$_POST['reply_id'];
		$this->fdata['thread_id']=$_POST['thread_id'];
		
		$this->db->select('body');
		$query=$this->db->get_where('replies', array('reply_id' => $this->fdata['reply_id']));
		foreach ($query->result() as $result)  {$this->fdata['body']=$result->body;}
	
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('/forum/edit_reply_view', $this->pdata, $this->fdata);  
	}
	
  
    
	//given a thread id and data this function updates the entry in the database
	function thread_update()
	{ 
		$id=$_POST['thread_id'];
		$this->db->where('thread_id', $id);
		$this->db->update('threads', $_POST);
		if(!$this->testmode) redirect('forum/view_thread/'.$id);
	} 
	//given a thread id and data this function updates the entry in the database
	function reply_update()
	{ 
		$reply_id=$_POST['reply_id'];
		$thread_id=$_POST['thread_id'];
		$this->db->where('reply_id', $reply_id);
		$this->db->update('replies', $_POST);
		if(!$this->testmode) redirect('forum/view_thread/'.$thread_id);
	} 	
    
	
    //inserts a new thread into the database using the group_id, the current time, and the current user.
	function thread_insert()
	{
		if ($_POST['thread_topic'] != '');
		$_POST['group_id']=$this->session->userdata('group_id');
		$_POST['datetime']=date("d/M/Y h:i:s");
		$_POST['thread_author'] = $this->session->userdata['un'];
		$this->db->insert('threads', $_POST);
		$this->view_forum();
	}
    //this function first pulls the num_replies for the current thread from the database and increments it
	//it then inserts the reply into the database then returns you to the thread
	function reply_insert()
	{ 
		//pull the reply count and updates it 
		$this->fdata['thread_id']=$_POST['thread_id'];
		
		$this->db->select('num_replies');
		$query=$this->db->get_where('threads', array('thread_id' => $this->fdata['thread_id']));
		foreach ($query->result() as $result)  {$num_replies=$result->num_replies;}
		
		$this->fdata['num_replies']=$num_replies + 1;
		$this->db->where('thread_id', $this->fdata['thread_id']);
		$this->db->update('threads', $this->fdata); 
	
		//inserts reply in to database
		$_POST['group_id']=$this->session->userdata('group_id');
		$_POST['datetime']=date("d/M/Y h:i:s");
		$_POST['author'] = $this->session->userdata['un'];
		$this->db->insert('replies', $_POST);
		redirect('forum/view_thread/'.$_POST['thread_id']);	 
	}
	
	function lock_thread()
	{
		$this->fdata['thread_id']=$_POST['thread_id'];
		$this->fdata['lock_flag']=1;
		$this->db->where('thread_id', $this->fdata['thread_id']);
		$this->db->update('threads', $this->fdata); 
		redirect('forum/view_thread/'.$_POST['thread_id']);
	}
	function unlock_thread()
	{
		$this->fdata['thread_id']=$_POST['thread_id'];
		$this->fdata['lock_flag']=0;
		$this->db->where('thread_id', $this->fdata['thread_id']);
		$this->db->update('threads', $this->fdata); 
		redirect('forum/view_thread/'.$_POST['thread_id']);
	}
	
  
  
    //this function deletes a thread and all of it's replies from the database then sends you to the main forum page.
	function delete_thread()
	{
		$thread_id=$_POST['thread_id'];
		$this->db->delete('threads', array('thread_id' => $thread_id));
		$this->db->delete('replies', array('thread_id' => $thread_id));
		$this->view_forum();
	}
    //this function deletes a reply from the database then sends you to the main forum page.
	function delete_reply()
	{
		$this->fdata['thread_id']=$_POST['thread_id'];
		
		$this->db->select('num_replies');
		$query=$this->db->get_where('threads', array('thread_id' => $this->fdata['thread_id']));
		foreach ($query->result() as $result)  {$num_replies=$result->num_replies;}
		
		$this->fdata['num_replies']=$num_replies - 1;
		$this->db->where('thread_id', $this->fdata['thread_id']);
		$this->db->update('threads', $this->fdata);
		
		$reply_id=$_POST['reply_id'];
		$this->db->delete('replies', array('reply_id' => $reply_id)); 
		if(!$this->testmode) redirect('forum/view_thread/'.$_POST['thread_id']);
	}	
	function confirm_delete_thread()
	{
		$this->fdata['thread_id']=$_POST['thread_id'];
		$this->fdata['thread_topic']=$_POST['thread_topic'];
		
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('/forum/confirm_delete_thread_view', $this->fdata, $this->pdata);
	}
	function confirm_delete_reply()
	{
		$this->fdata['thread_id']=$_POST['thread_id'];
		$this->fdata['reply_id']=$_POST['reply_id'];
		$this->fdata['thread_topic']=$_POST['thread_topic'];
		
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('/forum/confirm_delete_reply_view', $this->fdata, $this->pdata);
	}



	function test() {
		$this->load->library('unit_test');
		$this->testmode = 'true';


		//index
		//not authed
		echo $this->unit->run($this->index(), true, 'index');
		//authed
		$this->Page->login("test","test123");		
		echo $this->unit->run($this->index(), true, 'index');

		//set_group
		echo $this->unit->run($this->set_group(), true, 'set_group');

		//view_forum
		echo $this->unit->run($this->view_forum(), true, 'view_forum');

		//view_thread
		echo $this->unit->run($this->view_thread(), true, 'view_thread');

		//create_thread
		echo $this->unit->run($this->create_thread(), true, 'create_thread');

		//search_forum
		echo $this->unit->run($this->search_forum(), true, 'search_forum');

		//edit_thread
		$_POST['thread_id'] = 0;
		//echo $this->unit->run($this->edit_thread(), true, 'edit_thread');

		//edit_reply
		echo $this->unit->run($this->edit_reply(), true, 'edit_reply');

		//thread_update
		$_POST['thread_id'] = 0;
		echo $this->unit->run($this->thread_update(), true, 'thread_update');

		//reply_update
		echo $this->unit->run($this->reply_update(), true, 'reply_update');

		//thread_insert
		echo $this->unit->run($this->thread_insert(), true, 'thread_insert');

		//reply_insert
		//can't go through for db reasons, needs fixing
		//echo $this->unit->run($this->reply_insert(), true, 'reply_insert');

		//delete_thread
		echo $this->unit->run($this->delete_reply(), true, 'delete_reply');
	}
}
