
<?php

//uses the name attribute from input for the super global $_POST

	if(isset($_POST['submit'])) {

		$name = ["Kenneth", "Edwin", "Samid", "Jane"];

		$username = $_POST['user_name'];
		$password = $_POST['password'];

		if(strlen($username) < 5 ) {

			echo "Username has to be greater than 5 characters";
		}

		if(!in_array($username, $name)) {

			echo "Sorry you can not log in";

		} else {

			echo "Welcome";
		}

//		echo $username;
//		echo $password;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="form_data.php" method="post">

		<input type="text" name="user_name" placeholder="Enter user name" >
		<input type="password" name="password" placeholder="Password">
		<br>
		<input type="submit" name="submit">
	</form>

	<?php

	?>


</body>
</html>
