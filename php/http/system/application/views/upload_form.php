<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="Upload" />

</form>

<p><a href="./docs">Return to docs.</a></p>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>