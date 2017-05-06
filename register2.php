
<?php require 'phpfunctions\header.php';?>

<div class="main">
	<div class="container">
		<div class="Jumbotron">
          <h1>Register</h1>
          <h2>Pop in some details so you can start using Job App Tracker:</h2>
        </div>
		<form class="form-horizontal" method="POST" action="phpfunctions\createUser.php">
			<?php
			session_start();
			if(isset($_SESSION['message'])){
				echo "<p>".$_SESSION['message']."</p>";
				unset($_SESSION['message']);
			}
			?>
			<div class="form-group">
				<label class="control-label col-sm-2" for="username">Username:</label>
				<div class="col-sm-10">
					<input type="text" id="username" name="username" class="content" onblur="checkUsername(this.value)"/><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password1">Password:</label>
				<div class="col-sm-10">
					<input type="password" id="password1" name="password1" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password2">Re-enter password:</label>
				<div class="col-sm-10">
					<input type="password" id="password2" name="password2" class="content" onblur="checkPassword()"/><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email:</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="phone">Phone:</label>
				<div class="col-sm-10">
					<input type="text" name="phone" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
						<label><input type="checkbox" name="staySignedIn"> Keep me signed in</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
			</div>
		</form>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<p id="warningUsername"/p>
			<p id="warningPassword"/p>

			<a href="">Forgot your password?</a>
			<div id="forgottenPassword"</div>
		</div>
	</div>
</div>

<script>
function checkUsername(usernameRequest) {
	//takes the username and checks if it already exists in the database
	//first check if anything has been entered
	if (usernameRequest.length == 0) {
		document.getElementById("warningUsername").innerHTML = "please enter a username";
		return;
	}
	//create an XMLHttpRequest
	var xhttp = new XMLHttpRequest();
	//define the action to be done when the XMLHttpRequest is finished
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "exists") {
				document.getElementById("warningUsername").innerHTML =
				"Awww, that username already " + this.responseText + ", please try another";
			} else {
				document.getElementById("warningUsername").innerHTML =
				"TESTING.. nice, the response is " + this.responseText;
			};
		};
	};
	xhttp.open("GET", "checkUsername.php?q=" + usernameRequest, true);
	xhttp.send();
};


function checkPassword() {
	//compares the two passwords entered by the user and raises an alert if same
	if (document.getElementById("password1").value !=
		document.getElementById("password2").value) {
		document.getElementById("warningPassword").innerHTML = "hey! your passwords do not match";
		document.getElementById("password1").value = "";
		document.getElementById("password2").value = "";
	} else {
		document.getElementById("warningPassword").innerHTML = "";
	}
}
</script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
