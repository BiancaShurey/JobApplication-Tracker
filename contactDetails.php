
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

//HERE WE NEED TO GET $name AND $company FROM THE CONTACTS LIST PAGE SOMEHOW.
//BELOW IT IS HARDCODED FOR TESTING PURPOSES
$company = '49ers';
$name = 'Mr Glass';
$username = $current->username();

//Get details of this application from database		
// Create database connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check database connection
if ($conn->connect_error) {
	$_SESSION['message'] = "Couldn't access database.";
	$conn->close();
	header("Location: userContacts.php");
	exit;
}

//create SQL query for company
$sql = "SELECT * FROM contacts WHERE username = '$username' AND company = '$company' AND name = '$name'";
$result = $conn->query($sql);

//check if database queries were successful
if (!$result) {
	$_SESSION['message'] = "Couldn't find the contact.";
	$conn->close();
	header("Location: userContacts.php");
	exit;
}

//Get parameters from query result
while ($row = $result->fetch_assoc())
{
	$type = $row['type'];
	$phone = $row['phone'];
	$email = $row['email'];
	$location = $row['location'];
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
          <h1><?php echo $name." with ".$company; ?></h1>
          <h2>Review/edit details for <?php echo $name;?>:</h2>
        </div>
		
		<form class="form-horizontal" method="POST" action="updateContact.php">
			<?php 
			if(isset($_SESSION['message'])){
				echo "<p>".$_SESSION['message']."</p>";
				unset($_SESSION['message']);
			}
			?>
			<div class="form-group">
				<label class="control-label col-sm-2" for="name">name:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $name;?>" type="text" id="name" name="name" class="content"/><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="company">company:</label> 
				<div class="col-sm-10">  
					<input value="<?php echo $company;?>" type="text" id="company" name="company" class="content" onkeyup="searchCompanies(this.value)" onblur="closeSuggestions()"/><br>
				</div>
				<p id="livesearch"></p>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="type">type:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $type;?>" type="text" id="type" name="type" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="phone">phone:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $phone;?>" type="text" name="phone" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">email:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $email;?>" type="text" name="email" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="location">location:</label>
				<div class="col-sm-10">  
					<input value="<?php echo $location;?>" type="text" name="location" class="content" /><br>
				</div>
			</div>
			
			<!-- Contact details before changes -->
			<input value="<?php echo $company;?>" type="text" id="companyInitial" name="companyInitial" class="content" /><br>
			<input value="<?php echo $name;?>" type="text" id="nameInitial" name="nameInitial" class="content" /><br>

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
	document.getElementById("nameInitial").style.display = "none";
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