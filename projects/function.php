<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php
		function init () {

			say_Something();
			calculate();
		}

		function calculate() {

			echo 456 + 369;
		}

	function say_Something() {

		echo "Hello Student, do you like the class? Yes? okay great" . "<br>";
	}

	init();
	?>


</body>
</html>
