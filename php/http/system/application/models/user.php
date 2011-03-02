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
		$this->config->load('auth');
	}

	function get_userlist() {
		$this->db->select('un');
                $data = array();
                foreach($this->db->get('user')->result() as $key) {
                        array_push($data,$key->un);
                }
		return($data);
	}

	function get_group_membershiplist($un) {
		$this->db->where('uid', $this->get_id($un));
                $data = array();
                foreach($this->db->get('gid')->result() as $key) {
                        array_push($data,$key->id);
                }
		return($data);
	}

        function get_id($name) {
                $this->db->select('id');
                $this->db->where('un',$name);
                $result = $this->db->get('user')->result();
                return($result[0]->id);
        }

	/**
	 * gets the perm integer from the gus group in the usergroup table
	 * usergroup gus group is used as the global group
	*/
	function get_gus_perm($un) {
		/*
		$this->load->model('Group');
                $this->db->select('perm');
                $this->db->where('uid',$this->get_id($un));
                $this->db->where('gid',$this->Group->get_id("gus"));
                $result = $this->db->get('usergroup')->result();
                return($result[0]->perm);
		*/
		return(000);
	}

	function save($data) {
		if($this->db->get_where('user',array('un' => $data['un']))->num_rows < 1) {		
			return($this->save_apache($data)
				&& $this->db->insert('user',$data)
				);
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

	function save_apache($data) {
		$auth_config = $this->config->item('auth');
		if($auth_config['apache'] === true) {
			//htaccess mode setting
			$hmode = ""; //htaccess mode
			if(file_exists($auth_config['htpasswd_fname'])) {
				$hmode = "-b";
			}
			else $hmode  = "-bc";
			//syscall
			$cmd = 	"htpasswd $hmode " 
			 . $auth_config['htpasswd_fname']
				. " " . $data['un'] . " " . $data['pw'];
			$status1 = system($cmd);
			return($status1 !== false);
		} else return(true); 
		//^if apache mode == false, report everything ok
	}

	function delete_apache($data) {
		$auth_config = $this->config->item('auth');
		if($auth_config['apache'] === true) {
			if(!file_exists($auth_config['htpasswd_fname'])) {
				return(false); 
				//shouldn't be running in apache mode
			}
			//syscall
			$cmd = 	"htpasswd -D " 
			 . $auth_config['htpasswd_fname']
				. " " . $data['un'];
			$status1 = system($cmd);
			return($status1 !== false);
		} else return(true); 
		//^if apache mode == false, report everything ok
	}
}

?>
