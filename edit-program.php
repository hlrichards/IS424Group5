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
                <div class="navbar-item" style="background-color:white;">
                    <a href="program.php" style="color:rgb(9, 204, 238)">Programs</a>
                </div>
                <div class="navbar-item">
                    <a href="mentor.php">Mentors</a>
                </div>
                <div class="navbar-item">
                    <a href="company.php">Companies</a>
                </div>
                <div class="navbar-item">
                    <a href="instructor.php">Instructors</a>
                </div>
		        <div class="navbar-item">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="has-text-centered has-background-aqua">
        <form action="edit-program.php" method="post" style="padding-top:50px;color: black; width:50%; margin-left:25%; margin-right:25%" role="form">
            <label><b>You must enter an ID for the entry you are editing, deleting, or adding</b></label>
          <div class="form-group">
            <label>Program ID</label>
            <input type="text" name="program_id" class="form-control" maxlength="10" required>
          </div>
          <div class="form-group">
            <label>Program Name</label>
            <input type="text" name="program_name" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>Program Type</label>
            <input type="text" name="type" class="form-control" maxlength="200">
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
	$id = $_POST['program_id'];
	$name = $_POST['program_name'];
	$type = $_POST['type'];
	$query="";
	if($name == "" && !($type == "")) {
	    $query = "UPDATE program SET program_type='$type' WHERE program_id='$id'";
	}
	else if (!($name == "") && $type == "") {
	    $query = "UPDATE program SET program_name='$name' WHERE program_id='$id'";
	}
	else if (!($name == "") && !($type == "")) {
	    $query = "UPDATE program SET program_type='$type', program_name='$name' WHERE program_id='$id'";

	}
	if($query != "") {
	    $result = mysqli_query($conn, $query);
	}
	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=program.php\"> ";
	
}

if (isset($_POST['submit2'])){
	$id = $_POST['program_id'];
    $query = "DELETE FROM program WHERE program_id='$id'";
	if($query != "") {
	    $result = mysqli_query($conn, $query);
	}
	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=program.php\"> ";
	
}

if (isset($_POST['submit3'])){
	$id = $_POST['program_id'];
	$name = $_POST['program_name'];
	$type = $_POST['type'];

	if($name=="") {
	    $name = " ";
	}
	if($type=="") {
	    $type=" ";
	}
	
	$query = "INSERT INTO program (program_id, program_name, program_type) VALUES ('$id','$name','$type')";
    $result = mysqli_query($conn, $query);
    echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=program.php\"> ";
}

mysqli_close($conn);
?>

<footer class="page-footer font-small"> <! can remove fixed-bottom>
    <div class="footer-copyright text-center py-3" style="background-color: rgb(9, 204, 238);">© 2021 Copyright: IS424 Group 5 UW-Madison
    </div>
 </footer>
</body>

</html>
