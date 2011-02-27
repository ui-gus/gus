<?php echo $this->pdata['header'] ?>

<?php
	echo $this->pdata['content'];
	//form
	$this->load->helper('form');
	echo "\n<br />" . form_open('usergroups/save',array('class' => 'usergroups/add', 'id' => 'usergroups/add'));
?>

<h2>1. Select User(s)</h1>

<table>
 <tr>
  <td>Users</td>
  <td></td>
 </tr>
 <tr>
<?php
	foreach($this->pdata['userlist'] as $key) {
		echo "<tr>\n";
		echo "<td>$key:</td>\n";
		echo "<td>" . form_checkbox('userlist', $key) . "</td>\n";
		echo "</tr>\n";
	}
?>
 </tr>
</table>

<h2>2. Add to Group(s)</h1>

<table>
 <tr>
  <td>Group</td>
  <td></td>
 </tr>
 <tr>
<?php
	foreach($this->pdata['grouplist'] as $key) {
		echo "<tr>\n";
		echo "<td>$key:</td>\n";
		echo "<td>" . form_checkbox('grouplist', $key) . "</td>\n";
		echo "</tr>\n";
	}
?>
 </td>
 </tr>
</table>

<?php echo "\n<br />" . form_submit('submit', 'Submit') ?>

<p>Page rendered in {elapsed_time} seconds</p>

<?php echo $this->pdata['footer'] ?>
