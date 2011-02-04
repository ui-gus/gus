<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'];

	$this->load->helper('url');

echo '<br /><br />
<a href="' . site_url() . '/groups/add">Add</a><br />
<a href="' . site_url() . '/groups/edit">Edit</a><br />
<a href="' . site_url() . '/groups/delete">Delete</a><br />
';

?>
<div class=\"update\">
<p>Page rendered in {elapsed_time} seconds</p>
</div>
<?php echo $this->pdata['footer'] ?>
