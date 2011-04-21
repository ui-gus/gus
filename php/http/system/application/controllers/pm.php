<?php
session_start();

class Pm extends Controller {
	var $pdata;
	var $testmode;

	function Pm()
	{
		parent::Controller();	
		$this->load->model('Page');
		$this->load->model('pm_model');
		$page_name = 'pm';
               	$this->pdata['header'] = $this->Page->get_header($page_name);
                $this->pdata['content'] = $this->Page->get_content($page_name);
		$this->pdata['footer'] = $this->Page->get_footer();
	}

	function inbox(){
		redirect('pm/index', 'refresh');
//		$this->load->view('pm/inbox',$this->pdata,$this->testmode);
	}
	
	
	function view_message($id){
		$this->load->model('User');
		$msg = $this->pm_model->get_message($id);
		$data['title'] = $msg->subject;
		$data['main_view'] = 'pm/view_message';
		$data['user'] = $this->Page->get_un();
		$data['msg'] = $msg;
		$data['usernames'] = $this->User->get_userlist();
		$this->load->vars($data);
		$this->load->view('pm/view_message',$this->pdata,$this->testmode);
	}

	function index(){
		$this->load->model('User');
		$data['title'] = 'Your Inbox';
		$data['main_view'] = 'pm/inbox';
		$data['user'] = $this->Page->get_un();
		$data['messages'] = $this->pm_model->list_messages_to($this->Page->get_uid(),'inbox');
		$data['usernames'] = $this->User->get_userlist();
		$this->load->vars($data);
		$this->load->view('pm/inbox',$this->pdata,$this->testmode);		
		
	}

	function sent(){
		$this->load->model('User');
		$data['title'] = 'Sent Messages';
		$data['main_view'] = 'pm/sent';
		$data['user'] = $this->Page->get_un();
		$data['messages'] = $this->pm_model->list_messages_from($this->Page->get_uid(),'sent' );
		$data['usernames'] = $this->User->get_userlist();
		$this->load->vars($data);
		$this->load->view('pm/sent',$this->pdata,$this->testmode);		
		
	}	

	function archive(){
		$this->load->model('User');
		$data['title'] = 'Your Archives';
		$data['main_view'] = 'pm/archive';
		$data['user'] = $this->Page->get_un();
		$data['messages'] = $this->pm_model->list_messages_to($this->Page->get_uid(),'archived');
		$data['usernames'] = $this->User->get_userlist();
		$this->load->vars($data);
		$this->load->view('pm/archive',$this->pdata,$this->testmode);		
		
	}

	function compose(){
		if( !$this->Page->authed() )
		{
			$this->pdata['message'] = "You must be logged in to view this page.";
			$this->load->view('/pm/pm_error', $this->pdata);
		}
		else
		{
		$this->load->model('User');
		$data['title'] = 'Compose Message';
		$data['main_view'] = 'pm/compose';
		$data['user'] = $this->Page->get_un();
		$data['usernames'] = $this->User->get_userlist();
		$this->load->vars($data);
		$this->load->view('pm/compose',$this->pdata,$this->testmode);	}	
	}

	function respond($id){
		$this->load->model('User');
		$data['title'] = 'Respond';
		$data['respondid'] = $id;
		$data['message'] = $this->pm_model->get_message($id);
		$data['main_view'] = 'pm/respond';
		$data['user'] = $this->Page->get_un();
		$data['usernames'] = $this->User->get_userlist();
		$this->load->vars($data);
		$this->load->view('pm/respond',$this->pdata,$this->testmode);		
		
	}
	
	
	function send_message(){
				$this->load->model('User');
				$this->pm_model->send_message($this->Page->get_uid());
				redirect('pm/index','refresh');	
	}
	
	function archive_message($id){
		$this->load->model('User');
		$this->pm_model->move_message($id, 'archived');
		redirect('pm/index','refresh');
	
	}	
	
	function inbox_message($id){
		$this->load->model('User');
		$this->pm_model->move_message($id,'inbox');
		redirect('pm/index','refresh');
	
	}		
	
}
