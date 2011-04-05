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
			
			//Make and display thumbnail
			$new_w = 100;
			$new_h = 100;
			$name= "uploads/thumbs/tn_" . $filename;
			$filenamepath= "uploads/" . $filename;
			if (preg_match('/jpg|jpeg|png/', $system[1])){
				if (preg_match('/jpg|jpeg/', $system[1])){
					$src_img=imagecreatefromjpeg($filenamepath);
				}
				if (preg_match('/png/', $system[1])){
					$src_img=imagecreatefrompng($filenamepath);
				}
				$old_x=imageSX($src_img);
				$old_y=imageSY($src_img);
				if ($old_x > $old_y) {
					$thumb_w=$new_w;
					$thumb_h=$old_y*($new_h/$old_x);
				}
				if ($old_x < $old_y) {
					$thumb_w=$old_x*($new_w/$old_y);
					$thumb_h=$new_h;
				}
				if ($old_x == $old_y) {
					$thumb_w=$new_w;
					$thumb_h=$new_h;
				}
				$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
				imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
				if (preg_match("/png/",$system[1]))
				{
					imagepng($dst_img,$name); 
				} else {
					imagejpeg($dst_img,$name); 
				}
				imagedestroy($dst_img); 
				imagedestroy($src_img);
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