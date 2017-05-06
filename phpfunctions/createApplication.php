<?php

//<!-this file is called by the newApplication.php page after the user submits the 
//form on that page

//get information passed in from form submission
$company = $_REQUEST["company"];
$title = $_REQUEST["title"];
$type = $_REQUEST["type"];
$duration = $_REQUEST["duration"];
$site = $_REQUEST["site"];
$released = $_REQUEST["released"];
$closes = $_REQUEST["closes"];
$selection = $_REQUEST["selection"];
$hearfrom = $_REQUEST["hearfrom"];
$location = $_REQUEST["location"];
$commences = $_REQUEST["commences"];
if (isset($_REQUEST["applied"]))
{
	$applied = 'y';
} else {
	$applied = 'n';
}

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
	header("Location: newApplication.php");
	exit;
} 

//make sure $company exists in Companies table (it is a foreign key)
$sql = "SELECT * FROM `companies` WHERE username = '$username' AND Company = '$company'";
$result = $conn->query($sql);
//check if database operation was successful
if (!$result) {
	//database query was malformed
	$_SESSION['message'] = "o-oh, something went wrong with checking the Companies table";
	header("Location: newApplication.php");
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
		header("Location: newApplication.php");
		exit;
	}
	//create a session variable to alert user this is a new company
	$_SESSION['newcompanyalert'] = $company;
}

//check if any of the date fields are null, and adjust the SQL query accordingly
if (!$released) { $releasedText = "null"; } else { $releasedText = "'".$released."'"; }
if (!$closes) { $closesText = "null"; } else { $closesText = "'".$closes."'"; }
if (!$hearfrom) { $hearfromText = "null"; } else { $hearfromText = "'".$hearfrom."'"; }
if (!$commences) { $commencesText = "null"; } else { $commencesText = "'".$commences."'"; }

//create SQL insert command for applications table
$sql = "INSERT INTO applications (Company, Title, type, duration, site, 
released, closes, applied, selectionCriteria, hearFrom, location, commences, 
username) VALUES ('$company', '$title', '$type', $duration, '$site', 
$releasedText, $closesText, '$applied', '$selection', $hearfromText, '$location', $commencesText, 
'$username')";

//check query success
if ($conn->query($sql)) {
	//the application was added successfully
	$_SESSION['message'] = "nice, the appication was added successfully";
	//direct the user to their Calendar
	header("Location: userCalendar2.php");
} else {
	//the update failed
	$_SESSION['message'] = "whoops, something went wrong, please try to add the application again";
	header("Location: newApplication.php");
}

$conn->close();

?>
