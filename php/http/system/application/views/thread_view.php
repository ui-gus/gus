
<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>

<html>


<?php
$sql="SELECT * FROM threads WHERE id='$thread_id'";
$result=mysql_query($sql);
$thread=mysql_fetch_array($result);
?>

<body>

<table width="95%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Author</strong></td>
<td width="65%" align="center" bgcolor="#E6E6E6"><strong><?php echo $thread['topic']; ?></strong></td>
<td width="12%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
<td width="8%" align="center" bgcolor="#E6E6E6"></td>
</tr>


<!-- Author Display -->
<tr>
  <td align="center" bgcolor="#FFFFFF"><?php echo $thread['author']?></td>
  <td bgcolor="#FFFFFF"><?php echo $thread['body']; ?></td>
  <td align="center" bgcolor="#FFFFFF"><?php echo $thread['datetime']; ?></td>
  <td align="center" bgcolor="#FFFFFF">
    <?php echo form_open('forum/delete_thread');?>
    <?php echo form_hidden('id', $this->uri->segment(3));?>
    <input type="submit" value="Delete" >
    </form></td>
</tr>


<!-- Reply Displays -->
<?php if ($reply->num_rows() > 0): ?>
  <?php foreach($reply->result() as $row): ?>
  
    <tr>
	<td align="center" bgcolor="#FFFFFF"><?php echo $row->author; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $row->body; ?></td>
	<td align="center" bgcolor="#FFFFFF"><?php echo $row->datetime; ?></td>
	<td align="center" bgcolor="#FFFFFF"></td>
	</tr>
	
  <?php endforeach; ?>
<?php endif; ?>


<!-- Reply Dialog Box Display -->
</table>

  <?php echo form_open('forum/reply_insert');?>
  <?php echo form_hidden('thread_id', $this->uri->segment(3));?>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">

<tr>
  <?php echo form_open('forum/thread_insert');?>
  <td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3" bgcolor="#E6E6E6"><strong>Reply</strong> </td>
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