<!-- This file logs the current user out -->

<?php

//Helps keep track of if a user is logged in
session_start();

//Ends session, that is logs the user out
session_destroy();

//After this php is run, return to index.php
header("Location: ../index.php");