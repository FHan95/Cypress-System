<!-- This file allows a logged in user to change the status of the problem -->

<?php

//Helps keep track of if a user is logged in
session_start();

include '../dbh.php';

//Takes the input from the 'problemstatus' form
$status = $_POST['state'];
$pid = $_SESSION['problem_id'];

//Updates the status of the problem by its ID
if ($status != null) {
	$sql = "UPDATE problem SET status='$status' WHERE id='$pid'";
	mysqli_query($connREPORT, $sql);
}

//If statement that deals with what happens depending on what the logged in user sets as the status
if ($status == "Verified") {
	$_SESSION['problem_status'] = $status;
} elseif ($status == "Resolved") {
	//Resolved currently does not need further options
} elseif ($status == "False") {
	//False currently does not need further options
} 

//After this php is run, return to problem.php
header("Location: ../problem.php");