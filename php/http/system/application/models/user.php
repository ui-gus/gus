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
