<?php 

//<!-this file is called by the contactUs.php page after the user submits
//that form. It takes the values from the form and puts them in an email to
//send to the web administrators->

$email = $_REQUEST["email"];
$emailMessage = $_REQUEST["emailMessage"]. " was sent from ". $email;
$intro = $email. "sent you a message from JobAppTracker";

$mailStatus = mail("beau.yarranton@uqconnect.edu.au", "message from ". $email, $emailMessage);
?>

<html>
<body>
Thanks for contacting us. We'll get back to you shortly.<br />
</body>
</html>