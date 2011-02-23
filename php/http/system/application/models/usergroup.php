<?php

/******************************************************************************
*Gus - Groups in a University Setting
 University of Idaho CS 384 - Spring 2011
 GusPHP Subteam
 File Authors:
                Colby Blair
******************************************************************************/

class UserGroup extends Model {
	
	function UserGroup() {
		parent::Model();	
		$this->load->database();		
	}

	function save($data) {
		$this->load->model('User');
		if($this->db->get_where('usergroup',array('un' => $data['un']))->num_rows < 1) {		
			return($this->db->insert('user',$data));
		}
		$this->db->where('un',$data['un']);
		return($this->save_apache($data)
			&& $this->db->update('user',$data)
			);
	}

	function delete($data) {
		$this->load->database('admin');
		return($this->db->delete('user',$data)
			&& $this->delete_apache($data)
			);
	}
}

?>
