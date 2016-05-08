

<!--/turn on sessions for use-->

<?php session_start(); ?>

<?php
	//			set the sessions

			$_SESSION['username'] = null;
			$_SESSION['firstname'] = null;
			$_SESSION['lastname'] = null;
			$_SESSION['user_role'] = null;

header("Location: ../index.php");
?>
