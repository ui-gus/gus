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

        function get_membershiplist($un) {
                $ci = get_instance();
		$ci->load->model('User');
		$this->db->where('uid', $this->User->get_id($un));
                $data = array();
		$query = $this->db->get('usergroup')->result(); 
                foreach($query as $key) {
	   	 $perm = array('read' => ($key->perm & 4) == 4,
                                        'write' => ($key->perm & 2) == 2,
                                        'execute' => ($key->perm & 1) == 1
                                );
 	 	 if(empty($data)) {
		  $data = array($this->get_name($key->gid) => $perm);
		  } else {       
	           $data[$this->get_name($key->gid)] = $perm; 
		  }
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
		if(empty($result)) return(false);
		return($result[0]->id);
	}

	function get_name($id) {
		$this->db->select('name');
		$this->db->where('id',$id);	
		$result = $this->db->get('ggroup')->result();
		return($result[0]->name);
	}

	/**
         * gets the perm integer from the gus group in the usergroup table
         * usergroup gus group is used as the global group
        */
        function get_perm($un, $gn) {
		$ci =& get_instance();
                $ci->load->model('User');
                $uid = $ci->User->get_id($un);
		$gid = $this->get_id($gn);
                $this->db->select('perm');
                $this->db->where('uid',$uid);
		$this->db->where('gid',$gid);
		$result = $this->db->get('usergroup')->result();
        	if(empty($result)) return(0);
	        return($result[0]->perm);
        }

	function save($data) {
		if($this->db->get_where('ggroup',array('name' => $data['name']))->num_rows < 1) {
			return($this->db->insert('ggroup',$data));
		}
		$this->db->where('name',$data['name']);
		return($this->db->update('ggroup',$data));
	}

	function add_member($gname, $uname,$perm) {
		$this->load->model('User');
		$gid = $this->get_id($gname);
		$uid = $this->User->get_id($uname);
		$data = array('gid' => $gid, 
				'uid' => $uid,
				'perm' => $perm['read'] * 4
					 + $perm['write'] * 2
					+ $perm['execute'] * 1
				);
		if($this->db->get_where('usergroup',
					array('gid' => $data['gid'],
						'uid' => $data['uid']
						)
					)->num_rows < 1
		) {
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
