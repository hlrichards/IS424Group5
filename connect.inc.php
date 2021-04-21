<?php
$myUserName = "id16638289_maydm"; 
$myPassword = "dRyV/hlf/lAMx5ve";
$myLocalHost = "localhost";
$myDB = "id16638289_maydmdb";
$conn = mysqli_connect($myLocalHost, $myUserName, $myPassword, $myDB);
if (!$conn) {
	die("Connection failed: ");
}
?>
