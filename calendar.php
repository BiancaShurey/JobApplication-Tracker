<!--Breaks if header.php is used-->
<!-- refer to https://fullcalendar.io/docs/mouse/eventClick/ and dynamic page generation for getting to application pages-->
<?php
//check if a user is already signed in (the header is presented
//differently if a user is already signed in).
require_once 'phpfunctions/config.php';
require_once 'phpfunctions/classes.php';
$current = new currentUser();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Application Tracker</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src='js/jquery.min.js'></script>
		<link href='css/fullcalendar.min.css' rel='stylesheet' />
     <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
     <script src='js/moment.min.js'></script>
     <script src='js/fullcalendar.min.js'></script>
     <link href='css/stylesheet.css' rel='stylesheet'>
		 <script>
			$(document).ready(function() {
		                $('#calendar').fullCalendar({
		                  events: 'phpfunctions/getdates.php',
											height: 650,
                      navLinks: true, // can click day/week names to navigate views
                			editable: true,
                			eventLimit: true, // allow "more" link when too many events
                      eventClick: function(event) {
                            window.open('applicationDetails.php?id='+event.id);
                            return false;}
		              });
									$('#list').fullCalendar({
										header: {
													left: 'prev,next today',
													center: 'title',
													right: 'listDay,listWeek'
												},
												// customize the button names,
												// otherwise they'd all just say "list"
												views: {
													listDay: { buttonText: 'list day' },
													listWeek: { buttonText: 'list week' }
												},
                    navLinks: true, // can click day/week names to navigate views
              			editable: true,
              			eventLimit: true, // allow "more" link when too many events
										defaultView: 'listWeek',
										events: 'phpfunctions/getdates.php',
										height: 650,
                    eventClick: function(event) {
                        window.open('applicationDetails.php?id='+event.id);
                        return false;
    }});
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
		max-width: 69%;
		margin: 25px 0px;
		height: 90%;
		float:left;
	}

	#list{
		max-width: 29%;
		margin: 25px 0px;
		height: 90%;
		border-style: solid;
		border-left: thick #000000;
		border-top: none;
		border-bottom: none;
		border-right: none;
		float:right;
	}

</style>
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
				<a class="navbar-brand" href="index.php">Job Application Tracker</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<?php echo
					"<li><a>Hey, ".$current->username()."</a></li>
					<li><a href=\"calendar.php\">Calendar</a></li>
					<li><a href=\"userCompanies.php\">Companies</a></li>
					<li><a href=\"userContacts.php\">Contacts</a></li>
					<li class=\"dropdown\">
					<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">My Account
					<span class=\"caret\"></span></a>
					<ul class=\"dropdown-menu\">
					<li><a href=\"userDetails.php\">My details</a></li>
					<li><a href=\"register2.php\">Create a new account</a></li>
							<li><a href=\"logout.php\">Sign out</a></li>
						</ul>
					</li>"; ?>
							</ul>
						</li>
				</ul>
			</div>
		</div>
	</nav>
	<div id='calendar'></div>
	<div id='list'></div>
	<nav class="navbar navbar-default navbar-fixed-bottom">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Job Application Tracker</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
			<li><a href="#">Features</a></li>
			<li><a href="contactUs.php">Contact Us</a></li>
			<li><a href="#">FAQ</a></li>
			</ul>
		</div>
	</div>
	</nav>
</body>
</html>
