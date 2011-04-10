<?php
session_start();

class Pm extends Controller {

	function Pm()
	{
		parent::Controller();	
		$this->load->model('Page');
	}

	function inbox(){
		redirect('pm/index', 'refresh');
	}
	
	
	function view_message($id){
		$msg = $this->m_messages->get_message($id);
		$data['title'] = $msg->subject;
		$data['main_view'] = 'pm/view_message';
		$data['user'] = $this->Page->get_un();
		$data['msg'] = $msg;
		$data['usernames'] = $this->m_users->list_user_names();
		$this->load->vars($data);
	}

	function index(){
		$data['title'] = 'Your Inbox';
		$data['main_view'] = 'pm/inbox';
		$data['user'] = $_SESSION['logged_in_user'];
		$data['messages'] = $this->m_messages->list_messages_to($_SESSION['userid']);
		$data['usernames'] = $this->m_users->list_user_names();
		$this->load->vars($data);
	}

	function sent(){
		$data['title'] = 'Sent Messages';
		$data['main_view'] = 'pm/sent';
		$data['user'] = $_SESSION['logged_in_user'];
		$data['messages'] = $this->m_messages->list_messages_from($_SESSION['userid']);
		$data['usernames'] = $this->m_users->list_user_names();
		$this->load->vars($data);
	}	

	function archive(){
		$data['title'] = 'Your Archives';
		$data['main_view'] = 'pm/archive';
		$data['user'] = $_SESSION['logged_in_user'];
		$data['messages'] = $this->m_messages->list_messages_to($_SESSION['userid'],'archived');
		$data['usernames'] = $this->m_users->list_user_names();
		$this->load->vars($data);
	}

	function compose(){
		$data['title'] = 'Compose Message';
		$data['main_view'] = 'pm/compose';
		$data['user'] = $_SESSION['logged_in_user'];
		$data['usernames'] = $this->m_users->list_user_names();
		$this->load->vars($data);
	}

	function respond($id){
		$data['title'] = 'Respond';
		$data['respondid'] = $id;
		$data['message'] = $this->m_messages->get_message($id);
		$data['main_view'] = 'pm/respond';
		$data['user'] = $_SESSION['logged_in_user'];
		$data['usernames'] = $this->m_users->list_user_names();
		$this->load->vars($data);
	}
	
	
	function send_message(){
		$this->m_messages->send_message($_SESSION['userid']);
		redirect('pm/index','refresh');
	
	}
	
	function archive_message($id){
		$this->m_messages->move_message($id);
		redirect('pm/index','refresh');
	
	}	
	
	function inbox_message($id){
		$this->m_messages->move_message($id,'inbox');
		redirect('pm/index','refresh');
	
	}		
	
}
