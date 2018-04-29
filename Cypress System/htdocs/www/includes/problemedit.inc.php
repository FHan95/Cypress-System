<!-- This file allows a logged in user to edit the problem -->

<?php

//Helps keep track of if a user is logged in
session_start();

include '../dbh.php';

//Takes the inputs from the problem form when status is set to verified
$name = $_POST['problem_name'];
$priority = $_POST['priority'];
$desc = $_POST['desc'];
$pid = $_SESSION['problem_id'];

//For troubleshooting
echo 'This is the service selected '.$name.'<br>';
echo 'This is the priority selected '.$priority.'<br>';
echo 'This is the description to be concatenated '.$desc.'<br>';
echo 'This is the problem id '.$pid.'<br>';

//Selects from the database the row in which has the same problem id
$sql1 = "SELECT * FROM problem WHERE id='$pid'";
$result1 = mysqli_query($connREPORT, $sql1);

//If the id did not exist in the database
if (!$row1 = mysqli_fetch_assoc($result1)) {
	//For troubleshooting
	echo "ID does not exist!";
}
//Else update the name, priority, and description
else {
	//For troubleshooting
	echo "This is the row id: ".$row1['id'];

	if ($name != null) {
		$sql2 = "UPDATE problem SET name='$name' WHERE id='$pid'";
		mysqli_query($connREPORT, $sql2);
	}
	
	if ($priority != null) {
		$sql2 = "UPDATE problem SET priority='$priority' WHERE id='$pid'";
		mysqli_query($connREPORT, $sql2);
	}

	if ($desc != null) {
		$sql2 = "UPDATE problem SET description='$desc' WHERE id='$pid'";
		mysqli_query($connREPORT, $sql2);
	}
	
	$_SESSION['problem_id'] = $row1['id'];
}

//After this php is run, return to problem.php
header("Location: ../problem.php");