<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>

<?php 		//Show a list of files
		$path = './uploads';
		$handle = opendir($path);
		if ($handle == false)
			return(false);
                echo "<ul>";
		while (false !== ($filename = readdir($handle))) {
			if ( $filename == "." || $filename == ".." || $filename == "thumbs")
				continue;
			$system=explode('.', $filename); //Get the extension
			echo "<li>$filename<br>";
			//Download button
			echo form_open('docs/downloadFile');
			echo form_hidden('file', $filename);
			echo form_submit('submit', 'Download');//"<input type=\"submit\" value=\"Download\" />";
			echo form_close();

			//Delete button
			echo form_open('docs/deleteFile');
			echo form_hidden('file', $filename);
			echo form_submit('submit', 'Delete');//"<input type=\"submit\" value=\"Delete\" />";
			echo form_close();

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