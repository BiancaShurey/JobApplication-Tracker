
<?php

session_start();
//bring in config file to gain access to support functions
require 'phpfunctions\config.php';
$current = new currentUser();	//the user that is currently logged in (if any)
if (!$current->username())
{
	//no user is logged in, so redirect to login page
	$_SESSION['message'] = "Please sign in to use your account";
	header("Location: login.php");
	exit;
}
?>

<?php include 'phpfunctions\header-standard.php';?>
<div class="main">
	<div class="container">
		<div class="Jumbotron">
          <h1>My Details</h1>
          <h2>Review or edit your details:</h2>
        </div>
		<?php
		if(isset($_SESSION['message'])){
			echo "<p>".$_SESSION['message']."</p>";
			unset($_SESSION['message']);
		}
		?>
		<div class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2">Username:</label>
				<label class="col-sm-2"><?php echo $current->username();?></label>
				<span class="col-sm-8"><button onClick="toggleVisibility('editusername')">edit</button></span>
			</div>
			<form class="form-horizontal" method="POST" action="changeDetails.php">
			<div class="form-group" id="editusername" style="display: none">
				<label class="control-label col-sm-2" for="newusername">New username:</label>
				<div class="col-sm-2">
					<input type="text" id="newusername" name="newusername" class="content" onblur="checkUsername(this.value)"/><br>
				</div>
				<span class="col-sm-8"><button>sumbit change</button></span>
			</div>
			</form>
			<div class="form-group">
				<label class="col-sm-2">Password:</label>
				<label class="col-sm-2">hidden</label>
				<span class="col-sm-8"><button onClick="toggleVisibility('editpassword')">edit</button></span>
			</div>
			<form class="form-horizontal" method="POST" action="changeDetails.php">
			<div class="form-group" id="editpassword" style="display: none">
				<label class="control-label col-sm-2" for="newpassword">New password:</label>
				<div class="col-sm-2">
					<input type="password" id="newpassword" name="newpassword" class="content" onblur="checkUsername(this.value)"/><br>
				</div>
				<span class="col-sm-8"><button>sumbit change</button></span>
			</div>
			</form>
			<div class="form-group">
				<label class="col-sm-2">Email:</label>
				<label class="col-sm-2"><?php echo $current->email();?></label>
				<span class="col-sm-8"><button onClick="toggleVisibility('editemail')">edit</button></span>
			</div>
			<form class="form-horizontal" method="POST" action="changeDetails.php">
			<div class="form-group" id="editemail" style="display: none">
				<label class="control-label col-sm-2" for="newemail">New email:</label>
				<div class="col-sm-2">
					<input type="text" id="newemail" name="newemail" class="content" onblur="checkUsername(this.value)"/><br>
				</div>
				<span class="col-sm-8"><button>sumbit change</button></span>
			</div>
			</form>
			<div class="form-group">
				<label class="col-sm-2">Phone:</label>
				<label class="col-sm-2"><?php echo $current->phone();?></label>
				<span class="col-sm-8"><button onClick="toggleVisibility('editphone')">edit</button></span>
			</div>
			<form class="form-horizontal" method="POST" action="changeDetails.php">
			<div class="form-group" id="editphone" style="display: none">
				<label class="control-label col-sm-2" for="newphone">New phone:</label>
				<div class="col-sm-2">
					<input type="text" id="newphone" name="newphone" class="content" onblur="checkUsername(this.value)"/><br>
				</div>
				<span class="col-sm-8"><button>sumbit change</button></span>
			</div>
			</form>
		</div>
	</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<?php echo "username is ".$username?></br>
<?php echo "username is ".$current->username()?></br>
<?php echo "password is ".$current->password()?></br>
<?php echo "email is ".$current->email()?></br>
<?php echo "phone is ".$current->phone()?></br>

</body>
</html>
