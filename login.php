
<?php require 'phpfunctions\header.php';?>

<body>

<div class="main">
	<div class="container">
		<div class="Jumbotron">
          <h1>Login</h1>
          <h2>get in here!</h2>
        </div>

		<!--Main login form-->
		<form class="form-horizontal" method="POST" action="phpfunctions/checkLogin.php">
			<?php
			if(isset($_SESSION['message'])){
				echo "<p>".$_SESSION['message']."</p>";
				unset($_SESSION['message']);
			}
			?>
			<div class="form-group">
				<label class="control-label col-sm-2" for="username">Username:</label>
				<div class="col-sm-10">
					<input type="text" id="username" name="username" class="content"/><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password1">Password:</label>
				<div class="col-sm-10">
					<input type="password" id="password1" name="password1" class="content" /><br>
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
					<button type="submit" class="btn btn-default">Sign In</button>
				</div>
			</div>

			<div class="form-group">
				<p class="col-sm-offset-2 col-sm-10"><a href="javascript:forgotLogin()">Forgot your login?</a></p>
			</div>

		</form>

		<!--Recover login details form-->
		<form class="form-horizontal" id="forgotLogin" style="display: none" method="POST" action="phpfunctions/forgotLogin.php">
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email:</label>
				<div class="col-sm-10">
					<input type="text" id="email" name="email" class="content"/><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="phone">Phone:</label>
				<div class="col-sm-10">
					<input type="text" id="phone" name="phone" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Retrieve login</button>
				</div>
			</div>

		</form>

		<div class="form-group">
			<label class="control-label col-sm-2">Don't have an account?</label>
			<div class="col-sm-10">
				<p><a href="register2.php">Create one</a></p>
			</div>
		</div>

	</div>
</div>

<script>
function forgotLogin()
{
	//toggles the forgotten login form visibility
	//document.getElementById("testlab").innerHTML = "it worked";
	var x = document.getElementById("forgotLogin");
	if (x.style.display === 'none')
	{
		x.style.display = 'block';
	} else {
		x.style.display = 'none';
	}
};
</script>

</body>
</html>
