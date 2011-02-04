<?php echo $this->pdata['header'] ?>

<?php 
	$this->load->helper('form');
	echo $this->pdata['content'];
        echo "\n<br />" . form_open('groups/add',array('class' => 'groups/add', 'id' => 'groups/delete'));
	foreach($this->pdata['grouplist'] as $val) {
	 echo form_radio(array(	'name' => 'name',
				'id' => 'groups',
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
