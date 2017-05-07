<?php

//<!-this file should be included with every page.
//It checks if a SESSION['message'] was passed from another page, and
//displays the message in an alert box

if (isset($_SESSION['message']))
{
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
	echo "<script>
			$(document).ready(function(){
			alert('$message');
			});
			</script>";
}
?>


