<?php echo $header ?>

<?php echo "<img src=\"" . base_url() . "/templates/group_label.png\" class=\"side\">"; ?>

<?php 
echo "<div class=\"update\">";
if( $authed ){
  if( $admin ){
    echo $tinyMCE;
    echo "Editing group page.<br>"
      . form_open('grouppage/edit/' . $gn )
      . form_textarea(array(
			    'name'	=> 'content',
			    'id'  	=> 'grouppage_edit',
			    'value'	=> $content,
			    'cols'	=> '80',
			    'rows'	=> '20'
			    )
		      )
      . form_submit('submit', 'Modify')
      . form_close()
      ;
  }
  else {
    echo "You must be an admin to edit the group page.";
  }
 }
 else {
   echo "You must be logged in to view this page.";
 }
echo "</div>";
?>

<?php echo $footer ?>