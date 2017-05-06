<?php require 'phpfunctions\header.php';?>
<script>
	$(document).ready(function() {
                console.log("test")
                $('#calendar').fullCalendar({
                  events: 'phpfunctions/getdates.php'
              });
            });
</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 50px ;
	}

</style>
<body>

	    <nav class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="index.html">Job Application Tracker</a>
	        </div>
	        <div class="collapse navbar-collapse" id="myNavbar">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="#">Features</a></li>
	            <li><a href="contactUs.php">Contact Us</a></li>
	            <li><a href="#">FAQ</a></li>
	            <li><a href="register.php">Sign Up</a></li>
	            <li><a href="login.php">Login</a></li>
	          </ul>
	        </div>
	      </div>
	    </nav>

	<div id='calendar'></div>

</body>
</html>
