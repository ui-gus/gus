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

	function save($data) {
		if($this->db->get_where('ggroup',array('name' => $data['name']))->num_rows < 1) {
			return($this->db->insert('ggroup',$data));
		}
		$this->db->where('name',$data['name']);
		return($this->db->update('ggroup',$data));
	}
}

?>
