
<?php
//check if username exists in session or in cookies,
//and create the welcome message as appropriate.
session_start();
if(isset($_SESSION['username'])){
	$welcomeMessage = "Hi ".$_SESSION['username'].", what would you like to tell us?";
} elseif (isset($_COOKIE['username']))
{
	$welcomeMessage = "Hi ".$_COOKIE['username'].", what would you like to tell us?";
} else {
	$welcomeMessage = "What would you like to tell us?";
}
//check if the email exists in the session or in cookies,
//and create the $email variable accordingly
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
} elseif (isset($_COOKIE['email']))
{
	$email = $_COOKIE['email'];
} else {
	$email = "";
}
?>

<?php include 'phpfunctions\header-standard.php';?>
<div class="main">
	<div class="container">
		<div class="Jumbotron">
          <h1>Contact Us</h1>
          <h2><?php echo $welcomeMessage?></h2>
        </div>
		<form class="form-horizontal" method="POST" action="phpfunctions/endEmail.php">
			<div class="form-group">
				<label for="email">Your email:</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>"></input>
			</div>
			<div class="form-group">
				<label for="emailMessage">Message:</label>
				<textarea type="text" class="form-control" id="emailMessage" name="emailMessage" rows="10" cols="30"></textarea>
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
