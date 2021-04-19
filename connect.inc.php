<?php
$myUserName = "halric4"; 
$myPassword = "E95qvsXemUgcSiG";
$myLocalHost = "localhost";
$myDB = "halric4_maydm";
$conn = mysqli_connect($myLocalHost, $myUserName, $myPassword, $myDB);
if (!$conn) {
	die("Connection failed: ");
}
?>
