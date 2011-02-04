<?php echo $this->pdata['header'] ?>

<?php
	echo $this->pdata['content'];
	//form
	$this->load->helper('form');
	echo "\n<br />" . form_open('users/save',array('class' => 'users/add', 'id' => 'users/add'));
        echo "\n<br />" . form_input(array(
                        'name'        => 'un',
                        'id'          => 'name',
                        'value'       => $this->pdata['default_un'],
                        'size'        => '20',
                        )
                        );
	echo "\n<br />" . form_input(array(
                        'name'        => 'pw',
                        'id'          => 'name',
			'type'	      => 'password',
                        'value'       => '',
                        'size'        => '20',
                        )
                        );

	echo "\n<br />" . form_submit('submit', 'Submit');
?>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>
