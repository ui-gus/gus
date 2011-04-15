<?php echo $this->pdata['header'] ?>
<?php echo $this->pdata['content'] ?>

<html>

<head>
	<title>GUS Forum</title>
</head>

<body>
	<h1> <?php echo $this->session->userdata('group_name') ?> Forum</h1>

	<div class="update">
	<script type="text/javascript" src="http://localhost/gus/php/http/scripts/tiny_mce/tiny_mce.js"></script>

	<script type="text/javascript">
		tinyMCE.init(
		{
			mode : "exact",
			elements : "new_thread_body",
			theme : "advanced",	
			theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,|,fontselect,fontsizeselect,formatselect",
			theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,image",  
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "bottom",
			theme_advanced_toolbar_align : "left",
			theme_advanced_resizing : false
		});
	</script>
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
						<td><textarea name="thread_body" cols="90" rows="3" id="new_thread_body" ></textarea></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="submit" value="Submit" /> <input type="reset" value="Reset" />
						</td>
					</tr>
				</table>
			</td>
			</form>
		</tr>
	</table>
	</div>

</body>

</html>

<?php echo $this->pdata['footer'] ?>