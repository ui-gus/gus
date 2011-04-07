<?php echo $header ?>
<?php echo $content ?>
<?php echo "<img src=\"" 
. base_url() 
  . "/templates/personal_label.png\" class=\"side\">" ?>

<?php
  echo "<div class=\"update\">"
  . "Editing personal profile. <br><br>"
  . "Information <br>" 
  . form_open('userpage/edit')
  . "Full name: " . form_input( array('name'=>'fullname','value'=>$personal['fullname'],
				  'maxlength'=>'25','size'=>'20') )
  . "<br>"
  . "Description: " . form_input( array('name'=>'description','value'=>$personal['description'],
				  'maxlength'=>'256','size'=>'20') )
  . "<br>"
  . "Picture: " . form_input( array('name'=>'profile','value'=>$personal['profile'],
				    'maxlength'=>'20','size'=>'20') ) 
  . " " . anchor( 'docs' , "Upload") . " | " 
  . anchor( 'docs' , "Select") . "<br>"
  . "Email: " . form_input( array('name'=>'email','value'=>$personal['email'],
				  'maxlength'=>'20','size'=>'20') ) 
  . "<br>"
  . "Phone: " . form_input( array('name'=>'contact','value'=>$personal['contact'],
				  'maxlength'=>'20','size'=>'20') )
  . "<br>"
  . "Major: " . form_input( array('name'=>'major','value'=>$personal['major'],
				  'maxlength'=>'20','size'=>'20') )
  . "<br>"
  . form_submit('submit', 'Modify')
  . form_close()
  
  . anchor( 'userpage/personal', "Back" )
  . "</div>"
  ;
  
?>

<?php echo $footer ?>