<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Job Application Tracker</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href='css/fullcalendar.min.css' rel='stylesheet' />
<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href="css/stylesheet.css" rel="stylesheet">
<script src='js/moment.min.js'></script>
<script src='js/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script>
	$(document).ready(function() {
                console.log("test")
                $('#calendar').fullCalendar({
                  events: 'phpfunctions/getdates.php'
              });
            });
</script>
</head>
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
