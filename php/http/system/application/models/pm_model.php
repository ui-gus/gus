<?php
class pm_model extends Model{
	
	function pm_model(){
		parent::Model();
	}
	
	function list_messages_to($userid,$location='inbox'){
		$data = array();
		$this->db->where('to_id',$userid);
		$this->db->where('location',$location);
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

	function list_messages_from($userid){
		$data = array();
		$this->db->where('from_id',$userid);
		$this->db->where('location','sent');
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
	
	function move_message($id,$location='archived'){
		$data = array("location" => $location);
		$this->db->where('id',$id);
		$this->db->update('messages',$data);
	
	}
	
	function send_message($userid){
		$now = date("Y-m-d h:i:s");
		$data = array(
			'from_id' => $userid,
			'to_id' => $this->input->post('to_id'),
			'subject' => xss_clean(substr(strip_tags($this->input->post('subject')),0,64)),
			'message' => xss_clean(substr(strip_tags($this->input->post('message'), '<b><i><a>'),0,255)),
			'created' => $now,
			'location' => 'sent'
		);
		
		$this->db->insert("messages",$data);
	
	}
	
}//end class

?>