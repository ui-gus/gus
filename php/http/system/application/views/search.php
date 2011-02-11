<?php echo $this->pdata['header'] ?>

<?php echo $this->pdata['content'] ?>

<?php
	$un = "";
	if(isset($_POST['un'])) $un = $_POST['un'];
	echo $this->pdata['content'];
	//form
	$this->load->helper('form');
	
	echo "\n<br />" . form_open('search',array('class' => 'search', 'id' => 'search'));
        echo "\n Search by Username <br />" . form_input(array(
                        'name'        => 'un',
                        'id'          => 'un',
                        'value'       => '',
                        'maxlength'   => '20',
                        'size'        => '20',
                        'type'        => 'username'
                        )
			);
	echo "\n<br />" . form_submit('search', 'Search');
?>

<?php echo $this->pdata['footer'] ?>