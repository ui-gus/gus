<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>



<?php
	echo form_open('docs/do_modify');
?>
<!--
File name<br>!-->
<?php
	//echo "<input type=\"text\" name=\"new_name\" value=\"" . $_POST['file'] . "\" /> <br>";
	echo "<input type=\"hidden\" name=\"file\" value=\"" . $_POST['file'] . "\" /> <br>";
	echo $_POST['file'] . "<br>";
?>

Change file permissions<br>
<input type="radio" name="perm" value="7" CHECKED/> Admin only<br>
<input type="radio" name="perm" value="4"/> Officer and higher<br>
<input type="radio" name="perm" value="0"/> Everyone<br>
<input type="submit" value="Submit" />
<?php
	echo form_close();
?>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>