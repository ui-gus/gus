<?php echo $header ?>

<?php echo "<img src=\"" . base_url() . "/templates/group_label.png\" class=\"side\">"; ?>

<?php 
if( $authed ){
  echo "<div class=\"update\">"
    . "<img src=\"" . base_url() 
    . "/uploads/" . $group->profile .  "\" class=\"profile_pic\">"
    . "<h1>Group Title: " . $group->name . "</h1>"
    //. "Group id" . $group->id . "<br>"
    . "<img src=\"" . base_url() ."templates/quote_left.png\">"
    . $group->description
    . "<img src=\"" . base_url() ."templates/quote_right.png\">"
    . "<br>"
    //. "You have the current permissions with this group: " 
    //. $permissions['read'] . " "
    //. $permissions['write'] . " "
    //. $permissions['execute'] . " "
    //. "<br>" 
    ;
  if( $permissions['read'] && $permissions['write'] && $permissions['execute'] ){
    echo "You are an admin of this group. " 
      . anchor('grouppage/edit/'.$gid, "Edit this page.")
      . "<br>"
      ;
  }
  if( $member ){
    echo "You are a member of this group.<br>";
    echo anchor('grouppage/leave/'.$gid , "Leave this group<br>");
  }
  else {
    echo anchor('grouppage/join/'.$gid , "Join this group<br>");     
  }
  echo "</div>";
  
  if( $permissions['read'] ){
    // Display all users in the group.
    /* echo "<div class=\"update\">"
      . "<h3><u>__List of Users__</u></h3>"
      ;*/
    /* foreach( $members as $member ):{
	echo ""
	  . anchor('userpage/view/'.$member['uid'] , 
		 $this->User->get_name($member['uid']) 
		 )
	. "</h4>"
	;
	}
	endforeach;*/

    //Display unique page content.
    echo "<div class=\"update\">"
      //. "<center><u>Custom Group Content</u></center>"
      . $content
      . "</div>"
      . "<div class=\"update\">"
      . "<u>Users in this Group</u>"
      ;
    
    echo "<table id=\"user\"><tr>";
    $i = 1;
    $img = '';
  foreach( $members as $member ):{
      if( $i == 1 ){
	echo "<tr>";
      }
      else {
	echo "<td>";
	$pic = $this->User->get_profile($member['uid']);
	if ($pic != ''){ //Picture exists. Show the thumbnail.
	  $img = "<img src=\"".base_url()."uploads/thumbs/tn_".$pic."\" width=\"50\" height=\"50\" class=\"user\" style=\"border:0px none\">";
	}
	else{
	  $img = "<img src=\"".base_url()."templates/tn_null_profile.png\" style=\"border:0px none\">";
	}
	echo anchor('userpage/view/'.$member['uid'] , $img );
	echo "</td>";	
      }
      if( $i == 13 ){ 
	echo "</tr><tr>";
	$i = 1;
      }
      $i++;
    }
    endforeach;
    echo "</tr></table></div>" ;
  
  }//End unique page content.
  else {
    echo "<div class=\"update\">"
      . "You do not yet have permission to view this group."
      . "</div>"
      ;
  }
 }
 else{
   echo "You must be logged in to view this page.";
 }
?>

<?php echo $footer ?>
