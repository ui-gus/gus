<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>

Page Rendered in {elapsed_time} seconds.



<!-- Really don't like to have a part of the template in the view, I'll
	figure out a better way to do this in the future -->
	
	
<?php echo "<img src=\"" . base_url() . "/templates/admin_small.png\" class=\"background\">" ?>

<?php echo $this->pdata['footer'] ?>
