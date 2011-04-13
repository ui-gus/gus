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
			elements : "edit_reply_body",
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
			<?php echo form_open('forum/reply_update');?>
			<?php echo form_hidden('reply_id', $this->fdata['reply_id']);?>
			<?php echo form_hidden('thread_id', $this->fdata['thread_id']);?>
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr>
						<td colspan="3" bgcolor="#E6E6E6"><strong>Edit Reply</strong> </td>
					</tr>
					<tr>
						<td valign="top"><strong>Body</strong></td>
						<td><textarea name="body" cols="70" rows="3" id="edit_reply_body"><?php	echo $this->fdata['body']; ?></textarea></td>
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
	</div>
</body>

</html>

<?php echo $this->pdata['footer'] ?>