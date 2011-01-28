<?php echo $this->pdata['header'] ?>

<?php
	$un = "";
	$name = "";
	if(isset($_POST['un'])) $un = $_POST['un'];
	if(isset($_POST['name'])) $name = $_POST['name'];
	echo $this->pdata['content'];
	//form
	$this->load->helper('form');
	$this->pdata['content'] .= "<b>Add a group to your gus server:</b><br>";
	echo "\n<br />" . form_open('save',array('class' => 'group-add', 'id' => 'group-add'));
        echo "\n<br />" . form_input(array(
                        'name'        => 'name',
                        'id'          => 'name',
                        'value'       => '',
                        'maxlength'   => '50',
                        'size'        => '50',
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
        echo "\n<br />" . form_input(array(
                        'name'        => 'leader',
                        'id'          => 'un',
                        'value'       => $un,
                        'maxlength'   => '20',
                        'size'        => '20',
                        'type'        => 'password'
                        )
			);
        echo "\n<br />" . form_textarea(array(
                        'name'	=> 'description',
                        'id'  	=> 'description',
                        'value'	=> '',
                        'cols'	=> '80',
                        'rows'	=> '20',
                        )
			);
	echo "\n<br />" . form_submit('group-add', 'group-add');
?>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>
