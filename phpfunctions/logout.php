<?php
//this file is called when the user clicks the Logout button in the nav bar
session_start();

//end the session
session_unset();
session_destroy();

//remove any cookies
if (isset($_COOKIE['username']))
{
	setcookie('username', $username, time() -10000);
}
if (isset($_COOKIE['password']))
{
	setcookie('password', $password, time() -10000);
}
if (isset($_COOKIE['email']))
{
	setcookie('email', $email, time() -10000);
}
if (isset($_COOKIE['phone']))
{
	setcookie('phone', $phone, time() -10000);
}

//redirect to the home page
header("Location: index.php");
?>
