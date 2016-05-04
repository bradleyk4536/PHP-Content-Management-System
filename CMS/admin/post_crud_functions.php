<?php
function confirm($result) {
	global $connection;

	if(!$result) {
		die("UNABLE TO CREATE" . mysqli_error($connection));
	}
}

?>
