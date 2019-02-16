<?php

	define("DB_USER", "root");
	define("DB_PASSWORD", "gue55me");
	define("DB_HOST","localhost");
	define("DB_NAME", "digithackathon");
	
	$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
	or die("could not connect to MySQL" . mysqli_connect_error());

?>