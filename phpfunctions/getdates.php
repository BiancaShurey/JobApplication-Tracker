<?php
session_start();
//bring in config file to gain access to support functions
require 'config.php';
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, start, `end` FROM applications";
$result = $conn->query($sql);

$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}
$myJSON = json_encode($emparray);
echo  $myJSON;

$conn->close();
?>
