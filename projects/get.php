<?php
	print_r($_GET);
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$id = 10;
	$button = "THIS IS GREAT"
?>

	<a href="get.php?id=<?php echo $id; ?>"><?php echo $button; ?> </a>


</body>
</html>
