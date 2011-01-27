<html>
<head>
<title> <?=$title?></title>
</head>
<body>

<h1> <?=$heading?> </h1>

<?php echo "EEEEEHHHHHHH" ?>

<?php foreach($query->result() as $row): ?>

<p><?php echo $row->id ." ". $row->un ." ". $row->pw?></p>

<?php endforeach; ?>

</body>
</html>