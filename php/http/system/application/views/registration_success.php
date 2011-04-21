<?php echo $header ?>
<?php echo $content ?>
<?php echo "<img src=\"" . base_url() . "/templates/registration_label.png\" class=\"side\">" ?>

<?php
  echo "<div class=\"update\">"
  . "You have successfully been added to Gus.<br><br>"
  . "You can now create and join Groups, read and post on the<br>"
  . "forums, and experience everything else Gus has to offer!<br><br>"
  . "You should start by editing your personal profile ".anchor('userpage/personal','here').".<br>"
  . "</div>"
  ;
  
?>

<?php echo $footer ?>
