<?php echo $this->pdata['header']; ?>
<?php echo $this->pdata['content']; ?>


<!--<html>
<body>-->
		<u>Welcome <?php echo $this->session->userdata['un']; ?>. These are all your Forums.</u><br>
		<?php foreach($groups->result() as $group): ?>
			<?php echo form_open('forum/set_group');?>
			<?php echo form_hidden('group_name', $this->Group->get_name($group->gid));?>
			<?php echo form_hidden('group_id', $group->gid);?>
			<?php echo form_hidden('group_perm', $group->perm);?>
				<td>&nbsp;</td>
				<td><input type="submit" value="<?php echo $this->Group->get_name($group->gid); ?>" /></td>
			</form>
			
		<?php endforeach; ?>
<!--</body>
</html>-->

<?php echo $this->pdata['footer'] ?>
