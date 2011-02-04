<?php

/******************************************************************************
*Gus - Groups in a University Setting
 University of Idaho CS 384 - Spring 2011
 GusPHP Subteam
 File Authors:
                Colby Blair
******************************************************************************/

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
		if($this->db->get_where('user',array('un' => $data['un']))->num_rows < 1) {
			return($this->db->insert('user',$data));
		}
		$this->db->where('un',$data['un']);
		return($this->db->update('user',$data));
	}
}

?>
