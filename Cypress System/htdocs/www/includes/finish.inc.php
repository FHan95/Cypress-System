<!-- This file resets the chosen Problem ID after finishing the problem edit -->

<?php

//Helps keep track of if a user is logged in
session_start();

include '../dbh.php';

//Sets the Problem ID to null
$_SESSION['problem_id'] = null;

//After this php is run, return to problem.php
header("Location: ../problem.php");