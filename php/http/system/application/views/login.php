<?php echo $this->pdata['header'] ?>

<?php
	$un = "";
	if(isset($_POST['un'])) $un = $_POST['un'];
	echo $this->pdata['content'];
	//form
	$this->load->helper('form');
	$this->pdata['content'] .= "\n<br />Please Login.";
	echo "\n<br />" . form_open('auth',array('class' => 'login', 'id' => 'login'));
        echo "\n<br />" . form_input(array(
                        'name'        => 'un',
                        'id'          => 'un',
                        'value'       => $un,
                        'maxlength'   => '20',
                        'size'        => '20',
                        )
                        );
        echo "\n<br />" . form_input(array(
                        'name'        => 'pw',
                        'id'          => 'pw',
                        'value'       => '',
                        'maxlength'   => '20',
                        'size'        => '20',
                        'type'        => 'password'
                        )
			);
	echo "\n<br />" . form_submit('login', 'Login');
?>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>
