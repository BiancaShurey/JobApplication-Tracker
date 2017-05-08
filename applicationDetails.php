
<?php

require_once 'classes.php';
require_once 'header.php';
require_once 'config.php';
$current = new currentUser();	//the user that is currently logged in (if any)
if (!$current->username())
{
	//no user is logged in, so redirect to login page
	$_SESSION['message'] = "Please sign in to use your account";
	header("Location: login.php");
	exit;
}

//HERE WE NEED TO GET $company and $title FROM THE CALENDAR PAGE SOMEHOW.
//BELOW IT IS HARDCODED FOR TESTING PURPOSES
$company = 'AusPost';
$title = 'posty';
$username = $current->username();

//Get details of this application from database		
// Create database connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check database connection
if ($conn->connect_error) {
	$_SESSION['message'] = "Couldn't access database.";
	$conn->close();
	header("Location: userCalendar.php");
	exit;
}

//create SQL query for application
$sql = "SELECT * FROM applications WHERE username = '$username' AND Company = '$company' AND Title = '$title'";
$result = $conn->query($sql);

//check if database queries were successful
if (!$result) {
	$_SESSION['message'] = "Couldn't find the application.";
	$conn->close();
	header("Location: userCalendar.php");
	exit;
}

$classy = 'classification';
while ($row = $result->fetch_assoc())
{
	$event = new Event($row, $classy);
}

//close database connection
$conn->close();

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

<div class="main">
	<div class="container">
		<div class="Jumbotron">
          <h1><?php echo $company.", ".$title; ?></h1>
          <h2>Review/edit details for this application:</h2>
        </div>
		
		<form class="form-horizontal" method="POST" action="updateApplication.php">
			<?php 
			if(isset($_SESSION['message'])){
				echo "<p>".$_SESSION['message']."</p>";
				unset($_SESSION['message']);
			}
			?>
			<div class="form-group">
				<label class="control-label col-sm-2" for="company">company:</label> 
				<div class="col-sm-10">  
					<input value="<?php echo $event->company();?>" type="text" id="company" name="company" class="content" onkeyup="searchCompanies(this.value)" onblur="closeSuggestions()"/><br>
				</div>
				<p id="livesearch"></p>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="title">title:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $event->title();?>" type="text" id="title" name="title" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="type">type:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $event->type();?>" type="text" id="type" name="type" class="content"/><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="duration">duration:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $event->duration();?>" type="text" name="duration" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="site">site:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $event->site();?>" type="text" name="site" class="content" /><br>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="released">released:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $event->released();?>" type="date" name="released" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="closes">closes:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $event->closes();?>" type="date" name="closes" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="selection">selection:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $event->selectionCriteria();?>" type="text" name="selection" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="hearfrom">hearfrom:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $event->hearFrom();?>" type="date" name="hearfrom" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="location">location:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $event->location();?>" type="text" name="location" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="commences">commences:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $event->commences();?>" type="date" name="commences" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
						<?php 
						if ($event->applied() == 'y') {
							echo "<label><input checked=\"true\" type=\"checkbox\" name=\"applied\"> Applied already?</label>";
						} else {
							echo "<label><input type=\"checkbox\" name=\"applied\"> Applied already?</label>";
						};
						?>
					</div>
				</div>
			</div>
			
			<!-- Application details before changes -->
			<input value="<?php echo $event->company();?>" type="text" id="companyInitial" name="companyInitial" class="content" /><br>
			<input value="<?php echo $event->title();?>" type="text" id="titleInitial" name="titleInitial" class="content" /><br>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">  
					<button type="submit" class="btn btn-default">Submit changes</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
function closeSuggestions() {
	//closes the livesearch results box when the user clicks out of the Company field
	//hide the livesearch element (after a delay, to give time for the user to select an item
	//from the livesearch box)
	setTimeout(function(){$("#livesearch").slideUp();}, 500);
};
</script>

<script>
//Things to do when page is ready
$(document).ready(function(){
    //bind the livesearch results element so that it disappears after it is clicked
    $("#livesearch").click(function(){
        $("#livesearch").hide();
    });
    //hide the modals
    $(".w3-modal").hide();
	//hide the original app elements
	document.getElementById("companyInitial").style.display = "none";
	document.getElementById("titleInitial").style.display = "none";
});
</script>

<script>
//this function enables a live search for the Company text field
function searchCompanies(str) {
	if (str.length==0) {
		document.getElementById("livesearch").innerHTML="";
		document.getElementById("livesearch").style.border="0px";
		return;
		}
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
	xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
			$("#livesearch").show();
			document.getElementById("livesearch").innerHTML=this.responseText;
			document.getElementById("livesearch").style.border="1px solid #A5ACB2";
			}
		}
	xmlhttp.open("GET","searchCompanies.php?q="+str,true);
	xmlhttp.send();
	}
</script>

</body>
</html>