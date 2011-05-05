<?php echo $this->pdata['header'] ?>

<?php 	
	echo $this->pdata['content'];
	$this->load->helper('url');
	echo '
<h2>Tests and docs</h2>

<a href="../SSRS">SSRS</a>

<p>Tests for models:</p>
<table>
<tr>
  <td><b>Model Name</b></td>
  <td><b>Author</b></td>
  <td><b>doc link</b></td>
  <td><b>Last Greenlight (date)</b></td>
  <td><b>Comments</b></td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/test/page">Page</a></td>
  <td>Colby Blair<br /> Scott Beddall</td>
  <td></td>
  <td>01.28.11</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/test/user">User</a></td>
  <td>Colby Blair</td>
  <td></td>
  <td>02.07.11</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/test/group">Group</a></td>
  <td>Colby Blair</td>
  <td></td>
  <td>02.11.11</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/test/images">Images</a></td>
  <td>Alex Nilson</td>
  <td></td>
  <td>not recorded</td>
 </tr>
</table>

<p>Tests for controllers:</p>
<table>
<tr>
  <td><b>Controller Name</b></td>
  <td><b>Author</b></td>
  <td><b>doc link</b></td>
  <td><b>Last Greenlight (date)</b></td>
  <td><b>Comments</b></td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/admin/test">admin</a></td>
  <td>Colby Blair<br />Tim Bianchetti</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Admin.html">phpdoc</a></td>
  <td>02.07.11</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/auth/test">auth</a></td>
  <td>Colby Blair</td>
  <td><a href="/gus-dev/uploads/auth.png">assoc</a>, 
	<a href="/gus-dev/phpdoc-out/GusPackage/Auth.html">phpdoc</a></td>
  <td>02.07.11</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/calendar/test">calendar</a></td>
  <td>Zeke Long</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Calendar.html">phpdoc</a></td>
  <td>never</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/docs/test">docs</a></td>
  <td>Alex Nilson</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Docs.html">phpdoc</a></td>
  <td>02.11.11</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/forum/test">forum</a></td>
  <td>Chaylo Laurino</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Forum.html">phpdoc</a></td>
  <td>never</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/grouppage/test">grouppage</a></td>
  <td>Brett Hitchcock</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Grouppage.html">phpdoc</a></td>
  <td>never</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/groups/test">groups</a></td>
  <td>Colby Blair</td> 
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Groups.html">phpdoc</a></td>
  <td>01.28.11</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/home/test">home</a></td>
  <td>Colby Blair</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Home.html">phpdoc</a></td>
  <td>02.11.11</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/pm/test">pm</a></td>
  <td>Abhay Patil</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Pm.html">phpdoc</a></td>
  <td>never</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/pages/test">pages</a></td>
  <td>Colby Blair</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Pages.html">phpdoc</a></td>
  <td>never</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/search/testDBBoundaries">search</a></td>
  <td>Scott Beddall</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Search.html">phpdoc</a></td>
  <td>02.11.11</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/search/testDB">search</a></td>
  <td>Scott Beddall</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Search.html">phpdoc</a></td>
  <td>02.11.11</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/upload/test">upload</a></td>
  <td>Alex Nilson</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Upload.html">phpdoc</a></td>
  <td>02.11.11</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/userpage/test">userpage</a></td>
  <td>Brett Hitchcock</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Userpage.html">phpdoc</a></td>
  <td>never</td>
 </tr>
 <tr>
  <td><a href="' . site_url() . '/users/test">users</a></td>
  <td>Colby Blair</td>
  <td><a href="/gus-dev/phpdoc-out/GusPackage/Users.html">phpdoc</a></td>
  <td>never</td>
 </ul>
';
?>

<div class=\"update\">
</div>
<?php echo $this->pdata['footer'] ?>
