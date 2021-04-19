<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bulma-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Employee Login</title>

</head>

<body class="bg">
    <?php
session_start()
?>
    <!-- Navigation Bar -->
    <div class="navbar">
        <div class="navbar-brand">
            <div class="navbar-item">
            <!--Logo-->
                <a>
                    <img src="logo.png" alt="Site Logo">
                </a>
            </div>
            <div class="navbar-burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="navbar-menu is-active">
            <div class="navbar-end">
                <div class="navbar-item">
                    <a href="index.html">Home</a>
                </div>
                <div class="navbar-item">
                    <a href="support.html">Tech Support</a>
                </div>
            </div>
        </div>
    </div>

    <!--Login Form-->
    <!-- make 3 columns, form is middle one with dif bg color -->
    <div class="has-text-centered has-background-aqua">
        <form action="login.php" method="post">
        <!--Logo-->
            <a><img src="logo.png" width="200px" alt="Site Logo" id="logo"></a>


            <div class="field">
                <label class="label">Username</label>
                <div class="control">
                    <input type="text" name="username" id="">
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input type="password" name="password" id="">
                </div>
            </div>

            <p>
                <input type="submit" name="log" value="Login">
                <input type="reset" value="Reset">
            </p>
        </form>


    </div>


<?php
include("connect.inc.php");
if ($_POST['log']){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT username, password FROM users WHERE (username='$username') AND (password='$password')";
	$result = mysqli_query($conn, $query);
	$num = mysqli_num_rows($result);
	if (!$result){
		die("cannot processed select query");
	}
	if ($num == 1) {
		echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=data.html\"> ";
	}
	else{
		echo "Invalid username/password";
	}
}
mysqli_close($conn);
?>


</body>

</html>