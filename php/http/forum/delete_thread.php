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

mysql_query("DELETE FROM $tbl_name WHERE id='$id'");


//switch to replies
$tbl_name="replies";

mysql_query("DELETE FROM $tbl_name WHERE question_id='$id'");

header('Location: main_forum.php');
?>


