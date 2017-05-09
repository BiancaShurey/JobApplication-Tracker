<?php

//<!-this file is called by the contactDetails.php page after the user submits the 
//form on that page

//get information passed in from form submission
$company = $_REQUEST['company'];
$name = $_REQUEST['name'];
$type = $_REQUEST['type'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$location = $_REQUEST['location'];
$companyInitial = $_REQUEST["companyInitial"];
$nameInitial = $_REQUEST["nameInitial"];

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

//make sure $company exists in Companies table (it is a foreign key)
$sql = "SELECT * FROM `companies` WHERE username = '$username' AND Company = '$company'";
$result = $conn->query($sql);
//check if database operation was successful
if (!$result) {
	//database query was malformed
	$_SESSION['message'] = "o-oh, something went wrong with checking the Companies table";
	$conn->close();
	header("Location: contactDetails.php");
	exit;
}
if ($result->num_rows == 0) {
	//then we need to add the $company to the Companies table
	//formulate sql insert statement
	$sql = "INSERT INTO companies (Company,	username) VALUES ('$company', '$username')";
	//check query success
	if (!$conn->query($sql)) {
		//the operation failed
		$_SESSION['message'] = "whoops, we couldn't add the company to the companies table";
		$conn->close();
		header("Location: contactDetails.php");
		exit;
	}
	//create a session variable to alert user this is a new company
	$_SESSION['newcompanyalert'] = $company;
}

//create SQL insert command for contacts table
$sql = "UPDATE contacts SET name='$name', company='$company', type='$type', phone='$phone', 
email='$email', location='$location' 
WHERE username='$username' AND company='$companyInitial' AND name='$nameInitial'";

//check query success
if ($conn->query($sql)) {
	//the application was added successfully
	$_SESSION['message'] = "nice, the company was updated successfully";
	//direct the user to their contacts
	header("Location: contactDetails.php");
} else {
	//the update failed
	$_SESSION['message'] = "whoops, something went wrong, please try to edit the company again";
	header("Location: contactDetails.php");
	//echo $sql;
}

$conn->close();

?>
