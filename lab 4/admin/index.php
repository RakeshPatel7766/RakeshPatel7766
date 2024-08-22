<!DOCTYPE html>
<?php
session_start();
require_once "include/auth.php";
?>
<html lang="en">
<!-- Author: Sai Kiran Lakkaraju -->

<head>
	<title>Index-Admin Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css\SiteStyle.css">
</head>
<body>
	<header>
		  Welcome to the Admin Home
	</header>
	<!-- Add Navigation -->
	<?php 
		include_once "include/nav.php"; 
	?>
	<?php
		// The user is already logged in as admin so no need to login again
		if(is_logged_in()): ?>
			<form action="../logout.php" method="POST">
				Currently logged in as <?php echo htmlentities(logged_in_user()); ?>
				<button>Log out</button>
			</form>
	<?php endif ?>
	
	<div>
		 <h2>This is the admin home</h2>
		 <div>
    <h2>Add/Update Student Marks</h2>
    <form action="addStudentMark.php" method="post">
    <input type="number" name="studentId" placeholder="Student ID" required>
    <input type="number" name="courseId" placeholder="Course ID" required>
    <input type="number" name="year" placeholder="Year" required>
    <input type="number" name="semester" placeholder="Semester" required>
    <input type="text" name="gradeCode" placeholder="Grade Code" required>
    <input type="submit" value="Add Marks">
</form>
</div>
	</div>
	<!-- Add footer -->
	<?php 
		include "include/footer.php"; 
	?>
</body>
</html>
