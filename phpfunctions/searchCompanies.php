<?php

//<!-this file is called by the AJAX script in userCalendar page. 
//It reads the database to see if the requested company already exists->

//get database access parameters
require 'config.php';

//get the parameter passed from the AJAX javascript
$searchterm = $_REQUEST["q"];

$output = "";

// Create database connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
//echo "TESTING..connection status is " .$conn->connect_errno ."<br/>";

// Check database connection
if ($conn->connect_error) {
	$output = "database connection failed";
} 

//create SQL query
$sql = "SELECT DISTINCT Company FROM companies WHERE Company LIKE '%$searchterm%'"; 
$result = $conn->query($sql);

//check if database operation was successful
if (!$result) {
	$output = "database query was malformed";
} elseif ($result->num_rows == 0) {
	//no companies were found
	$output = "no suggestions";
} else {
	//companies were found
	while ($row = $result->fetch_assoc())
	{
		//$output = $output.$row['Company']."<br>";
		$output = $output."<div onclick=\"document.getElementById('company').value='".$row['Company']."'\">".$row['Company']."</div>";
	}
}

//close database connection
$conn->close();

//send the result
echo $output;

?>
