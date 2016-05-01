<?php include "db.php"; ?>
<?php

function createRecord() {
			global $connection;

//			retrieve form data
			$username =	$_POST['username'];
			$password =	$_POST['password'];

//	Used to sanitize inputs to stop internet hackers
			$username = mysqli_real_escape_string($connection, $username);
			$password =	mysqli_real_escape_string($connection, $password);

//   encrypt passwords

			$hashFormat = "$2y$10$";
			$salt = "iusesomecrazystrings22";
			$hashF_and_salt = $hashFormat . $salt;
			$password = crypt($password, $hashF_and_salt);
//
//				sql statement used to insert data
				$query = "INSERT INTO users(username, password) ";
				$query .= "VALUES ('$username', '$password')";
				$result = mysqli_query($connection, $query);
				if(!$result){
					die('Query Failed' . mysqli_error());
				} else {
					echo "Record Created..";
				}
}

function readRecord(){
	global $connection;
	//				sql statement used to get all records from user database

				$query = "SELECT * FROM users";

				$result = mysqli_query($connection, $query);

				if(!$result){
					die('Query Failed' . mysqli_error());
				}
				while($row = mysqli_fetch_assoc($result)) { print_r($row); }
}

function showAllData() {
		global $connection;
	//				sql statement used to get all records from user database

				$query = "SELECT * FROM users";

				$result = mysqli_query($connection, $query);

				if(!$result){

					die('Query Failed' . mysqli_error());
				}

				while($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							echo	"<option value='$id'>$id</option>";
				}
}

function updateRecord() {

			global $connection;

			$username = $_POST['username'];
			$password = $_POST['password'];
			$id = $_POST['id'];

			$query = "UPDATE users SET ";
			$query .= "username = '$username', ";
			$query .= "password = '$password' ";
			$query .= "WHERE id = $id ";

			$result = mysqli_query($connection, $query);

			if(!$result) {

				die("QUERY FAILED" . mysqli_error($connection));
			} else {

				echo "Record Updated";
			}
		}

function deleteRecord() {

			global $connection;

			$username = $_POST['username'];
			$password = $_POST['password'];
			$id = $_POST['id'];

			$query = "DELETE FROM users ";
			$query .= "WHERE id = $id ";

			$result = mysqli_query($connection, $query);

			if(!$result) {

				die("QUERY FAILED" . mysqli_error($connection));
			} else {
				echo "Record Deleted";
			}
}

function login() {
		//retrieve form data

			$username =	$_POST['username'];
			$password =	$_POST['password'];

//			used to connect to database

			$connection = mysqli_connect('localhost', 'root', '', 'firstdatabase');

				if($connection) {

					echo "I am connected";
				} else {

					die("Database connection failed");
				}



}
