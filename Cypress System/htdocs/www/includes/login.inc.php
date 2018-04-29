<!-- This file checks the login information with the database and logs the user in if the user exists -->

<?php

//Requires this to keep track of if a user is logged in
session_start();

include '../dbh.php';

//Current login error set to null
$_SESSION['loginError'] = null;

//Takes the inputs from the login form
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

//Selects from the database the row in which has the same user id and password
$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
$result = mysqli_query($connLOGIN, $sql);

//If the user did not exist in the database
if (!$row = mysqli_fetch_assoc($result)) {
	$_SESSION['loginError'] = "Invalid username and/or password.";

	header("Location: ../login.php");
}
//Else store the user id and username in the current session
else {
	$_SESSION['id'] = $row['id'];
	$_SESSION['uid'] = $row['uid'];

	header("Location: ../index.php");
}