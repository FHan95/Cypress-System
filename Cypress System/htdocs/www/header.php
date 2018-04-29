<!-- For simplicity, this file acts as the header to the web pages -->

<?php
	//Helps keep track of if a user is logged in
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CYPRESS SYSTEM</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
	//Use this header if user is logged in
	if(isset($_SESSION['id'])) {
		echo '<header>';
		echo '<nav>';
		echo '<ul>';
		echo '<li><a href="index.php">HOME</a></li>';
		echo '<li><a href="problem.php">MANAGE PROBLEMS</a></li>';
		echo '<li><a href="report.php">REPORT PROBLEM</a></li>';
		echo '<li><a href="includes/logout.inc.php">LOG OUT</a></li>';
		echo "<li>".$_SESSION['uid']."</li>";
		echo '</ul>';
		echo '</nav>';
		echo '</header>';
	}
	//Else use this header when user is not logged in
	else {
		echo '<header>';
		echo '<nav>';
		echo '<ul>';
		echo '<li><a href="index.php">HOME</a></li>';
		echo '<li><a href="report.php">REPORT PROBLEM</a></li>';
		echo '<li><a href="signup.php">SIGN UP</a></li>';
		echo '<li><a href="login.php">LOGIN</a></li>';
		echo '<li>GUEST</li>';
		echo '</ul>';
		echo '</nav>';
		echo '</header>';
	}
?>