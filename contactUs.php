
<?php 
session_start();
if(isset($_SESSION['username'])){
	$welcomeMessage = "Hi ".$_SESSION['username'].", what would you like to tell us?";
} else {
	$welcomeMessage = "What would you like to tell us?";
}
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
} else {
	$email = "";
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Application Tracker - Contact Us</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
            <li><a href="#">Features</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="register.php">Sign Up</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </div>
      </div>
    </nav>

<div class="main">
	<div class="container">
		<div class="Jumbotron">
          <h1>Contact Us</h1>
          <h2><?php echo $welcomeMessage?></h2>
        </div>
		<form class="form-horizontal" method="POST" action="sendEmail.php">
			<div class="form-group">
				<label for="email">Your email:</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>">
			</div>
			<div class="form-group">
				<label for="emailMessage">Message:</label>
				<input type="text" class="form-control" id="emailMessage" name="emailMessage">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</form>
	</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>