<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>

<?php 		//Show a list of files
		$path = './uploads';
		$handle = opendir($path);
		if ($handle == false) //Directory doesn't exist!
			return(false);
                echo "<ul>";
		while (false !== ($filename = readdir($handle))) { //Print a list of the files
			if ( $filename == "." || $filename == "..")
				continue;
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
		}
                echo "</ul>";
                closedir($handle);
?>

<?php $link = "<a href=\"" . site_url() . "/upload\">Upload</a>";
echo "<p>";
echo $link;
echo " a new file.</p>"; ?>



<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>
