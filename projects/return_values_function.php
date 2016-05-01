<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php
		function addNumbers($num1, $num2) {

			$sum = $num1 + $num2;
			return $sum;
		}

	$result = addNumbers(1, 45);
	$result = addNumbers(100, $result);

	echo $result;
	?>


</body>
</html>
