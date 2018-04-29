<!-- The database handler. Connects to the database -->

<?php

//Connects to the user login database
$connLOGIN = mysqli_connect("localhost", "root", "", "login");

//Connects to the problems database
$connREPORT = mysqli_connect("localhost", "root", "", "report");

?>