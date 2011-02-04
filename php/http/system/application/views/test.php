<?php echo $this->pdata['header'] ?>

<?php 	
	echo $this->pdata['content'];
	$this->load->helper('url');
	echo '
<p>Tests for models:</p>
<table border=1>
  <td><b>Model Name</b></td>
  <td><b>Author</b></td>
  <td><b>doc link</b></td>
  <td><b>Last Greenlight (date)</b></td>
  <td><b>Comments</b></td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/home/css">Page</a></td>
  <td>Colby Blair, Scott Beddall</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/test/user">User</a>
  <td>Colby Blair</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/test/group">Group</a>
  <td>Colby Blair</td>
 </tr>
</table>

<p>Tests for controllers:</p>
<table border=1>
  <td><b>Controller Name</b></td>
  <td><b>Author</b></td>
  <td><b>doc link</b></td>
  <td><b>Last Greenlight (date)</b></td>
  <td><b>Comments</b></td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/admin/test">admin</a></td>
  <td>Colby Blair<br />Tim Bianchetti</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/auth/test">auth</a></td>
  <td>Colby Blair</td>
  <td><a href="http://75.87.248.55/P5/var/git/gus/php/doc/controllers/auth.png">assoc</a></td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/calendar/test">calendar</a></td>
  <td>Zeke Long</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/forum/test">forum</a></td>
  <td></td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/grouppage/test">grouppage</a></td>
  <td>Brett Hitchcock</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/groups/test">groups</a></td>
  <td>Colby Blair</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/home/test">home</a></td>
  <td>Colby Blair, others!</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/mail/test">mail</a></td>
  <td></td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/pages/test">pages</a></td>
  <td>Colby Blair</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/search/testDBBoundaries">search</a></td>
  <td>Scott Beddall</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/search/testDB">search</a></td>
  <td>Scott Beddall</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/upload/test">upload</a></td>
  <td>Alex Nilson</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/userpage/test">userpage</a></td>
  <td>Brett Hitchcock</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/users/test">users</a></td>
  <td>Colby Blair</td>
 </ul>
';
?>

<div class=\"update\">
</div>
<?php echo $this->pdata['footer'] ?>
