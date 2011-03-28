<?php 
	echo $this->pdata['header']; 
 	echo $this->pdata['content'];
	$query = $this->db->get('ggroup');
	$qquery = $query->result_array();
?>


<!--<html>
<body>-->
		<u>Welcome <?php echo $this->session->userdata['un']; ?>. These are all your Forums.</u><br>
		<?php foreach($qquery as $group): ?>
			<?php echo form_open('forum/view_forum');?>
			<?php echo form_hidden('group_name', $group['name']);?>
			<?php echo form_hidden('group_id', $group['id']);?>
				<td>&nbsp;</td>
				<td><input type="submit" value="<?php echo $group['name']?>" /></td>
			</form>
		<?php endforeach; ?>
<!--</body>
</html>-->

<?php echo $this->pdata['footer'] ?>
