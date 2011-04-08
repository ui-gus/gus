<?php echo $this->pdata['header'] ?>
<?php echo $this->pdata['content'] ?>

<html>

<head>
	<title>GUS Forum</title>
</head>

<body>
	<h1> <?php echo $this->session->userdata('group_name') ?> Forum</h1>
	<u>Are you sure you wish to delete the thread, "<?php echo $this->fdata['thread_topic'] ?>"?</u><br>
	
		<?php echo form_open('forum/delete_thread');?>
		<?php echo form_hidden('thread_id', $this->fdata['thread_id']);?>
		<input type="submit" value="Yes" />
		</form>
		
		<?php echo form_open('forum/view_thread/'.$this->fdata['thread_id']);?>
		<input type="submit" value="Cancel" />
		</form>
</body>

</html>

<?php echo $this->pdata['footer'] ?>