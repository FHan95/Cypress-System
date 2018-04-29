<!-- This file allows a logged in user to choose a specific problem based on the problem ID -->

<?php

//Helps keep track of if a user is logged in
session_start();

include '../dbh.php';

//Takes the inputs from the problem ID form
$id = $_POST['id'];

//Selects from the database the row in which has the same user id and password
$sql = "SELECT * FROM problem WHERE id='$id'";
$result = mysqli_query($connREPORT, $sql);

//Resets the session's problem ID and error message every time this file is called
$_SESSION['problem_id'] = null;
$_SESSION['error'] = null;

//If the id did not exist in the database
if (!$row = mysqli_fetch_assoc($result)) {
	$_SESSION['error'] = "The Problem ID does not exist in the database!";
}
//Else store the user id and username in the current session
else {
	$_SESSION['problem_id'] = $row['id'];
}

//After this php is run, return to problem.php
header("Location: ../problem.php");