<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>

<?php 		//load database
		$this->load->database('default', TRUE);
		$this->load->model('User');
		$this->load->model('Group');

		$un = $this->session->userdata('un');
		$uid = $this->User->get_id($un);
		$list_of_files = array();

		$path = './uploads';

		$handle = opendir($path);
		if ($handle == false)
			return(false);
              //echo "<ul>";

		while (false !== ($filename = readdir($handle))) {
			if ( $filename == "." || $filename == ".." || $filename == "thumbs")
				continue;
			$query="";
			$fgid=-1;
			$groupname="";
			$fperm=8;
			//get file group membership and permissions
			$this->db->where('filename',$filename);
			$query=$this->db->get('files')->result_array();
			foreach($query as $key)
			{
				$fgid=$key['gid'];	//file group membership
				$groupname=$this->Group->get_name($key['gid']);
				$fperm=$key['perm']; //file permissions
				$fsize=$key['size']; //file size
				$fdate=str_split($key['date']); //file upload date
				$fuploader=$key['uid'];
				//echo $fgid . $fperm . $groupname;
			}

			$grouplist = $this->pdata['grouplist'];

			foreach($grouplist as $key)
			{
				//if(in_array($fgid, $key) && $fperm <= $key['perm']){  //Display all files from groups you are a member and have sufficient permissions in
				if(in_array($fgid, $key) && $fuploader == $uid) { //Display all files you've uploaded to groups you're a member of
				//Get list of files
				array_push($list_of_files, $filename);
				}
			}
		}
              //echo "</ul>";
              closedir($handle);
	echo "<h3><u> User Files </u></h3>"
	  . anchor( 'upload', "Upload a File") . "<br>";
	if( empty($list_of_files))
	{
		echo "You haven't uploaded any files.<br>";
	}
	else
	{
		//Table
		echo "<table id=\"user\"><tr>";
		$i = 1;
		$file = '';
		$img = '';

		foreach($list_of_files as $key)
		{
			if ($i == 1)
			{
				echo "<tr>";
			}
			echo "<td>";
			
			$img = "<img src=\"" . base_url() . "uploads/" . $key . "\" width=\"100\" height=\"100\" "
			   . "style = \"border:0px none\" onerror=\"this.src='".base_url()
      			   ."/templates/generic-file.png'\">";

			if(strlen ($key) > 12 )
			{
				$name = substr($key, 0, 12);
				$name .= "...";
			}
			else
			{
				$name = $key;
			}
			echo anchor('docs/view/' . $key, $img) . "<br>"
			  . $name . "<br>";
			echo "</td>";
			if ( $i == 6)
			{
				echo "</tr><tr>";
				$i = 1;
			}
			$i++;
		}
			
		//echo $key . "<br>";
		
	}
?>



<?php echo $this->pdata['footer'] ?>