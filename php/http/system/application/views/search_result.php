<?php echo $this->pdata['header'] ?>

<?php echo $this->pdata['content'] ?>

Search Results:
<br><br>
<table>
	<tr>
		<th><b>By Username</b></th>
	</tr>
	<tr>
		<td><p><?php echo $this->pdata['results'] ?></p></td>
	</tr>
</table>

<?php echo $this->pdata['footer'] ?>