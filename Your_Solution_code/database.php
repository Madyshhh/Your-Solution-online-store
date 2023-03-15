<?php
// database parameters
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "yoursolution_database";

// creates a connection to the database
$conn = @mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

// checks if there`s an error with the connection and shows an error message if can`t connect
if (mysqli_connect_error()) {
	echo "<p class=\"errormessage\">Failed to connect to database!</p>";
	exit();
}


// EOF