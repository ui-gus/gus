<?php echo $this->pdata['header'] ?>
<?php 	echo $this->pdata['content'] ?>

<html>


<?php
$sql="SELECT * FROM threads WHERE thread_id='$thread_id'";
$result=mysql_query($sql);
$thread=mysql_fetch_array($result);
?>

<body>
	<table width="95%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Author</strong></td>
			<td width="65%" align="center" bgcolor="#E6E6E6"><strong><?php echo $thread['thread_topic']; ?></strong></td>
			<td width="12%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
			<td width="8%" align="center" bgcolor="#E6E6E6"></td>
			</tr>
			
<!-- Author Display -->
		
		<tr>
			<td align="center" bgcolor="#FFFFFF"><?php echo $thread['thread_author']?></td>
			<td bgcolor="#FFFFFF"><?php echo $thread['thread_body']; ?></td>
			<td align="center" bgcolor="#FFFFFF"><?php echo $thread['datetime']; ?></td>
			<td align="center" bgcolor="#FFFFFF">
				<?php if ($thread['thread_author'] == $this->session->userdata['un']): ?>
					<?php echo form_open('forum/delete_thread');?>
					<?php echo form_hidden('thread_id', $this->uri->segment(3));?>
						<input type="submit" value="Delete" >
					</form>
					<?php echo form_open('forum/edit_thread');?>
					<?php echo form_hidden('thread_id', $this->uri->segment(3));?>
						<input type="submit" value="Edit" >
					</form>
				<?php endif; ?>
			</td>
		</tr>

<!-- Reply Displays -->

		<?php if ($reply->num_rows() > 0): ?>
		<?php foreach($reply->result() as $row): ?>
		<tr>
			<td align="center" bgcolor="#FFFFFF"><?php echo $row->author; ?></td>
			<td bgcolor="#FFFFFF"><?php echo $row->body; ?></td>
			<td align="center" bgcolor="#FFFFFF"><?php echo $row->datetime; ?></td>
			<td align="center" bgcolor="#FFFFFF">
				<?php if ($row->author == $this->session->userdata['un']): ?>
					<?php echo form_open('forum/delete_reply');?>
					<?php echo form_hidden('reply_id', $row->reply_id);?>
					<?php echo form_hidden('thread_id', $this->uri->segment(3));?>
						<input type="submit" value="Delete" >
					</form>
					<?php echo form_open('forum/edit_reply');?>
					<?php echo form_hidden('reply_id', $row->reply_id);?>
					<?php echo form_hidden('thread_id', $this->uri->segment(3));?>
						<input type="submit" value="Edit" >			
					</form>
				<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>
	</table>

<!-- Reply Dialog Box Display -->

	<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<?php echo form_open('forum/reply_insert');?>
					<?php echo form_hidden('thread_id', $this->uri->segment(3));?>
						<tr>
							<td colspan="3" bgcolor="#E6E6E6"><strong>Reply</strong> </td>
						</tr>
						<tr>
							<td valign="top"><strong>Body</strong></td>
							<td><textarea name="body" cols="70" rows="3"></textarea></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" value="Submit" /> <input type="reset" value="Reset" /></td>
						</tr>
					</form>
				</table>
			</td>
		</tr>
	</table>
</body>

</html>

<?php echo $this->pdata['footer'] ?>