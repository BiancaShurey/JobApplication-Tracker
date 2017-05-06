
<?php

require_once 'phpfunctions\classes.php';
require_once 'phpfunctions\header.php';
$current = new currentUser();	//the user that is currently logged in (if any)
if (!$current->username())
{
	//no user is logged in, so redirect to login page
	$_SESSION['message'] = "Please sign in to use your account";
	header("Location: login.php");
	exit;
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Application Tracker</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
</head>
<body>

<?php //include('header.php');?>

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
				<span class="col-sm-8"><button class="toggle">edit</button></span>
			</div>

			<div class="editfield">
				<form class="form-horizontal" method="POST" action="changeDetails.php">
				<div class="form-group" id="editusername">
					<label class="control-label col-sm-2" for="newusername">New username:</label>
					<div class="col-sm-2">
						<input type="text" id="newusername" name="newusername" class="content" onblur="checkUsername(this.value)"/><br>
					</div>
					<span class="col-sm-8"><button>submit change</button></span>
				</div>
				</form>
			</div>

			<div class="form-group">
				<label class="col-sm-2">Password:</label>
				<label class="col-sm-2">hidden</label>
				<span class="col-sm-8"><button class="toggle">edit</button></span>
			</div>

			<div class="editfield">
				<form class="form-horizontal" method="POST" action="changeDetails.php">
				<div class="form-group" id="editpassword">
					<label class="control-label col-sm-2" for="newpassword">New password:</label>
					<div class="col-sm-2">
						<input type="password" id="newpassword" name="newpassword" class="content" onblur="checkUsername(this.value)"/><br>
					</div>
					<span class="col-sm-8"><button>submit change</button></span>
				</div>
				</form>
			</div>

			<div class="form-group">
				<label class="col-sm-2">Email:</label>
				<label class="col-sm-2"><?php echo $current->email();?></label>
				<span class="col-sm-8"><button class="toggle">edit</button></span>
			</div>

			<div class="editfield">
				<form class="form-horizontal" method="POST" action="changeDetails.php">
				<div class="form-group" id="editemail">
					<label class="control-label col-sm-2" for="newemail">New email:</label>
					<div class="col-sm-2">
						<input type="text" id="newemail" name="newemail" class="content" onblur="checkUsername(this.value)"/><br>
					</div>
					<span class="col-sm-8"><button>submit change</button></span>
				</div>
				</form>
			</div>

			<div class="form-group">
				<label class="col-sm-2">Phone:</label>
				<label class="col-sm-2"><?php echo $current->phone();?></label>
				<span class="col-sm-8"><button class="toggle">edit</button></span>
			</div>

			<div class="editfield">
				<form class="form-horizontal" method="POST" action="phpfunctions\changeDetails.php">
				<div class="form-group" id="editphone">
					<label class="control-label col-sm-2" for="newphone">New phone:</label>
					<div class="col-sm-2">
						<input type="text" id="newphone" name="newphone" class="content" onblur="checkUsername(this.value)"/><br>
					</div>
					<span class="col-sm-8"><button>submit change</button></span>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script>
    //This method sets the "editfield" elements to hidden upon page load.
    //It binds the "edit" buttons so that when one is clicked it slides the corresponding
    //edit form down.
    $(document).ready(function(){
        $(".editfield").hide();
        $(".toggle").click(function(){
            $(this).closest("div").next().slideToggle();
            });
        });
    </script>

<?php include 'sessionMessage.php'?>
</body>
</html>
