<?php echo $this->pdata['header'] ?>
<?php echo $this->pdata['content'] ?>

<html>

<head>
	<title>GUS Forum</title>
</head>

<body>
	<h1> <?php echo $this->session->userdata('group_name') ?> Forum</h1>
	<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<?php echo form_open('forum/thread_insert');?>
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr>
						<td colspan="3" bgcolor="#E6E6E6"><strong>Create New Topic</strong> </td>
					</tr>
					<tr>
						<td width="14%"><strong>Title</strong></td>
						<td width="84%"><input type="text" name="thread_topic" size="80" /></td>
					</tr>
					<tr>
						<td valign="top"><strong>Body</strong></td>
						<td><textarea name="thread_body" cols="70" rows="3"></textarea></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="submit" value="Submit" /> <input type="reset" value="Reset" />
							</form>
							<?php echo form_open('forum/view_forum');?>
								<input type="submit" value="Cancel">
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>

</html>

<?php echo $this->pdata['footer'] ?>