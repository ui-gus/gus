<?php echo $this->pdata['header'] ?>

<?php 	echo $this->pdata['content'] ?>

<br /><br />
<a href="<?php echo site_url() ?>/groups/">Groups</a><br />
<a href="<?php echo site_url() ?>/forums/">Forums</a><br />
<a href="<?php echo site_url() ?>/pages/">Pages</a><br />
<a href="<?php echo site_url() ?>/users/">Users</a><br />

<div class=\"update\">
<p>Page rendered in {elapsed_time} seconds</p>
</div>
<?php echo $this->pdata['footer'] ?>
