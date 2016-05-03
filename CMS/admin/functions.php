<?php
	function create_category() {

		global $connection;

		//Check to see if submit button is clicked
							if(isset($_POST['submit'])) {

//								read the category input field

								$cat_title = $_POST['cat_title'];

//								check to see if field is empty if so echo message

								if($cat_title == "" || empty($cat_title)) {
									echo "This field should not be empty";
//									if field is not empty create the insert query

								} else {
									$query = "INSERT INTO categories(cat_title) ";
									$query .= "VALUE('{$cat_title}') ";

									$create_category_query = mysqli_query($connection, $query);

//									Test to see if query worked
									if(!$create_category_query) {
										die('QUERY FAILE' . mysqli_error($connection));
									}
								}
							}
	}

?>
