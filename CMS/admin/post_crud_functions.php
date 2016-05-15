<?php
function create_post() {
	global $connection;


}
function confirm($result) {
	global $connection;

	if(!$result) {
		die("UNABLE TO CREATE" . mysqli_error($connection));
	}
}
function escape($string){
	global $connection;
	if(isset($_SESSION['user_role'])) {
		if($_SESSION['user_role'] == 'subscriber' || $_SESSION['user_role'] == 'admin') {
		$clean_field = mysqli_real_escape_string($connection, trim(strip_tags($string)));
		return $clean_field;
		}
	}
}
?>
