<?php echo $this->pdata['header'] ?>

<?php 
	$this->load->helper('form');
	echo $this->pdata['content'];
        echo "\n<br />" . form_open('users/delete',array('class' => 'users/delete', 'id' => 'users/delete'));
	foreach($this->pdata['userlist'] as $val) {
	 echo form_checkbox(array('name' => 'un',
				'id' => 'users',
				'value' => $val,
				'checked' => FALSE
				)
			) . "$val<br />\n";
	}
	echo "\n<br />" . form_submit('delete', 'Delete');
?>

<div class=\"update\">
<p>Page rendered in {elapsed_time} seconds</p>
</div>
<?php echo $this->pdata['footer'] ?>
