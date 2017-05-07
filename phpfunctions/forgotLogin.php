<?php

//<!-this file is called by the login.php page after the user submits
//the form for forgotten login details. If the user provides the correct email
//and phone in the form, then this script sends them an email with their 
//username and new password->

session_start();
$email = $_REQUEST["email"];
$phone = $_REQUEST["phone"];

//bring in the config file to get the database access credentials
require 'config.php';

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

//query the database
$sql = "SELECT * FROM users WHERE email = '$email' AND phone = '$phone'"; 
$result = $conn->query($sql);

//parse the query results
if ($result->num_rows > 0)
{
	while ($row = $result->fetch_assoc())
	{
		$username = $row['username'];
	}
} else {
	//the supplied credentials aren't found
	$_SESSION['message'] = "Seems that email/phone are incorrect, have another go...";
	header("Location: login.php");
	exit;
}

//reset the user's password
$newpassword = 'wigwam'.rand();
$newpasswordhash =  password_hash($password, PASSWORD_DEFAULT);
$sql = "UPDATE users SET password = '$newpasswordhash' WHERE username = '$username'";
$result = $conn->query($sql);

$conn->close();

//send email to the user
$emailMessage = "Hi there!\r\n
Your username is $username and your temporary password is $newpassword.\r\n
Follow this link to change your password:\r\n
<a href=\"$link\"></a>\r\n";

//To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$subject = "Your JobAppTracker login details";

$mailStatus = mail($email, $subject, $emailMessage, $headers);

//send the user back to the login page
$_SESSION['message'] = "We've sent you an email with your login credentials";
header("Location: login.php");

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