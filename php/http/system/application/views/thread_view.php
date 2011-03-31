<?php echo $this->pdata['header'] ?>
<?php echo $this->pdata['content'] ?>

<html>

<body>
	<?php echo form_open('forum/view_forum');?>
		<input type="submit" value="Return to Forum" ></form>
	<table width="95%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
		<?php foreach($thread->result() as $row): ?>
		<tr>
			<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Author</strong></td>
			<td width="65%" align="center" bgcolor="#E6E6E6"><strong><?php echo $row->thread_topic; ?></strong></td>
			<td width="12%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
			<td width="8%" align="center" bgcolor="#E6E6E6"></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#FFFACD"><?php echo $row->thread_author; ?></td>
			<td bgcolor="#FFFACD"><?php echo $row->thread_body; ?></td>
			<td align="center" bgcolor="#FFFACD"><?php echo $row->datetime; ?></td>
			<td align="center" bgcolor="#FFFACD">
				<?php if ($row->thread_author == $this->session->userdata['un'] || $this->session->userdata('group_perm') == 7): ?>
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
		<?php endforeach; ?>
	</table><br></br>
		
<!-- Reply Displays -->
	
	<?php if ($reply->num_rows() > 0): ?>
	<table width="95%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
		<?php foreach($reply->result() as $row): ?>
		<tr>
			<td width="15%" align="center" bgcolor="#FFFFFF"><?php echo $row->author; ?></td>
			<td width="65%" align="left" bgcolor="#FFFFFF"><?php echo $row->body; ?></td>
			<td align="center" bgcolor="#FFFFFF"><?php echo $row->datetime; ?></td>
			<td align="center" bgcolor="#FFFFFF">
				<?php if ($row->author == $this->session->userdata['un'] || $this->session->userdata('group_perm') == 7): ?>
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
	<?php if (($this->session->userdata('group_perm') >= 6)): ?>
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
	<?php endif; ?>
</body>

</html>

<?php echo $this->pdata['footer'] ?>