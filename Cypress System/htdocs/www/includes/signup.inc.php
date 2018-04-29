<!-- This file creates a new user into the database -->

<?php

//Helps keep track of if a user is logged in
session_start();

include '../dbh.php';

//Current sign up error set to null
$_SESSION['signupError'] = null;

//Takes the inputs from the sign up form
$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

//Checks if all the entries are filled in
if ($first != null && $last != null && $uid != null && $pwd != null) {
	$duplicate_check = "SELECT uid FROM user WHERE uid = '$uid'";
	$duplicate = mysqli_query($connLOGIN, $duplicate_check);
	$count = mysqli_num_rows($duplicate);
	
	//Checks for duplicate usernames
	if ($count > 0) {
		$_SESSION['signupError'] = "Username already taken!";
	}
	else {
		$sql = "INSERT INTO user (first, last, uid, pwd) 
		VALUES ('$first', '$last', '$uid', '$pwd')";
		$result = mysqli_query($connLOGIN, $sql);
	}
}
else {
	$_SESSION['signupError'] = "One or more invalid entries.";
}

//After this php is run, return to index.php
header("Location: ../signup.php");