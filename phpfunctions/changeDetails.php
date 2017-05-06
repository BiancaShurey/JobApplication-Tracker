<?php

//<!-this file is called by the userDetails page
//when the user submits a form to change their password or email or username or 
//phone number.->

//first check if user is logged in
session_start();
require 'config.php';
require_once 'classes.php';
$currentUser = new currentUser();
if ($currentUser->username())
{
	$username = $currentUser->username();
}
else {
	$_SESSION['message'] = "Please log in to use your Details page";
	header("Location: login.php");
	exit;
}

//get any new user parameters that have been specified
$newemail = @$_REQUEST["newemail"];
$newphone = @$_REQUEST["newphone"];
$newusername = @$_REQUEST["newusername"];
$newpassword = @$_REQUEST["newpassword"];

//get existing parameters from Session or Cookies
$username = $currentUser->username();
$passwordhash = $currentUser->password();
$email = $currentUser->email();
$phone = $currentUser->phone();

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
	$_SESSION['message'] = "whoops, failed to connect to database...".$conn->connect_error;
	header("Location: userDetails.php");
	exit;
} 

//formulate the SQL update
if ($newemail) {
	$sql = "UPDATE users SET email = '$newemail' WHERE username = '$username'";
	$email = $newemail;	//for updating the session/cookies below
} elseif ($newphone) {
	$sql = "UPDATE users SET phone = '$newphone' WHERE username = '$username'";
	$phone = $newphone;	//for updating the session/cookies below
} elseif ($newusername) {
	$sql = "UPDATE users SET username = '$newusername' WHERE username = '$username'";
	$username = $newusername;	//for updating the session/cookies below
} else {
	$newpasswordhash = password_hash($newpassword, PASSWORD_DEFAULT);
	$sql = "UPDATE users SET password = '$newpasswordhash' WHERE username = '$username'";
	$passwordhash = $newpasswordhash;	//for updating the session/cookies below
}

//send SQL 
$result = $conn->query($sql);
$conn->close();

/*
//update parameters that have been given
if ($newemail) { updateEmail($newemail, $username); }
if ($newphone) { updatePhone(); }
if ($newusername) { updateUsername(); }
if ($newpassword) { updatePassword(); }

function updateEmail($email, $user)
{	
	$sql = "UPDATE users SET email = '$email' WHERE username = '$user'";
	$result = $conn->query($sql);
}
function updatePhone()
{
	$sql = "UPDATE users SET phone = '$newphone' WHERE username = '$username'";
	$result = $conn->query($sql);
}
function updateUsername()
{
	$sql = "UPDATE users SET username = '$newusername' WHERE username = '$username'";
}
function updatePassword()
{
	$newpasswordhash = password_hash($newpassword, PASSWORD_DEFAULT);
	$sql = "UPDATE users SET password = '$newpasswordhash' WHERE username = '$username'";
}

$result = $conn->query($sql);
$conn->close();
*/

if ($result)
{
	//update was successfull, so create a message for the user
	$_SESSION['message'] = "Your details have been updated";
	//update the session details
	$currentUser->setAll($username, $passwordhash, $email, $phone);
}
else {
	$_SESSION['message'] = "Hmmm, we weren't ablt to update yo details sorry. Perhaps try again...";
}
header("Location: userDetails.php");
exit;


?>
