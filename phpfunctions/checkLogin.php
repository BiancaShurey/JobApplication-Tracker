
<!--this page is called from login.php after the user submits their username
//and password->

//<!-first, get the variables that were submitted from the login.php form-->
<?php
$username = $_REQUEST["username"];
$password = $_REQUEST["password1"];

session_start();
//<!-now call the database to check if the username and password match->
//bring in the config file to get the database access credentials
require 'config.php';
require_once 'classes.php';

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
	//die("Connection failed: " . $conn->connect_error);
	$_SESSION['message'] = "Whoops, looks like something went wrong with the database, please try again";
	header("Location: ../login.php");
}

//query the database
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

//parse the query results
if ($result->num_rows > 0)
{
	while ($row = $result->fetch_assoc())
	{
		if ($row['username'] == $username && password_verify($password, $row['password']))
		{
			//then the user credentials are correct
			//$_SESSION['message'] = "Welcome back, ".$username;	//message to display in the userCalendar page
			//$_SESSION['message'] = "username, pword, email, phone, staysign =".$username.$row['password'].$row['email'].$row['phone'].$staySignedIn;	//message to display in the userCalendar page
			//check if the user elected to "stay signed in"
			if (isset($_REQUEST["staySignedIn"]))
			{
				$staySignedIn = 1;
			} else {
				$staySignedIn = 0;
			}
			//set the session and cookie details
			$current = new currentUser();
			$current->setAll($username, $row['password'], $row['email'],
					$row['phone'], $staySignedIn);
			/*
			$current = new currentUser($username, $row['password'], $row['email'],
					$row['phone'], $staySignedIn);
			*/
			header("Location: userCalendar2.php");	//redirect to calendar
			exit;
		} else {
			//then the user credentials were incorrect
			$_SESSION['message'] = "Whoops, username/password was incorrect, have another go...";
			header("Location: ../login.php");
			exit;
		}
	}
} else {
	$_SESSION['message'] = "Seems that username/password was incorrect, have another go...";
	header("Location: ../login.php");
}

?>
