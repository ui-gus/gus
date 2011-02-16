<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>

<html>

<head>
  <title>GUS Forum</title>
</head>

<body>

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
<td width="2%">:</td>
<td width="84%"><input type="text" name="topic" size="50" /></td>
</tr>

<tr>
<td valign="top"><strong>Body</strong></td>
<td valign="top">:</td>
<td><textarea name="body" cols="50" rows="3"></textarea></td>
</tr>

<tr>
<td><strong>Name</strong></td>
<td>:</td>
<td><input type="text" name="author" size="50" /></td>
</tr>

<tr>
<td>&nbsp;</td>
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