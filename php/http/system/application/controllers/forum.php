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
	var $username = "Chaylo";	//static temp default username, will be filled from session later
	//var $group_id = 0;			//static temp default group, will be filled from session later
	

	function Forum()
	{
		parent::Controller();
 		$this->load->model('Page');
        $this->pdata['footer'] = $this->Page->get_footer();		
	}
	
	
	//This function checks if you are logged in and directs you accordingly
	function index() 
	{	
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');	   

		if( !$this->Page->authed() )
		{
			$this->load->view('forum_error', $this->pdata);
		}				
		else
		{
			$this->load->view('forum_main', $this->pdata, $this->fdata);
		}	
		return( true );	
	}
	
	
	//This function pulls all the threads of a given forum from teh DB then calls the forun view.
	
	function view_forum()
	{
		$this->fdata['group_name']=$_POST['group_name'];
		$this->fdata['group_id']=$_POST['group_id'];
	    $this->fdata['query'] = $this->db->get_where('threads', array('group_id' => $this->fdata['group_id']));

		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('forum_view', $this->fdata, $this->pdata);
	}
	
	
	
	//fills fdata with the chosen thread id and all of that threads replies and calls the thread view
	function view_thread()
	{
		$this->fdata['thread_id'] = $this->uri->segment(3);
		$this->db->where('thread_id', $this->uri->segment(3));
		$this->fdata['reply'] = $this->db->get('replies');
		
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('thread_view', $this->fdata, $this->pdata);
	}
  
  
    //calls the create thread view
	function create_thread()
	{
	    $this->fdata['group_name']=$_POST['group_name'];
		$this->fdata['group_id']=$_POST['group_id'];

		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('create_thread_view', $this->pdata, $this->fdata); 
	}
  
  
    //calls the search forum view
	function search_forum()
	{
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('search_forum_view', $this->pdata, $this->fdata);
	}
  
  
    //takes thread id and pulls the topic and the body data from the database and puts it in fdata
	//then calls the edit thread view.
	function edit_thread()
	{
		$id=$_POST['thread_id'];
		$sql="SELECT * FROM threads WHERE thread_id='$id'";
		$current_thread=mysql_fetch_array(mysql_query($sql));
		$this->fdata['id']=$id;
		$this->fdata['topic']=$current_thread['thread_topic'];
		$this->fdata['body']=$current_thread['thread_body'];
	
		$this->pdata['header'] = $this->Page->get_header('forum');	
		$this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('edit_thread_view', $this->pdata, $this->fdata);  
	}
  
    
	//given a thread id and data this function updates the entry in the database
	function thread_update()
	{ 
		$id=$_POST['thread_id'];
		$this->db->where('thread_id', $id);
		$this->db->update('threads', $_POST);
		redirect('forum/view_thread/'.$id);
	} 
    
  
    //inserts a new thread into the database using the group_id, the current time, and the current user.
	function thread_insert()
	{
		$_POST['datetime']=date("d/M/Y h:i:s");
		$_POST['thread_author'] = $this->username;
		$this->db->insert('threads', $_POST);
		redirect('forum/forum/'); 
	}
  
  
    //this function first pulls the num_replies for the current thread from the database and increments it
	//it then inserts the reply into the database then returns you to the thread
	function reply_insert()
	{ 
		//pull the reply count and updates it 
		$id=$_POST['thread_id'];
		$sql="SELECT * FROM threads WHERE thread_id='$id'";
		$thread=mysql_fetch_array(mysql_query($sql));
		$fdata['num_replies']=$thread['num_replies'] + 1;
		$this->db->where('thread_id', $id);
		$this->db->update('threads', $fdata); 
	
		//inserts reply in to database
		$_POST['datetime']=date("d/M/Y h:i:s");
		$_POST['author'] = $this->username;
		$this->db->insert('replies', $_POST);
		redirect('forum/view_thread/'.$_POST['thread_id']);	 
	}
  
  
    //this function deletes a thread and all of it's threads from the database then sends you to the main forum page.
	function delete_thread()
	{
		$id=$_POST['thread_id'];
		mysql_query("DELETE FROM threads WHERE thread_id='$id'");
		mysql_query("DELETE FROM replies WHERE thread_id='$id'");
		redirect('forum/forum');
	}


}
