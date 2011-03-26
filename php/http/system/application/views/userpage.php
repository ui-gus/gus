<?php echo $header ?>

<?#This may be data( $content ) in future.
?>
<?php echo "<img src=\"" 
             . base_url() 
             . "/templates/profile_label.png\" class=\"side\">" ?>

<?php
if( $authed ){
  echo "You are viewing the user page.<br><br>
        <u>Personal Info (with links to edit pages)</u><br>
	<ul>
	<li>Name: <br>
	<li>Age: <br>
	<li>Etc: <br><br>

	<li>Upload files<br>
	<li>Send messages<br>
	</ul><br><br><br>

        Need to know:<br>
	<ul>					
	<li>User ID from Session to get personal info<br>
	<li>Groups the user is in (Group updates)<br>
	<li>Personal calendar events (Group info)<br>
	</ul>
	";	
 }
 else {
   echo "You must be logged in to view this page."; 
 }
?>

<?php echo $footer ?>
