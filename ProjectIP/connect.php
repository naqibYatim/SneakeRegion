<?php
	
	// "DEFINE" used to create a constant variable
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_USER', 'root');
	DEFINE ('DB_PASSWORD', 'nbuser');
	DEFINE ('DB_NAME', 'sneakeregion');
	
			// open a new connection to the mysql server	// "or die" prints a message and exits the current script	// "mysqli_connect_error" returns the error description from the last connection error, if any.
	$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
	
	// "mysqli_set_charset"  specifies the default character set to be used when sending data from and to the database server
	mysqli_set_charset($dbc, 'utf8_encode');
	
?>