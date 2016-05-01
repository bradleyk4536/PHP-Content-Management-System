<?php
	$file = "example.txt";

	if($handle = fopen($file, "w")) {
		fwrite($handle, "<header>I love PHP and this is really good stuff </header>");
		fclose($handle);
	} else {

		echo "The file could not be written to";
	}


?>
