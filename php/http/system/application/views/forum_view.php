<?php echo $this->pdata['header'] ?>
<?php 	echo $this->pdata['content'] ?>


<html>
<body>
	<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<td width="59%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
			<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
			<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
		</tr>
		<?php foreach($this->fdata['query']->result() as $row): ?>
		<tr>
			<td bgcolor="#FFFFFF"><?php echo anchor('forum/view_thread/' .$row->thread_id, $row->thread_topic); ?></td>
			<td align="center" bgcolor="#FFFFFF"><?php echo $row->num_replies; ?></td>
			<td align="center" bgcolor="#FFFFFF"><?php echo $row->datetime; ?></td>
		</tr>
		<?php endforeach; ?>
		<tr>
			<?php echo form_open('forum/search_forum');?>
				<td width="50%" align="left" bgcolor="#E6E6E6"><input type="submit" value="Search Forum" /td>
			</form>
			<td bgcolor="#E6E6E6"></td>
			<?php echo form_open('forum/create_thread');?>
				<td width="50%" align="right" bgcolor="#E6E6E6"><input type="submit" value="Create New Thread" /td>
			</form>
		</tr>
	</table>
</body>
</html>

<?php echo $this->pdata['footer'] ?>
