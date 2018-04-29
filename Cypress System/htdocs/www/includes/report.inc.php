<!-- This file creates a new problem into the database -->

<?php

//Helps keep track of if a user is logged in
session_start();

include '../dbh.php';

//Current description error is set to null
$_SESSION['descError'] = null;

//Takes the inputs from the report form
$name = $_POST['services'];
$desc = $_POST['desc'];

//Checks if the entries are not empty
if ($desc != null && $name != null) {

	//Takes the current time
	$tm = time();
	$formatted = date('m/d/y H:i:s', $tm);

	//Make the default status pending
	$status = "Pending";

	//Creates the priority of the problem
	if ($name == "Waste collection") {
		$priority = 1;
	} elseif ($name == "Bins") {
		$priority = 2;
	} elseif ($name == "Graffiti & litter") {
		$priority = 3;
	} elseif ($name == "Roads") {
		$priority = 4;
	} elseif ($name == "Water") {
		$priority = 5;
	} elseif ($name == "Trees and animals") {
		$priority = 6;
	} elseif ($name == "Winter issues") {
		$priority = 7;
	} elseif ($name == "Property issues") {
		$priority = 8;
	} elseif ($name == "Complaints & comments") {
		$priority = 9;
	}

	//Stores the inputs and time into the database
	$sql = "INSERT INTO problem (status, name, description, date, priority) 
	VALUES ('$status', '$name', '$desc', '$formatted', '$priority')";
	$result = mysqli_query($connREPORT, $sql);
}
//Otherwise set error message
else
	$_SESSION['descError'] = "You need to either select a problem or enter a description or both.";

//After this php is run, return to index.php
header("Location: ../report.php");