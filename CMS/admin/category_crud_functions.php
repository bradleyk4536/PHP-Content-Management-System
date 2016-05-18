<?php
	function create_category() {
		global $connection;
//  Check to see if submit button is clicked
							if(isset($_POST['submit'])) {
//	read the category input field
								$cat_title = escape($_POST['cat_title']);
//	check to see if field is empty if so echo message
								if($cat_title == "" || empty($cat_title)) {
									echo "This field should not be empty";
//	if field is not empty create the insert query
								} else {
									$query = "INSERT INTO categories(cat_title) ";
									$query .= "VALUE('{$cat_title}') ";
									$create_category_query = mysqli_query($connection, $query);
//	Test to see if query worked
									if(!$create_category_query) {
										die('QUERY FAILE' . mysqli_error($connection));
									}
								}
							}
	}
	function read_categories(){
		global $connection;
			$query = "SELECT * FROM categories";
			$select_catagories = mysqli_query($connection, $query);
			while($row = mysqli_fetch_assoc($select_catagories)) {
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];
			echo "<tr>";
			echo "<td>{$cat_id}</td>";
			echo "<td>{$cat_title}</td>";
			echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
			echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
			echo "</tr>";
			}
	}
	function update_category(){
		global $connection;
		if(isset($_GET['edit'])) {
			$cat_id = escape($_GET['edit']);
			include "partials/update_categories.php";
			}
	}
	function delete_category(){
		global $connection;
		if(isset($_GET['delete'])) {
			if(isset($_SESSION['user_role'])) {
				if($_SESSION['user_role'] == 'admin') {
					$del_cat_id = escape($_GET['delete']);
					$query = "DELETE FROM categories WHERE cat_id = {$del_cat_id} ";
					$delete_query = mysqli_query($connection, $query);
//								refresh page so you do not have to click twice
					header("Location: categories.php");

				}
			}

		}
	}

?>
