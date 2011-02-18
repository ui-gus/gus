<?php
$host="localhost"; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name="forum"; // Database name
$tbl_name="threads"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// get value of id that sent from address bar
$id=$_GET['id'];

$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);

$rows=mysql_fetch_array($result);
?>

<!-- Thread block -->

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form2" method="post" action="delete_thread.php?id=<?php echo $id?>">
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo $rows['topic']; ?></strong></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><?php echo $rows['detail']; ?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong>By :</strong> <?php echo $rows['name']; ?> <strong>Email : </strong><?php echo $rows['email'];?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong>Date/time : </strong><?php echo $rows['datetime']; ?></td>
</tr>

<tr>
<td bgcolor="#f8f7f1">  <input type="submit" name="Submit" value="Delete"></td>
</tr>

</table>
</td>
</form>
</tr>
</table>
<BR>


<?php
$tbl_name2="replies"; // Switch to table "replies"

$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysql_query($sql2);

while($rows=mysql_fetch_array($result2)){
?>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong>ID</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_id']; ?></td>
</tr>
<tr>
<td width="18%" bgcolor="#F8F7F1"><strong>Name</strong></td>
<td width="5%" bgcolor="#F8F7F1">:</td>
<td width="77%" bgcolor="#F8F7F1"><?php echo $rows['a_name']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Email</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_email']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Answer</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_answer']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_datetime']; ?></td>
</tr>
</table></td>
</tr>
</table><br>

<?php
}

$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
$result3=mysql_query($sql3);

$rows=mysql_fetch_array($result3);
$view=$rows['view'];

// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
$result4=mysql_query($sql4);
}

// count more value
$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysql_query($sql5);

mysql_close();
?>
<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="add_answer.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="18%"><strong>Name</strong></td>
<td width="3%">:</td>
<td width="79%"><input name="a_name" type="text" id="a_name" size="45"></td>
</tr>
<tr>
<td><strong>Email</strong></td>
<td>:</td>
<td><input name="a_email" type="text" id="a_email" size="45"></td>
</tr>
<tr>
<td valign="top"><strong>Answer</strong></td>
<td valign="top">:</td>
<td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>

<td>
  <input name="id" type="hidden" value="<?php echo $id; ?>">
</td>

<td>
  <input type="submit" name="Submit" value="Reply"> 
  <input type="reset" name="Submit2" value="Reset">
  <input type="button" name="to_main" value="Main" onClick="window.location='http://localhost/forum/main_forum.php' ">
</td>

</tr>
</table>
</td>
</form>
</tr>
</table>