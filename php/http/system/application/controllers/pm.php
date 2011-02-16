<?php

class Pm extends Controller {

	function Pm()
	{
		parent::Controller();
		$this->load->model('PM_Model');
		$this->PM_Model->initialise(1);
	}
	
	function index()
	{
		$this->messages();
	}
	
	function message()
	{
		$id=$this->uri->segment(3);
		
		$messages=$this->PM_Model->getmessage($id);
		
		$this->PM_Model->viewed($id);
		
		$data['messages']=$messages;
		
		$this->load->view('pm/list', $data);
	}
	
	function messages()
	{
		$type=$this->uri->segment(3);
		$messages=array();
		
		switch($type)
		{
			case 'new': 
				$messages=$this->PM_Model->getmessages(0);
				break;

			case 'sent': 
				$messages=$this->PM_Model->getmessages(2); 
				break;

			case 'viewed': 
				$messages=$this->PM_Model->getmessages(1); 
				break;

			case 'trashed': 
				$messages=$this->PM_Model->getmessages(3); 
				break;
			// get all
			default: 
				$messages=$this->PM_Model->getmessages();
				break;
		}
					
		$data['messages']=$messages;
		
		$this->load->view('pm/detail', $data);
	}
	
	function compose($replyto='')
	{
		$arrPost=$_POST;
		$msg="";
		
		if(!empty($arrPost['btnPost']))
		{
			if(!empty($arrPost['txtTo']))
			{
				$to=$arrPost['txtTo'];
				$title=$arrPost['txtTitle'];
				$message=$arrPost['txtMessage'];
				
				if($this->PM_Model->sendmessage($to,$title,$message)) {
        				$this->load->helper('url');
					redirect("/pm");
				} else {
					$msg="Failure message";
				}
			}
			else
				$msg="Invalid message";
		}
		
		$data['msg']=$msg;
		$this->load->view('pm/compose', $data);
	}
}

?>
