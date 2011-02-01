<html>
<head>
<title> <?=$title?></title>
</head>
<body>

<h1> <?=$heading?> </h1>

Displaying user information for: <?php echo "Test." ?> 

<?php foreach($query->result() as $row): ?>

<p><?php echo $row->id ." ". $row->un ." ". $row->pw?></p>

<?php endforeach; ?>

</body>
</html>
