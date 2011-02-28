<?php

/******************************************************************************
*Gus - Groups in a University Setting
 University of Idaho CS 384 - Spring 2011
 GusPHP Subteam
 File Authors:
                Colby Blair
******************************************************************************/

class Group extends Model {
	
	function Group() {
		parent::Model();	
		$this->load->database();
	}

	function get_grouplist() {
		$this->db->select('name');
                $data = array();
                foreach($this->db->get('ggroup')->result() as $key) {
                        array_push($data,$key->name);
                }
		return($data);
	}

	function get_description($name) {
		$this->db->select('description');
		$this->db->where('name',$name);	
		$result = $this->db->get('ggroup')->result();
		return($result[0]->description);
	}

	function get_id($name) {
		$this->db->select('id');
		$this->db->where('name',$name);	
		$result = $this->db->get('ggroup')->result();
		return($result[0]->id);
	}

	function save($data) {
		if($this->db->get_where('ggroup',array('name' => $data['name']))->num_rows < 1) {
			return($this->db->insert('ggroup',$data));
		}
		$this->db->where('name',$data['name']);
		return($this->db->update('ggroup',$data));
	}

	function add_member($gname, $uname) {
		$this->load->model('User');
		$gid = $this->get_id($gname);
		$uid = $this->User->get_id($uname);
		$data = array('gid' => $gid, 'uid' => $uid);
		if($this->db->get_where('usergroup',$data)->num_rows < 1) {
			return($this->db->insert('usergroup', $data));
		}
		$this->db->where('gid',$gid);
		$this->db->where('uid',$uid);
		return($this->db->update('usergroup',$data));
	}

	function delete_member($gname, $uname) {
		$this->load->model('User');
		$gid = $this->get_id($gname);
		$uid = $this->User->get_id($uname);
		$data = array('gid' => $gid, 'uid' => $uid);
		return($this->db->delete('usergroup',$data));
	}
}

?>
