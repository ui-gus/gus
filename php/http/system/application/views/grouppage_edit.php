<?php echo $header ?>

<?php echo "<img src=\"" . base_url() . "/templates/group_label.png\" class=\"side\">"; ?>

<?php 
echo "<div class=\"update\">";
if( $authed ){
  if( $admin ){
    echo $tinyMCE;
    echo "Editing group page.<br>"
      . form_open('grouppage/edit/' . $gn )
      . "Picture: " . form_input( array('name'=>'profile','value'=>$profile,
					'maxlength'=>'20','size'=>'20') )
      . " " . anchor( 'docs', "Upload") . "<br>"
      . "Description: " . form_input( array('name'=>'description','value'=>$description,
					    'maxlength'=>'50','size'=>'50') )
      . "<br><br>Custom Group Content<br>"
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