<?php

class User extends Model {
	
	function User() {
		parent::Model();	
		$this->load->database();
	}

	function get_userlist() {
		$this->db->select('un');
                $data = array();
                foreach($this->db->get('user')->result() as $key) {
                        array_push($data,$key->un);
                }
		return($data);
	}


	function save($data) {
		if($this->db->get_where('page',array('name' => $data['name']))->num_rows < 1) {
			return($this->db->insert('page',$data));
		}
		$this->db->where('name',$data['name']);
		return($this->db->update('page',$data));
	}
}

?>
