<?php

//<!-this file is called by the companyDetails.php page after the user submits the 
//form on that page

//get information passed in from form submission
$company = $_REQUEST['company'];
$type = $_REQUEST['type'];
$industry = $_REQUEST['industry'];
$values = $_REQUEST['values'];
$diversity = $_REQUEST['diversity'];
$size = $_REQUEST['size'];
$finances = $_REQUEST['finances'];
$people = $_REQUEST['people'];
$website = $_REQUEST['website'];
$focus = $_REQUEST['focus'];
$companyInitial = $_REQUEST["companyInitial"];

//bring in the config file
require 'config.php';
require_once 'classes.php';
$current = new currentUser();
$username = $current->username();

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
	$_SESSION['message'] = "hmm, the database connection didn't work :(, the error was ".$conn->connect_error;
	$conn->close();
	header("Location: companyDetails.php");
	exit;
} 

//create SQL insert command for companies table
$sql = "UPDATE companies SET Company='$company', Type='$type', Industry='$industry', `Values`='$values', 
Diversity='$diversity', Size='$size', Finances='$finances', People='$people', Website='$website', 
Focus='$focus' WHERE username='$username' AND Company='$companyInitial'";

//check query success
if ($conn->query($sql)) {
	//the application was added successfully
	$_SESSION['message'] = "nice, the company was updated successfully";
	//direct the user to their Companies
	header("Location: companyDetails.php");
} else {
	//the update failed
	$_SESSION['message'] = "whoops, something went wrong, please try to edit the company again";
	header("Location: companyDetails.php");
	//echo $sql;
}

$conn->close();

?>
