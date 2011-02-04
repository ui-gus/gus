<?php echo $this->pdata['header'] ?>

<?php 	
	echo $this->pdata['content'];
	$this->load->helper('url');
	echo '
<p>Test for models:</p>
 <ul>
  <li><a href="' . site_url() . '/test/page">Page</a>
 </ul>
';
?>

<div class=\"update\">
<p>Page rendered in {elapsed_time} seconds</p>
</div>
<?php echo $this->pdata['footer'] ?>
