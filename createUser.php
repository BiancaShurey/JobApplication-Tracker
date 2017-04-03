<?php

//<!-this file is called by the register.html page after the user submits
//that form. It writes the form to the database and then redirects the
//user to their userCalendar page->

$username = $_REQUEST["username"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password1"];
$passwordhash = password_hash($password, PASSWORD_DEFAULT);
$phone = $_REQUEST["phone"];

//bring in the config file to get the database access credentials
require 'config.php';

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);


echo "connection status is " .$conn->connect_errno;

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users (username, password, email, phone) VALUES 
('$username', '$passwordhash', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
	//the user was created successfully
	//add the user details to the session
	session_start();
	$_SESSION['username']= $username;	
	$_SESSION['email'] = $email;
	//create a cookie if the user elected to "stay signed in"
	if (isset($_REQUEST["staySignedIn"]))
	{
		setcookie('username', $username);
	}
	//direct the user to their Calendar
	header("Location: userCalendar.php");
} else {
	//the registration failed
	session_start();
	$_SESSION['message'] = "whoops, something went wrong, please try to register again";
	header("Location: register2.php");
}

$conn->close();

?>
/*
<html>
<body>
The username created is <?php echo $username; ?><br />
The email address created is <?php echo $email; ?><br/>
The passowrd created is <?php echo $password; ?><br/>
The phone number created is <?php echo $phone; ?><br/>
</body>
</html>
*/