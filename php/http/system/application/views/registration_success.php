<?php echo $header ?>
<?php echo $content ?>
<!-- <?php echo "<img src=\"" . base_url() . "/templates/personal_label.png\" class=\"side\">" ?> -->

<?php
  echo "<div class=\"update\">"
  . "You have successfully been added to Gus.<br><br>"
  . anchor( 'auth', 'Login' )
  . "</div>"
  ;
  
?>

<?php echo $footer ?>