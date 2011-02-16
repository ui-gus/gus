<html>

<head>
  <title><?php echo $title; ?></title>
</head>

<body>
  <h1><?php echo $heading; ?></h1>
  

<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="59%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
</tr>

<?php foreach($query->result() as $row): ?>

	<tr>
	<td bgcolor="#FFFFFF"><?php echo anchor('forum/view_thread/' .$row->id, $row->topic); ?></td>
	<td align="center" bgcolor="#FFFFFF"><?php echo $row->reply; ?></td>
	<td align="center" bgcolor="#FFFFFF"><?php echo $row->datetime; ?></td>
	</tr>

<?php endforeach; ?>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><?php echo anchor('forum/create_thread/', 'Create New Thread'); ?></strong> </a></td>
</tr>

</table>
</body>

</html>