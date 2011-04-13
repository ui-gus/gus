<?php echo $this->pdata['header'] ?>
<?php 	echo $this->pdata['content'] ?>

<html>

<body>
	<h1> <?php echo $this->session->userdata('group_name') ?> Forum</h1>
	<?php echo form_open('forum/view_forum');?>
		<input type="submit" value="Return to Forum" ></form>
	<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr>
						<td colspan="3" bgcolor="#E6E6E6"><strong>Forum Search</strong> </td>
					</tr>
					<tr>
						<?php echo form_open('forum/search_by_user');?>
							<td width="10%"><strong>By Author</strong></td>
							<td width="80%"><input type="text" name="search_criteria" size="80" /></td>
							<td width="10%"><input type="submit" value="Submit" /></td>
						</form>
					</tr>
					<tr>
						<?php echo form_open('forum/search_by_topic');?>
							<td width="14%"><strong>By Topic</strong></td>
							<td width="84%"><input type="text" name="search_criteria" size="80" /></td>
							<td width="10%"><input type="submit" value="Submit" /></td>
						</form>						
					</tr>
					<tr>
						<?php echo form_open('forum/search_by_content');?>
							<td width="14%"><strong>By Content</strong></td>
							<td width="84%"><input type="text" name="search_criteria" size="80" /></td>
							<td width="10%"><input type="submit" value="Submit" /></td>
						</form>						
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>

</html>

<?php echo $this->pdata['footer'] ?>