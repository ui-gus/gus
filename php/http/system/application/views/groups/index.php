<?php echo $this->pdata['header'] ?>

<?php 
	$this->load->helper('form');
	echo $this->pdata['content'];
	echo '<a href="' . site_url() . '/groups/add">Add</a><br />';
	echo '<a href="' . site_url() . '/groups/edit">Edit</a><br />';
	echo '<a href="' . site_url() . '/groups/delete">Delete</a><br />';
?>

<?php echo $this->pdata['footer'] ?>
