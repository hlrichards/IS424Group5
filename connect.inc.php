<?php
$myUserName = ""; 
$myPassword = "";
$myLocalHost = "localhost";
$myDB = "";
$conn = mysqli_connect($myLocalHost, $myUserName, $myPassword, $myDB);
if (!$conn) {
	die("Connection failed: ");
}
?>
