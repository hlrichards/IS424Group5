<?php
session_start();
if ($_SESSION['user'] != "passwd") {
	echo "<p> Access denied. You will now be redirected to the login page.</p>";
	echo "<META HTTP-EQUIV=\"refresh\" content=\"2; URL=login.php\"> ";
	exit;
}
?>
