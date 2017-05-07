<?php

//<!-this file is called by the AJAX script in userCalendar page. 
//It reads the database to see if the requested company is in the Companies table->

//get database access parameters
require 'config.php';

//get the parameter passed from the AJAX javascript
$company = $_REQUEST["comp"];
$current = new currentUser();
$username = $current->username();

// Create database connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check database connection
if ($conn->connect_error) {
	$output = "database connection failed";
	echo $output;
	exit;
} 

//see if $company exists in the database
$sql = "SELECT * FROM `companies` WHERE username = '$username' AND Company = '$company'"; 
$result = $conn->query($sql);

//check if database operation was successful
if (!$result) {
	$output = "database query was malformed";
} elseif ($result->num_rows > 0) {
	//the database query returned an existing company
	$output = "existingcompany";
} else {
	$output = "newcompany";
}

//close database connection
$conn->close();

//send the result
echo $output;

?>
