<?php

//<!-this file is called by the AJAX script in register.html page.
//It reads the database to see if the requested username already exists->

//get database access parameters
$servername = "localhost";
$dbusername = "root";
$dbpassword = "steveyoung";
$dbname = "jobapptracker";

//get the parameter passed from the AJAX javascript
$username = $_REQUEST["q"];

// Create database connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
//echo "TESTING..connection status is " .$conn->connect_errno ."<br/>";

// Check database connection
if ($conn->connect_error) {
	$output = "database connection failed";
}

//see if $username exists in the database
$sql = "SELECT * FROM `users` WHERE username = '$username'";
$result = $conn->query($sql);

//check if database operation was successful
if (!$result) {
	$output = "database query was malformed";
} elseif ($result->num_rows > 0) {
	//see if the database query returned an existing user
	$output = "exists";
} else {
	$output = "nice work, your username is unique";
}

//close database connection
$conn->close();

//send the result
echo $output;

?>
