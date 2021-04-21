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
    <title>Student Data</title>

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
                    <a href="student.php"  style="color:rgb(9, 204, 238)">Students</a>
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
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $sql1="SELECT * FROM student";
	$select_result = mysqli_query($conn, $sql1);
	if(!$select_result) {
		die("cannot process select query");
	}
	$num1 = mysqli_num_rows($select_result);
	if($num1 > 0) {
	    echo "<div class='container' id='data'> 
	    <a href='edit-student.php' class='btn btn-primary' id='data-btn'>Edit, Delete, or Add Data</a>
          <table class='table table-bordered'>
            <thead>
              <tr>
                <th colspan=12 id='table-title'>Student Table</th>
              </tr>
              <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Age</th>
                <th>Birthday</th>
                <th>Grade Level</th>
                <th>School</th>
                <th>Gender</th>
                <th>Ethnicity</th>
                <th>Free/Reduced Lunch?</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Zip Code</th>
              </tr>
            </thead>
            <tbody>";
    }
    for ($i=0;$i<$num1;$i++) {
    	$row = mysqli_fetch_assoc($select_result);
    	$student_id = $row["student_id"];
    	$student_name = $row["student_name"];
    	$age = $row["age"];
    	$birthday = $row["birthday"];
    	$grade = $row["grade_level"];
    	$school = $row["school"];
    	$gender = $row["gender"];
    	$ethnicity = $row["ethnicity"];
    	$lunch = $row["free_reduced_lunch"];
    	$email = $row["email"];
    	$phone = $row["phone"];
    	$zip = $row["zip_code"];
        echo "<tr>
                <td>";
                echo $student_id;
                echo "</td>
                <td>";
                echo $student_name;
                echo "</td>
                <td>";
                echo $age;
                echo "</td>
                <td>";
                echo $birthday;
                echo "</td>
                <td>";
                echo $grade;
                echo "</td>
                <td>";
                echo $school;
                echo "</td>
                <td>";
                echo $gender;
                echo "</td>
                <td>";
                echo $ethnicity;
                echo "</td>
                <td>";
                if($lunch==1) {
                    echo "Yes";
                } else {
                    echo "No";
                }
                echo "</td>
                <td>";
                echo $email;
                echo "</td>
                <td>";
                echo $phone;
                echo "</td>
                <td>";
                echo $zip;
                echo "</td>
              </tr>";
    }
    echo "</tbody>
          </table>
        </div><br><br><br>";
} else {
    echo "Please log in first to see this page. ";
    echo "You will now be returned to the login page. <META HTTP-EQUIV=\"refresh\" content=\"2; URL=login.php\">";
}
?>

<footer class="page-footer font-small"> <! can remove fixed-bottom>
    <div class="footer-copyright text-center py-3" style="background-color: rgb(9, 204, 238);">© 2021 Copyright: IS424 Group 5 UW-Madison
    </div>
 </footer>
</body>

</html>
