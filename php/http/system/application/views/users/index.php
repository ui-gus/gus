<?php echo $this->pdata['header'] ?>

<?php 
	$this->load->helper('form');
	echo $this->pdata['content'];
	echo '<a href="' . site_url() . '/users/add">Add</a><br />';
	echo '<a href="' . site_url() . '/users/edit">Edit</a><br />';
	echo '<a href="' . site_url() . '/users/delete">Delete</a><br />';
?>

<?php echo $this->pdata['footer'] ?>
