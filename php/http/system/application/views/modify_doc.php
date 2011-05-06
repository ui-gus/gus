<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>



<?php
	if(!isset($_POST['file']))
	{
		echo "You didn't select a file to modify.<br>";
	}
	else
	{
		echo form_open('docs/do_modify');

		//echo "<input type=\"text\" name=\"new_name\" value=\"" . $_POST['file'] . "\" /> <br>";
		echo "<input type=\"hidden\" name=\"file\" value=\"" . $_POST['file'] . "\" /> <br>";
		echo $_POST['file'] . "<br>";

		echo "Change file permissions<br>";
		echo "<input type=\"radio\" name=\"perm\" value=\"7\" CHECKED/> Admin only<br>";
		echo "<input type=\"radio\" name=\"perm\" value=\"4\"/> Officer and higher<br>";
		echo "<input type=\"radio\" name=\"perm\" value=\"0\"/> Everyone<br>";
		echo "<input type=\"submit\" value=\"Submit\" />";

		echo form_close();
	}
	echo "<a href=" . base_url() . "index.php/docs>Return to docs</a><br>";
?>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>