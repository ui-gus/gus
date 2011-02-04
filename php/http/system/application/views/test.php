<?php echo $this->pdata['header'] ?>

<?php 	
	echo $this->pdata['content'];
	$this->load->helper('url');
	echo '
<p>Test for models:</p>
 <ul>
  <li><a href="' . site_url() . '/test/page">Page</a>
  <li><a href="' . site_url() . '/test/user">User</a>
  <li><a href="' . site_url() . '/test/group">Group</a>
 </ul>
<p>Tests for controllers:</p>
 <ul>
  <li><a href="' . site_url() . '/admin/test">admin</a>
  <li><a href="' . site_url() . '/auth/test">auth</a>
  <li><a href="' . site_url() . '/calendar/test">calendar</a>
  <li><a href="' . site_url() . '/docs/test">docs</a>
  <li><a href="' . site_url() . '/forum/test">forum</a>
  <li><a href="' . site_url() . '/grouppage/test">grouppage</a>
  <li><a href="' . site_url() . '/groups/test">groups</a>
  <li><a href="' . site_url() . '/home/test">home</a>
  <li><a href="' . site_url() . '/mail/test">mail</a>
  <li><a href="' . site_url() . '/pages/test">pages</a>
  <li><a href="' . site_url() . '/search/test">search</a>
  <li><a href="' . site_url() . '/upload/test">upload</a>
  <li><a href="' . site_url() . '/userpage/test">userpage</a>
  <li><a href="' . site_url() . '/users/test">users</a>
 </ul>
';
?>

<div class=\"update\">
<p>Page rendered in {elapsed_time} seconds</p>
</div>
<?php echo $this->pdata['footer'] ?>
