<!--			used to connect to database-->


	<?php
		$connection = mysqli_connect('localhost', 'root', '', 'firstdatabase');

				if(!$connection) {
						die("Database connection failed");
					}
