<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>

<html>

<head>
  <title>GUS Forum</title>
</head>

<body>
	<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<?php echo form_open('forum/thread_update');?>
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr>
						<td colspan="3" bgcolor="#E6E6E6"><strong>Forum Search</strong> </td>
					</tr>
					<tr>
						<td width="14%"><strong>By Groups</strong></td>
						<td width="84%"><input type="text" name="topic" size="80" /></td>
					</tr>
					<tr>
						<td width="14%"><strong>By User</strong></td>
						<td width="84%"><input type="text" name="topic" size="80" /></td>
					</tr>
					<tr>
						<td width="14%"><strong>By Topic</strong></td>
						<td width="84%"><input type="text" name="topic" size="80" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" value="Submit" /> <input type="reset" value="Reset" /></td>
					</tr>
				</table>
			</td>
			</form>
		</tr>
	</table>
</body>

</html>

<?php echo $this->pdata['footer'] ?>