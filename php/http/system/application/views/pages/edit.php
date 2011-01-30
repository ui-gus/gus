<?php echo $this->pdata['header'] ?>

<?php 
	$this->load->helper('form');
	echo $this->pdata['content'];
        echo "\n<br />" . form_open('pages/add',array('class' => 'page-edit_delete', 'id' => 'page-edit_delete'));
	foreach($this->pdata['pagelist'] as $val) {
	 echo form_radio(array(	'name' => 'name',
				'id' => 'pages',
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
