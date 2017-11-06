<?php

  $server 	= "name of database";
	$username 	= "username";
	$password 	= "password?";
	$db 		= "table";
	// Create connection
	$conn = mysqli_connect($server, $username, $password, $db);
	// Check connection, then kill connection
	if (!$conn) {
		die( "Connection failed: " . mysqli_connect_error() );
	}
	//echo "Connected successfully!";
?>
