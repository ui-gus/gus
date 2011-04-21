<?php echo $this->pdata['header'] ?>

<?php echo $this->pdata['content'] ?>

<?php

	$un = "";
	if(isset($_POST['feedback'])) $feedback = $_POST['feedback'];
	echo $this->pdata['content'];
	//form
	$this->load->helper('form');
	
	echo "\n<br />" . form_open('feedback',array('class' => 'feedback'));
        echo "\n We appreciate any feedback you may have. Thanks for your input: <br />" . form_textarea(array(
                        'name'        => 'feedback',
                        'id'          => 'feedback',
                        'value'       => '',
						'size' 		  => '80',
						'cols' 		  => '90',
						'rows'		  => '20',
                        'type'        => 'feedback'
                        )
			);
	echo "\n<br />" . form_submit('submit', 'Submit');
?>

<?php echo $this->pdata['footer'] ?>