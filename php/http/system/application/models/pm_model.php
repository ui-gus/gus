<?php
class Pm_model extends Model{
	
	function Pm_model(){
		parent::Model();
		$this->load->database();
		$this->load->model('user');
		$this->load->model('Group');
		$this->load->library('table');
		$this->load->library('session');
		$this->load->helper('date');
	}
	
	function list_messages_to($userid, $location){
		$temp = 0;
		$flag = 0;
		$query = $this->db->get('user');
		
		$data = array();
		$this->db->where('from_id',$userid);
		$this->db->where('location', $location);
		$this->db->order_by('created','desc');
		$Q = $this->db->get("messages");
		
		if ($Q->num_rows() > 0){
			foreach ($Q->result() as $row){
				$data[] = $row;
			}
		}
		//echo $this->db->last_query();
		$Q->free_result();		
		return $data;		
	}

	function list_messages_from($userid,$location){
		$temp = 0;
		$flag = 0;
		$query = $this->db->get('user');

		$data = array();
		$this->db->where('from_id',$userid);
		$this->db->where('location', $location);
		$this->db->order_by('created','desc');
		$Q = $this->db->get("messages");
		if ($Q->num_rows() > 0){
			foreach ($Q->result() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();		
		return $data;		
	}

	function get_message($id){
		$data = array();
		$this->db->where('id',$id);
		$this->db->limit(1);
		$Q = $this->db->get('messages');
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		
		$Q->free_result();		
		return $data;			
	}
	
	
	function delete_message($id){
		$this->db->limit(1);
		$this->db->where('id', $id);
		$this->db->delete('messages');	
	
	}
	
	function move_message($id,$location){
		$data = array("location" => $location);
		$this->db->where('id',$id);
		$this->db->update('messages',$data);
	
	}
	
	function send_message($userid){	
			$now = date("Y-m-d h:i:s");
			$query = $this->db->get('user');
			$temp = 0;
			$flag = 0;
	
			$dat =  $this->pm_model->get_useridlist();
			
			$data = array(
				'from_id' => $userid,
				'to_id' => $dat[$this->input->post('to_id')],
				'subject' => substr(strip_tags($this->input->post('subject')),0,64),
				'message' => substr(strip_tags($this->input->post('message'), '<b><i><a>'),0,255),
				'created' => $now,
				'location' => 'sent',
			);
				$this->db->insert("messages" , $data);	
				
				$email = $this->pm_model->get_email($data['to_id']);			
																				
				$this->load->library('email');  
				$this->email->from('GUSPHP@gusphp.com','GUSPHP TEAM');  
				$this->email->to($email);  
				$this->email->subject($this->User->get_name($userid)." sent you a message");  
				$this->email->message($this->User->get_name($userid)." messaged you.\n\r\n\r".$this->User->get_name($userid).
				" ".$data['created']."\n\n\r\r"."Subject: " .$data['subject']."\n\n\r\r".$data['message']. "\n\n\r\r".
				"To view and reply to messages go to http://www.nwerp.org/gus/");              		  		
				$this->email->send();				
				
	     	$data = array(
					'to_id' => $userid,
					'from_id' => $dat[$this->input->post('to_id')],
					'subject' => substr(strip_tags($this->input->post('subject')),0,64),
					'message' => substr(strip_tags($this->input->post('message'), '<b><i><a>'),0,255),
					'created' => $now,
					'location' => 'inbox',
				);
					$this->db->insert("messages" , $data);
							
		}
		
		function get_useridlist() {
			$this->db->select('id');
	                $data = array();
	                foreach($this->db->get('user')->result() as $key) {
	                        array_push($data,$key->id);
	                }
			return($data);
		}
		
		function get_email($id) {
	                $this->db->select('email');
	                $this->db->where('id',$id);
	                $result = $this->db->get('user')->result();
	                return($result[0]->email);
	        }
	
		function get_groupuserlist($check) {
				$this->db->select('uid');
				$this->db->select('gid');
				
		                $data = array();
		                foreach($this->db->get('usergroup')->result() as $key) {
								if($check == $key->gid){
		                        array_push($data,$key->uid);}
		                }
				return($data);
			}
	
}//end class

?>