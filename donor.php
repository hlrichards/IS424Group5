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
    <title>Donor Data</title>

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
                <div class="navbar-item" style="background-color:white;">
                    <a href="donor.php"  style="color:rgb(9, 204, 238)">Donors</a>
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
    $sql1="SELECT donor_id, donor_name, income, donation_cause, c.company_name FROM donor d LEFT JOIN company c ON c.company_id = d.company_id";
	$select_result = mysqli_query($conn, $sql1);
	if(!$select_result) {
		die("cannot process select query");
	}
	$num1 = mysqli_num_rows($select_result);
	if($num1 > 0) {
	    echo "<div class='container' id='data'> 
	    <a href='edit-donor.php' class='btn btn-primary' id='data-btn'>Edit, Delete, or Add Data</a>
          <table class='table table-bordered'>
            <thead>
              <tr>
                <th colspan=5 id='table-title'>Donor Table</th>
              </tr>
              <tr>
                <th>Donor ID</th>
                <th>Donor Name</th>
                <th>Estimated Income</th>
                <th>Donation Cause</th>
                <th>Company</th>
              </tr>
            </thead>
            <tbody>";
    }
    for ($i=0;$i<$num1;$i++) {
    	$row = mysqli_fetch_assoc($select_result);
    	$donor_id = $row["donor_id"];
    	$donor_name = $row["donor_name"];
    	$income = $row["income"];
    	$cause = $row["donation_cause"];
    	$company= $row["company_name"];
        echo "<tr>
                <td>";
                echo $donor_id;
                echo "</td>
                <td>";
                echo $donor_name;
                echo "</td>
                <td>";
                echo $income;
                echo "</td>
                <td>";
                echo $cause;
                echo "</td>
                <td>";
                echo $company;
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
