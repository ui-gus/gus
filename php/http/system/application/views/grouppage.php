<?php echo $header ?>

<?php 
//"<img src=\"".base_url()."/templates/group_label.png\" class=\"side\">" 

?>

<?php 
if( $authed ){
  
  echo anchor( "/groups/add_request" , "Create a new Group" );
	$arrow = "<img src=\"" . base_url() . "/templates/arrow.png\">";
  
  echo "<div id=\"table_container\""
    . "<br>"
    . "<table class=\"group_display\"><tr>" 
    . "<td><h2>My Groups</h2></td></tr>"
    ;
 foreach( $grouplist as $key ):{
    echo "<tr><td class=\"group\">" . $arrow . " " 
      . anchor('grouppage/view/'.$key['gid'] , 
	       $this->Group->get_name($key['gid']))
		. "</td></tr>"
      ;
  }
  endforeach;
  echo "</table>";
  
  echo "<table class=\"group_display\"><tr>"
	. "<tr><td><h2>All Groups</h2></td></tr>"
    ;
 foreach( $groups as $group ):{
    //Display all groups and link to their group/view.
    echo "<tr><td class=\"group\">"  . $arrow . " " 
      . anchor('grouppage/view/'.$this->Group->get_id($group) , $group)
      . "</td></tr>";
  }
  endforeach;
  echo "</table>"; 
  echo "</div>";
 }
 else{
   echo "You must be logged in to view this page.";
 }
?>

<?php 

?>
 
<?php echo $footer ?>
