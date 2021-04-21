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
                <div class="navbar-item" style="background-color:white;">
                    <a href="student.php" style="color:rgb(9, 204, 238)">Students</a>
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
        <form action="edit-student.php" method="post" style="padding-top:50px;color: black; width:50%; margin-left:25%; margin-right:25%" role="form">
            <label><b>You must enter an ID for the entry you are editing, deleting, or adding</b></label>
          <div class="form-group">
            <label>Student ID</label>
            <input type="text" name="student_id" class="form-control" maxlength="10" required>
          </div>
          <div class="form-group">
            <label>Student Name</label>
            <input type="text" name="student_name" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>Age</label>
            <input type="text" name="age" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>Birthday</label>
            <input type="text" name="birthday" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>Grade Level</label>
            <input type="text" name="grade" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>School</label>
            <input type="text" name="school" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>Gender</label>
            <input type="text" name="gender" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>Ethnicity</label>
            <input type="text" name="ethnicity" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>Free Reduced Lunch (enter 1 if yes, 0 if no)</label>
            <input type="text" name="lunch" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone" class="form-control" maxlength="200">
          </div>
          <div class="form-group">
            <label>Zip Code</label>
            <input type="text" name="zip" class="form-control" maxlength="200">
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
	$id = $_POST['student_id'];
	$name = $_POST['student_name'];
	$age = $_POST['age'];
	$birthday = $_POST['birthday'];
	$grade = $_POST['grade'];
	$school = $_POST['school'];
	$gender = $_POST['gender'];
	$ethnicity = $_POST['ethnicity'];
	$lunch = $_POST['lunch'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$zip = $_POST['zip'];
	$query="";
	
	if($name=="") {
	    $queryname="SELECT student_name FROM student WHERE student_id='$id'";
	    $name_res=mysqli_query($conn, $queryname);
	    $row_name = mysqli_fetch_assoc($name_res);
    	$name = $row_name["student_name"];
	}
	if($age=="") {
	    $queryage="SELECT age FROM student WHERE student_id='$id'";
	    $age_res=mysqli_query($conn, $queryage);
	    $row_age = mysqli_fetch_assoc($age_res);
    	$age = $row_age["age"];
	}
	if($birthday=="") {
	    $querybday="SELECT birthday FROM student WHERE student_id='$id'";
	    $bday_res=mysqli_query($conn, $querybday);
	    $row_bday = mysqli_fetch_assoc($bday_res);
    	$birthday = $row_bday["birthday"];
	}
	if($grade=="") {
	    $querygrade="SELECT grade_level FROM student WHERE student_id='$id'";
	    $grade_res=mysqli_query($conn, $querygrade);
	    $row_grade = mysqli_fetch_assoc($grade_res);
    	$grade = $row_grade["grade_level"];
	}
	if($school=="") {
	    $queryschool="SELECT school FROM student WHERE student_id='$id'";
	    $school_res=mysqli_query($conn, $queryschool);
	    $row_school = mysqli_fetch_assoc($school_res);
    	$school = $row_school["school"];
	}
	if($gender=="") {
	    $querygender="SELECT gender FROM student WHERE student_id='$id'";
	    $gender_res=mysqli_query($conn, $querygender);
	    $row_gender = mysqli_fetch_assoc($gender_res);
    	$gender = $row_gender["gender"];
	}
	if($ethnicity=="") {
	    $queryethnicity="SELECT ethnicity FROM student WHERE student_id='$id'";
	    $eth_res=mysqli_query($conn, $queryethnicity);
	    $row_eth = mysqli_fetch_assoc($eth_res);
    	$ethnicity = $row_eth["ethnicity"];
	}
	if($lunch=="") {
	    $querylunch="SELECT free_reduced_lunch FROM student WHERE student_id='$id'";
	    $lunch_res=mysqli_query($conn, $querylunch);
	    $row_lunch = mysqli_fetch_assoc($lunch_res);
    	$lunch = $row_lunch["free_reduced_lunch"];
	}
	if($email=="") {
	    $queryemail="SELECT email FROM student WHERE student_id='$id'";
	    $email_res=mysqli_query($conn, $queryemail);
	    $row_email = mysqli_fetch_assoc($email_res);
    	$email = $row_email["email"];
	}
	if($phone=="") {
	    $queryphone="SELECT phone FROM student WHERE student_id='$id'";
	    $phone_res=mysqli_query($conn, $queryphone);
	    $row_phone = mysqli_fetch_assoc($phone_res);
    	$phone = $row_phone["phone"];
	}
	if($zip=="") {
	    $queryzip="SELECT zip_code FROM student WHERE student_id='$id'";
	    $zip_res=mysqli_query($conn, $queryzip);
	    $row_zip = mysqli_fetch_assoc($zip_res);
    	$zip = $row_zip["zip_code"];
	}
	
	
	$query = "UPDATE student SET student_name='$name', age='$age', birthday='$birthday', grade_level='$grade', school='$school', gender='$gender', ethnicity='$ethnicity', free_reduced_lunch='$lunch', email='$email', phone='$phone', zip_code='$zip' WHERE student_id='$id'";

	if($query != "") {
	    $result = mysqli_query($conn, $query);
	}

	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=student.php\"> ";
}

if (isset($_POST['submit2'])){
	$id = $_POST['student_id'];
    $query = "DELETE FROM student WHERE student_id='$id'";
	if($query != "") {
	    $result = mysqli_query($conn, $query);
	}
	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=student.php\"> ";
	
}

if (isset($_POST['submit3'])){
	$id = $_POST['student_id'];
	$name = $_POST['student_name'];
	$age = $_POST['age'];
	$birthday = $_POST['birthday'];
	$grade = $_POST['grade'];
	$school = $_POST['school'];
	$gender = $_POST['gender'];
	$ethnicity = $_POST['ethnicity'];
	$lunch = $_POST['lunch'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$zip = $_POST['zip'];
	
	
	if($name=="") {
    	$name = " ";
	}
	if($age=="") {
    	$age = 0;
	}
	if($birthday=="") {
    	$birthday = "0000-00-00";
	}
	if($grade=="") {
    	$grade = 0;
	}
	if($school=="") {
    	$school = " ";
	}
	if($gender=="") {
    	$gender = " ";
	}
	if($ethnicity=="") {
    	$ethnicity = " ";
	}
	if($lunch=="") {
    	$lunch = 0;
	}
	if($email=="") {
    	$email = " ";
	}
	if($phone=="") {
    	$phone = " ";
	}
	if($zip=="") {
    	$zip = " ";
	}
	
	
	$query = "INSERT INTO student (student_id, student_name, age, birthday, grade_level, school, gender, ethnicity, free_reduced_lunch, email, phone, zip_code) VALUES ('$id','$name', '$age', '$birthday', '$grade', '$school', '$gender','$ethnicity', '$lunch','$email','$phone','$zip')";

	if($query != "") {
	    $result = mysqli_query($conn, $query);
	}

	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=student.php\"> ";
}

mysqli_close($conn);
?>

<footer class="page-footer font-small">
    <div class="footer-copyright text-center py-3" style="background-color: rgb(9, 204, 238);">© 2021 Copyright: IS424 Group 5 UW-Madison
    </div>
 </footer>

</body>

</html>
