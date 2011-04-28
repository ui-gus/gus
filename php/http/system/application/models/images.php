<?php

/******************************************************************************
*Gus - Groups in a University Setting
 University of Idaho CS 384 - Spring 2011
 GusPHP Subteam
 File Authors:
                Alex Nilson
******************************************************************************/

class Images extends Model {
	
	function Images() {
		parent::Model();	
		$this->load->database();
		$this->load->model('User');
	}

/*Function for getting a list of a user's uploaded images*/
	function get_users_pics($uid) 
	{

		$ci = get_instance();
		$ci->load->model('User');
		$images = array();

		$this->db->where('uid',$uid);
		$query=$this->db->get('files')->result_array();
		foreach ( $query as $key)
		{
			if ($key['image'])
			{
				//echo $key['filename'] . "<br>";
				array_push($images, $key['filename']);
			}
		}
		return($images);
        }

/*Function for getting a list of a group's uploaded images*/
	function get_groups_pics($gid) 
	{
		$ci = get_instance();
		$ci->load->model('User');
		$images = array();

		$this->db->where('gid',$gid);
		$query=$this->db->get('files')->result_array();
		foreach ( $query as $key)
		{
		 if(isset($key['image'])) {
			if ($key['image'])
			{
			//echo $key['filename'] . "<br>";
			array_push($images, $key['filename']);
			}
		 }//end if isset key image
		}
		return ($images);
	}

	function get_groups_files($gid) 
	{
	  $ci = get_instance();
	  $ci->load->model('User');
	  $images = array();
	  $image = array();
	  
	  $this->db->where('gid',$gid);
	  $query=$this->db->get('files')->result_array();
	  foreach ( $query as $key)
	    {
	      if(isset($key['image'])) {
		$image = array();
		$image['filename'] = $key['filename'];
		$image['image'] = $key['image'];
		array_push( $images, $image );
		
	      }//end if isset key image
	    }
	  return ($images);
	}
}

?>
