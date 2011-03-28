<?php echo $this->pdata['header'] ?>

<?php
	echo $this->pdata['tinyMCE'];	
	echo $this->pdata['content'];
	//form
	$this->load->helper('form');
	echo "\n<br />" . form_open('pages/save',array('class' => 'page-add', 'id' => 'page-add'));
        echo "\n<br />" . form_input(array(
                        'name'        => 'name',
                        'id'          => 'name',
                        'value'       => $this->pdata['add_name'],
                        'size'        => '80',
                        )
                        );
        echo "\n<br />" . form_textarea(array(
                        'name'	=> 'content',
                        'id'  	=> 'newpagecontent',
                        'value'	=> $this->pdata['add_content'],
                        'cols'	=> '80',
                        'rows'	=> '20',
                        )
			);
	echo "\n<br />" . form_submit('submit', 'Submit');
?>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>
