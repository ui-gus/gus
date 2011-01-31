<?php echo $this->pdata['header'] ?>

<?php 
	$this->load->helper('form');
	echo $this->pdata['content'];
        echo "\n<br />" . form_open('pages/delete',array('class' => 'pages/delete', 'id' => 'pages/delete'));
	foreach($this->pdata['pagelist'] as $val) {
	 echo form_checkbox(array('name' => "delete_$val",
				'id' => $val,
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
