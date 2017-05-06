
<?php
//check if a user is already signed in (the header is presented
//differently if a user is already signed in).
require_once 'config.php';
require_once 'classes.php';
$current = new currentUser();
?>

<!-- Header section for inclusion in every page -->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Application Tracker</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src='js/jquery.min.js'></script>

    <?php
    if ($current->username())
    {
      echo"<link href='css/fullcalendar.min.css' rel='stylesheet' />
      <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
      <script src='js/moment.min.js'></script>
      <script src='js/fullcalendar.min.js'></script>"
    }
    ?>
    <link href="css/stylesheet.css" rel="stylesheet">
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
            <?php
            //$current = new currentUser();
            if ($current->username())
            {
            	//the user is signed in so display the following nav bar
            	echo
            	"<li><a>Hey, ".$current->username()."</a></li>
            	<li><a href=\"userCalendar2.php\">Calendar</a></li>
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
            	</li>";
            } else {
            	echo
              '<li><a href="#">Features</a></li>
              <li><a href="contactUs.php">Contact Us</a></li>
              <li><a href="FAQ.php">FAQ</a></li>
            	<li><a href=\"register2.php\">Sign up</a></li>
            	<li><a href=\"login.php\">Sign in</a></li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Footer to be included on every page -->
    <?php
    if ($current->username())
    {
      echo'<nav class="navbar navbar-default navbar-fixed-bottom">
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
          </ul>
        </div>
      </div>
    </nav>"'}
    ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
