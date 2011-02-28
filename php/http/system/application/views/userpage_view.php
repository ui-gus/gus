<?php echo $header ?>



<?php $query = $this->db->query("SELECT * FROM user WHERE id = 0")->result(); 

echo $content;

echo "Displaying user information for userid: " . $query[0]->id;
echo "\n";
echo $query[0]->un ." ". $query[0]->pw;

?>

<?php echo $footer ?>
