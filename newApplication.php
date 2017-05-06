<?php
require 'phpfunctions\header.php';
require_once 'phpfunctions\classes.php';
$currentUser = new currentUser();
if ($currentUser->username())
{
	$username = $currentUser->username();
}
else {
	$_SESSION['message'] = "Please log in to use your calendar";
	header("Location: login.php");
	exit;
}
?><html>
<body>

<div class="main">
	<div class="container">
		<div class="Jumbotron">
          <h1>Add application</h1>
          <h2>add a new job application to your calendar</h2>
        </div>
        <p>Welcome <?php echo $username; ?>!</p>
		<p>Your details are:</p>
		<p>username: <?php echo $_SESSION['username']?></p>
		<p>email: <?php echo $_SESSION['email']?></p>
		<p>phone: <?php echo $_SESSION['phone']?></p>
		<p>password: <?php echo $_SESSION['password']?></p>

		<form class="form-horizontal" method="POST" action="phpfunctions\createApplication.php">
			<?php
			if(isset($_SESSION['message'])){
				echo "<p>".$_SESSION['message']."</p>";
				unset($_SESSION['message']);
			}
			?>
			<div class="form-group">
				<label class="control-label col-sm-2" for="company">company:</label>
				<div class="col-sm-10">
					<input type="text" id="company" name="company" class="content" onkeyup="searchCompanies(this.value)" onblur="closeSuggestions()"/><br>
				</div>
				<p id="livesearch"></p>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="title">title:</label>
				<div class="col-sm-10">
					<input type="text" id="title" name="title" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="type">type:</label>
				<div class="col-sm-10">
					<input type="text" id="type" name="type" class="content"/><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="duration">duration:</label>
				<div class="col-sm-10">
					<input type="text" name="duration" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="site">site:</label>
				<div class="col-sm-10">
					<input type="text" name="site" class="content" /><br>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="released">released:</label>
				<div class="col-sm-10">
					<input type="date" name="released" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="closes">closes:</label>
				<div class="col-sm-10">
					<input type="date" name="closes" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="selection">selection:</label>
				<div class="col-sm-10">
					<input type="text" name="selection" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="hearfrom">hearfrom:</label>
				<div class="col-sm-10">
					<input type="date" name="hearfrom" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="location">location:</label>
				<div class="col-sm-10">
					<input type="text" name="location" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="commences">commences:</label>
				<div class="col-sm-10">
					<input type="date" name="commences" class="content" /><br>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
						<label><input type="checkbox" name="applied"> Applied already?</label>
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
