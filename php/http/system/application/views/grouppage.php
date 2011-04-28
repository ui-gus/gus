<?php echo $header ?>

<?php 
//"<img src=\"".base_url()."/templates/group_label.png\" class=\"side\">" 

?>

<?php 
if( $authed ){
 
  echo ""
    . anchor( "/groups/add_request" , "Create a new Group" )
    . "<br>"
    . "<table id=\"t2\"><tr>" 
    . "<td><h2>My Groups</h2><br>"
    ;
 foreach( $grouplist as $key ):{
    echo "<br>"
      . anchor('grouppage/view/'.$key['gid'] , 
	       $this->Group->get_name($key['gid']))
      ;
  }
  endforeach;
  echo "</td>";
  
  echo "<td><h2>All Groups</h2><br>"
    ;
 foreach( $groups as $group ):{
    //Display all groups and link to their group/view.
    echo "<br>"
      . anchor('grouppage/view/'.$this->Group->get_id($group) , $group)
      ;
  }
  endforeach;
  echo "</td></tr></table>"; 
 }
 else{
   echo "You must be logged in to view this page.";
 }
?>

<?php 

?>
 
<?php echo $footer ?>
