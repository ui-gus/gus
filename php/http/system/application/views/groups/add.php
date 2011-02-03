<?php echo $this->pdata['header'] ?>

<?php
	echo $this->pdata['content'];
	//form
	$this->load->helper('form');
	echo "\n<br />" . form_open('groups/save',array('class' => 'groups/add', 'id' => 'groups/add'));
        echo "\n<br />Name:<br />\n" . form_input(array(
                        'name'        => 'name',
                        'id'          => 'name',
                        'value'       => $this->pdata['default_name'],
                        'size'        => '20',
                        )
                        );
	echo "\n<br />Description: <br />\n" 
		. form_textarea(array(
                        'name'        => 'description',
                        'id'          => 'name',
                        'value'       => $this->pdata['default_description'],
                        'size'        => '20',
                        )
                        );

	echo "\n<br />" . form_submit('submit', 'Submit');
?>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>
