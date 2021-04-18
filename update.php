<?php
include ("auth.inc.php");
include ("connect.inc.php");
session_start();
$id = $_SESSION['fac_ID'];
?>
<html>
<head>
<title>Update</title>
<link rel="stylesheet" type="text/css" href="myStyle.css" />
</head>
<body>
<table border=0 width=800 height=800 cellpadding=10>

<tr>
<td width=800 height=200 colspan="2" align="left" background="pic/cover photo.jpg"> <b> <font size="+3" face="Lucida Console">
</td>
</tr>

<tr>
<td width=400 height=200 background="pic/ivory.jpg" valign=top>
<img src = "pic/home.png" width="40"> <font size="+1"> &nbsp; <a HREF="college.php"> Main Page </a> </font> <hr>
<img src = "pic/doc.png" width="40"> <font size="+1"> &nbsp; <a HREF="faculty.php"> Faculty </a> </font> <hr>
<img src = "pic/bag.png" width="40"> <font size="+1"> &nbsp; <a HREF="center.php"> Center </a> </font> <hr>
<img src = "pic/mail.png" width="40"> <font size="+1"> &nbsp; <a HREF="login.php"> Login </a> </font> <hr>
<img src = "pic/card.png" width="40"> <font size="+1"> &nbsp; <a HREF="contacts.php"> Contacts </a> </font>
</td>
<td width=550 bgcolor="F0F5FC">
<?php

	
	if($_POST['submit_insert']) {
		if(isset($_POST['add_item'])) {
			//$id = $_POST['id'];
			$description = $_POST['new_desc'];
			$category = $_POST['add_item'];
			if($category == 'publ') {
				$category = 'PUBLICATIONS';
			}
			else if($category == 'research'){
				$category = 'RESEARCH IN PROGRESS';
			}
			else if($category == 'courses') {
				$category = 'COURSES TAUGHT';
			}
			else {
				$category = 'CONFERENCE PRESENTATIONS';
			}
			
			$sql_addItem="INSERT INTO items (fac_id, description, category, active1, displayorder) VALUES ('$id', '$description', '$category', 1, 1);";
			$result1 = mysqli_query($conn, $sql_addItem);
			if(!$result1) {
				die("cannot process insert query");
			}
		}
	}
	
	
	if($_POST["submit1"]) {
		$description = $_POST['description'];
		$item_code = $_POST['item_code'];
		//$id = $_POST['id'];
		if($_POST['change_active'] == 'yes') {
			$active = 1;
		}
		else {
			$active = 0;
		}
		$order = $_POST['display_order'];
		$sql_update="UPDATE items SET description='$description', active1='$active', displayorder='$order' WHERE item_code='$item_code'";
		$result = mysqli_query($conn, $sql_update);
		
		if(!$result) {
			die("cannot process update query");
		}

	}

	
?>

<?php
	if($id=="") {
		$id=$_GET['key'];
	}
	$sql1="SELECT * FROM items WHERE fac_id='$id' AND category='Publications' ORDER BY displayorder";
	$sql2="SELECT * FROM items WHERE fac_id='$id' AND category='Research in Progress' ORDER BY displayorder";
	$sql3="SELECT * FROM items WHERE fac_id='$id' AND category='Courses Taught' ORDER BY displayorder";
	$sql4="SELECT * FROM items WHERE fac_id='$id' AND category='Conference Presentations' ORDER BY displayorder";
	$select1_result = mysqli_query($conn, $sql1);
	$select2_result = mysqli_query($conn, $sql2);
	$select3_result = mysqli_query($conn, $sql3);
	$select4_result = mysqli_query($conn, $sql4);

		
	if(!$select1_result) {
		die("cannot process select query");
	}
	
	if(!$select2_result) {
		die("cannot process select query");
	}
	
	if(!$select3_result) {
		die("cannot process select query");
	}
	
	if(!$select4_result) {
		die("cannot process select query");
	}
	
	
	$num1 = mysqli_num_rows($select1_result);
	$num2 = mysqli_num_rows($select2_result);
	$num3 = mysqli_num_rows($select3_result);
	$num4 = mysqli_num_rows($select4_result);

?>



<?php
if($num1 > 0) {
	echo "<h2>Publications</h2>";
}
for ($i=0;$i<$num1;$i++) {
	$row = mysqli_fetch_assoc($select1_result)
?>
	<form action = "update.php" method="post">
	<input name="id" type="hidden" value="<?php echo $id; ?>"> 
	<input name="item_code" type="hidden" value="<?php echo $row["item_code"]; ?>"> 
	Description: <br /><input name="description" type="text" size="50" value="<?php echo $row["description"]; ?>"> <br />
	Display Order: <input name="display_order" type="text" size="10" value="<?php echo $row["displayorder"]; ?>">
	Active: <select name="change_active">
		<?php
			$active = $row["active1"];
			if($active == 1) {
				echo "<option value='yes' selected>Yes</option> <option value='no'>No</option>";
			}
			else {
				echo "<option value='yes'>Yes</option> <option value='no' selected>No</option>";
			}
		?>
	</select>
	<input type="submit" name="submit1" value="Update">
	</form>
<?php
}
?>


<?php
if($num2 > 0) {
	echo "<h2>Research In Progress</h2>";
}
for ($i=0;$i<$num2;$i++) {
	$row = mysqli_fetch_assoc($select2_result)
?>
	<form action = "update.php" method="post">
	<input name="id" type="hidden" value="<?php echo $id; ?>">
	<input name="item_code" type="hidden" value="<?php echo $row["item_code"]; ?>"> 	
	Description: <br /><input name="description" type="text" size="50" value="<?php echo $row["description"]; ?>"> <br />
	Display Order: <input name="display_order" type="text" size="10" value="<?php echo $row["displayorder"]; ?>">
	Active: <select name="change_active">
		<?php
			$active = $row["active1"];
			if($active == 1) {
				echo "<option value='yes' selected>Yes</option> <option value='no'>No</option>";
			}
			else {
				echo "<option value='yes'>Yes</option> <option value='no' selected>No</option>";
			}
		?>
	</select>
	<input type="submit" name="submit1" value="Update">
    </form>
<?php
}
?>


<?php
if($num3 > 0) {
	echo "<h2>Courses Taught</h2>";
}
for ($i=0;$i<$num3;$i++) {
	$row = mysqli_fetch_assoc($select3_result)
?>
	<form action = "update.php" method="post">
	<input name="id" type="hidden" value="<?php echo $id; ?>"> 
	<input name="item_code" type="hidden" value="<?php echo $row["item_code"]; ?>"> 
	Description: <br /><input name="description" type="text" size="50" value="<?php echo $row["description"]; ?>"> <br />
	Display Order: <input name="display_order" type="text" size="10" value="<?php echo $row["displayorder"]; ?>">
	Active: <select name="change_active">
		<?php
			$active = $row["active1"];
			if($active == 1) {
				echo "<option value='yes' selected>Yes</option> <option value='no'>No</option>";
			}
			else {
				echo "<option value='yes'>Yes</option> <option value='no' selected>No</option>";
			}
		?>
	</select>
	<input type="submit" name="submit1" value="Update">
	</form>
<?php
}
?>


<?php
if($num4 > 0) {
	echo "<h2>Conference Presentations</h2>";
}
for ($i=0;$i<$num4;$i++) {
	$row = mysqli_fetch_assoc($select4_result)
?>
	<form action = "update.php" method="post">
	<input name="id" type="hidden" value="<?php echo $id; ?>"> 
	<input name="item_code" type="hidden" value="<?php echo $row["item_code"]; ?>"> 
	Description: <br /><input name="description" type="text" size="50" value="<?php echo $row["description"]; ?>"> <br />
	Display Order: <input name="display_order" type="text" size="10" value="<?php echo $row["displayorder"]; ?>">
	Active: <select name="change_active">
		<?php
			$active = $row["active1"];
			if($active == 1) {
				echo "<option value='yes' selected>Yes</option> <option value='no'>No</option>";
			}
			else {
				echo "<option value='yes'>Yes</option> <option value='no' selected>No</option>";
			}
		?>
	</select>
	<input type="submit" name="submit1" value="Update">
	</form>
<?php
}
?>

	<h2> Insert New Item </h2>
	<form action = "update.php" method="post">
	<input name="id" type="hidden" value="<?php echo $id; ?>"> 
	Category: <br>
	<select name="add_item">
		<option value="publ" selected>Publications</option> 
		<option value="research">Research in Progress</option> 
		<option value="courses">Courses Taught</option> 
		<option value="conf">Conference Presentations</option> 
	</select><br>
	Description: <br>
	<input name="new_desc" type="text" size="50" value=""><br>
	<input type="submit" name="submit_insert" value="Insert">
	
	<br><br>

	<div class="link1">
	<?php
	echo "<br><br><a href=faculty.php>Back to Faculty Directory</a>"; 
	echo "<br><br><a href=logout.php>Logout</a>";
	?>
	</div>
	</form>
</td>
</tr>


<tr>
<td colspan="2" width=800 height=50 background="pic/ivory.jpg">
</td>
</tr>

</table>




<?php
	mysqli_close($conn);
?>

</body>
</html>
