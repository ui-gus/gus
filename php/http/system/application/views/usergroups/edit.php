<?php echo $this->pdata['header'] ?>

<?php 
	$this->load->helper('form');
	echo $this->pdata['content'];
        echo "\n<br />" . form_open('users/add',array('class' => 'users/add', 'id' => 'users/delete'));
	foreach($this->pdata['userlist'] as $val) {
	 echo form_radio(array(	'name' => 'un',
				'id' => 'users',
				'value' => $val,
				'checked' => FALSE
				)
			) . "$val<br />\n";
	}
	echo "\n<br />" . form_submit('edit', 'Edit');
?>

<div class=\"update\">
<p>Page rendered in {elapsed_time} seconds</p>
</div>
<?php echo $this->pdata['footer'] ?>
