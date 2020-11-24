<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "db_proj_monitoring";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	
	// $servername = "localhost";
	// $username = "u187511933_pj_monitoring";
	// $password = "!Creatives2020";
	// $database = "u187511933_pj_monitoring";

	// // Create connection
	// $conn = mysqli_connect($servername, $username, $password, $database);

	// // Check connection
	// if (!$conn) {
	//     die("Connection failed: " . mysqli_connect_error());
    // }

?> 