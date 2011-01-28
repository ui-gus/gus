<?php echo $this->pdata['header'] ?>

<?php
	$name = "";
	if(isset($_POST['name'])) $name = $_POST['name'];
	echo $this->pdata['content'];
	//form
	$this->load->helper('form');
	echo "\n<br />" . form_open('pages/save',array('class' => 'page-add', 'id' => 'page-add'));
        echo "\n<br />" . form_input(array(
                        'name'        => 'name',
                        'id'          => 'name',
                        'value'       => $name,
                        'size'        => '80',
                        )
                        );
        echo "\n<br />" . form_textarea(array(
                        'name'	=> 'content',
                        'id'  	=> 'content',
                        'value'	=> '',
                        'cols'	=> '80',
                        'rows'	=> '20',
                        )
			);
	echo "\n<br />" . form_submit('login', 'Login');
?>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>
