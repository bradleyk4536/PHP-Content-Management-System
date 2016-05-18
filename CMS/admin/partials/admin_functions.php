<?php
//get count of all records in database to display on index.php in admin section
function recordCount($table) {
	global $connection;
	$query = "SELECT * FROM " . $table;
	$select_all_post = mysqli_query($connection, $query);
	$result = mysqli_num_rows($select_all_post);

	return $result;
}


function checkstatus($table, $column, $status){
	global $connection;
	$query = "SELECT * FROM $table WHERE $column = '$status' ";
	$result = mysqli_query($connection, $query);
	return mysqli_num_rows($result);
}



?>
