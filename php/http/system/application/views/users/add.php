<?php echo $this->pdata['header'] ?>

Add a User

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
	echo "<p>Add user to group (optional):</p>\n";
	echo "<table>\n";
	echo " <tr>\n";
	echo "  <td>group name</td>\n";
	echo "  <td>member</td>\n";
	echo "  <td>r</td>\n";
	echo "  <td>w</td>\n";
	echo "  <td>x</td>\n";

	foreach($this->pdata['grouplist'] as $key) {
                echo " <tr>\n";
                echo "  <td>$key:</td>\n";
                echo "  <td>" . form_checkbox(
				 array("name" => 'grouplist[]', 
				 "value" => $key,
				 'checked' => isset($this->pdata['membershiplist'][$key]) 
				 )
				) . "  </td>\n";
		echo "  <td>" . form_checkbox(
				 array("name" => $key ."[]",
					'id' => 'perm',
					'value' => 'read',
					'checked' => isset($this->pdata['membershiplist'][$key]['read']) && $this->pdata['membershiplist'][$key]['read'] === true
					)
				) . "</td>\n";
		echo "  <td>" . form_checkbox(
				 array("name" => $key ."[]",
					'id' => 'perm',
					'value' => 'write',
					'checked' => isset($this->pdata['membershiplist'][$key]['write']) && $this->pdata['membershiplist'][$key]['write'] === true
					)
				) . "</td>\n";
		echo "  <td>" . form_checkbox(
				 array("name" => $key ."[]",
					'id' => 'perm',
					'value' => 'execute',
					'checked' => isset($this->pdata['membershiplist'][$key]['execute']) && $this->pdata['membershiplist'][$key]['execute'] === true
					)
				) . "</td>\n";

                echo " </tr>\n";
        }
	echo "</table>\n";

	echo "\n<br />" . form_submit('submit', 'Submit');
?>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>
