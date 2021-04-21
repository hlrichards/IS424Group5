<?php
include ("connect.inc.php");
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bulma-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="logo.png">
    <title>Edit Data</title>
</head>

<body class="bg">

    <!-- Navigation Bar -->
    <div class="navbar">
        <a>
            <img src="logo.png" alt="Site Logo" id="maydm-logo" width=50px height=60px;>
         </a>
        <div class="navbar-brand">
            
            <div class="navbar-item">
            <!--Logo-->
                
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
                    <a href="student.php">Students</a>
                </div>
                <div class="navbar-item">
                    <a href="donor.php">Donors</a>
                </div>
                <div class="navbar-item">
                    <a href="internship.php">Internships</a>
                </div>
                <div class="navbar-item">
                    <a href="program.php">Programs</a>
                </div>
                <div class="navbar-item">
                    <a href="mentor.php">Mentors</a>
                </div>
                <div class="navbar-item">
                    <a href="company.php">Companies</a>
                </div>
                <div class="navbar-item" style="background-color:white;">
                    <a href="instructor.php"  style="color:rgb(9, 204, 238)">Instructors</a>
                </div>
		        <div class="navbar-item">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="has-text-centered has-background-aqua">
        <form action="edit-instructor.php" method="post" style="padding-top:50px;color: black; width:50%; margin-left:25%; margin-right:25%" role="form">
            <label><b>You must enter an ID for the entry you are editing, deleting, or adding</b></label>
          <div class="form-group">
            <label>Instructor ID</label>
            <input type="text" name="instructor_id" class="form-control" maxlength="10" required>
          </div>
          <div class="form-group">
            <label>Instructor Name</label>
            <input type="text" name="instructor_name" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>Hourly Pay</label>
            <input type="text" name="pay" class="form-control" maxlength="200">
          </div>
            <p>
	            <input type="submit" class="btn btn-primary" id="data-btn" name="submit1" value="Edit">
	            <input type="submit" class="btn btn-primary" id="data-btn" name="submit2" value="Delete">
	            <input type="submit" class="btn btn-primary" id="data-btn" name="submit3" value="Add">
            </p>
        </form>
    </div>
    
<?php
if (isset($_POST['submit1'])){
	$id = $_POST['instructor_id'];
	$name = $_POST['instructor_name'];
	$pay = $_POST['pay'];
	$query="";
	if($name == "" && !($pay == "")) {
	    $query = "UPDATE instructor SET hourly_pay='$pay' WHERE instructor_id='$id'";
	}
	else if (!($name == "") && $pay == "") {
	    $query = "UPDATE instructor SET instructor_name='$name' WHERE instructor_id='$id'";
	}
	else if (!($name == "") && !($pay == "")) {
	    $query = "UPDATE instructor SET hourly_pay='$pay', instructor_name='$name' WHERE instructor_id='$id'";

	}
	if($query != "") {
	    $result = mysqli_query($conn, $query);
	}
	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=instructor.php\"> ";
}
	
if (isset($_POST['submit2'])){
	$id = $_POST['instructor_id'];
    $query = "DELETE FROM instructor WHERE instructor_id='$id'";
	if($query != "") {
	    $result = mysqli_query($conn, $query);
	}
	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=instructor.php\"> ";
	
}

if (isset($_POST['submit3'])){
	$id = $_POST['instructor_id'];
	$name = $_POST['instructor_name'];
	$pay = $_POST['pay'];

	if($name=="") {
	    $name = " ";
	}
	if($pay=="") {
	    $pay = 0;
	}
	
	$query = "INSERT INTO instructor (instructor_id, instructor_name, hourly_pay) VALUES ('$id','$name','$pay')";
    $result = mysqli_query($conn, $query);
    echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=instructor.php\"> ";
}

mysqli_close($conn);
?>

<footer class="page-footer font-small"> <! can remove fixed-bottom>
    <div class="footer-copyright text-center py-3" style="background-color: rgb(9, 204, 238);">© 2021 Copyright: IS424 Group 5 UW-Madison
    </div>
 </footer>
</body>

</html>
