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
?>
