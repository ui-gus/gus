<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>

<?php 		//load database
		$this->load->database('default', TRUE);
		$this->load->model('User');
		$this->load->model('Group');

		//Show a list of files
		$path = './uploads';

		$handle = opendir($path);
		if ($handle == false)
			return(false);
                echo "<ul>";

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

//print_r (array_values($grouplist));

			foreach($grouplist as $key)
			{
			if(in_array($fgid, $key) && $fperm <= $key['perm']){ 
//echo "test<br>";
			//Only display files if you're a member of that group and have sufficient permissions
			$system=explode('.', $filename); //Get the extension
			echo "<li>" . $filename . " owned by " . $groupname . " with permissions " . $fperm . "<br>";
			echo "Size: " . $fsize . "<br>" . "Upload date: " . $fdate['4'] . $fdate['5'] . "/";
			echo $fdate['6'] . $fdate['7'] . "/" . $fdate['0'] . $fdate['1'] . $fdate['2'] . $fdate['3'] . "<br>";
			echo "Uploader: " . $fuploader . "<br>";

			//Download button
			echo form_open('docs/downloadFile');
			echo form_hidden('file', $filename);
			echo form_submit('submit', 'Download');//"<input type=\"submit\" value=\"Download\" />";
			echo form_close();

			//Delete button
			if($key['perm'] == 7) //You need to be a group officer/admin to delete files
			{
			echo form_open('docs/deleteFile');
			echo form_hidden('file', $filename);
			echo form_submit('submit', 'Delete');//"<input type=\"submit\" value=\"Delete\" />";
			echo form_close();
			}

			//Edit button
			if($key['perm'] == 7) //You need to be a group officer/admin to modify files
			{
			echo form_open('docs/modifyFile');
			echo form_hidden('file', $filename);
			echo form_submit('submit', 'Modify');//"<input type=\"submit\" value=\"Modify\" />";
			echo form_close();
			}

			//View button
			if (preg_match('/jpg|jpeg|png|bmp|pdf|gif|txt/', $system[1])){  //Viewable extentsions
				echo form_open('docs/viewFile');
				echo form_hidden('file', $filename);
				echo form_submit('submit', 'View');
				echo form_close();
			}
			
			//Display thumbnail
			$name= "uploads/thumbs/tn_" . $filename;
			if (preg_match('/jpg|jpeg|png|gif/', $system[1])){
				echo "<img src=../" . $name . ">";
			}
			}
			}
		}
                echo "</ul>";
                closedir($handle);
?>

<?php // $link = "<a href=\"" . site_url() . "/upload\">Upload</a>";
//echo "<p>";
//echo $link;
echo "<p><a href=" . site_url() . "/upload>Upload</a> a new file.</p>"
//echo " a new file.</p>"; ?>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>