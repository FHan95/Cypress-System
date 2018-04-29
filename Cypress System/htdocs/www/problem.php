<!-- This is the problem managing web page -->

<?php
	include 'header.php';
	include 'dbh.php';

	$_SESSION['error'] = ((isset($_SESSION['error'])) ? $_SESSION['error'] : null);
	
	//If the user is logged in
/* 	if (isset($_SESSION['id'])) {

	}
	else {
		//This redirects the user to the index.php since if the user is not logged in they should not be able to manage the problems
		header("Location: index.php");
	} */
	
	//Selects data from the problem database and orders it according to priority
	$sql_problem = "SELECT * FROM problem ORDER BY priority, date DESC";
	$problem_data = mysqli_query($connREPORT, $sql_problem);
?>

<h1>MANAGE PROBLEMS</h1>

<hr><br></br>

<!-- Displays the problems in order in a table -->
<table>
	<tr>
		<th>Problem ID</th>
		<th>Status</th>
		<th>Problem Name</th>
		<th>Description</th>
		<th>Date Reported</th>
		<th>Priority</th>
	<tr>

<?php
	//For troubleshooting
	/*
	if (!$problem_data){
		echo "error: ".mysqli_error();
	}
	*/
	
	while ($problem=mysqli_fetch_assoc($problem_data)) {
		echo '<tr>';
		
		echo '<td>'.$problem['id'].'</td>';
		echo '<td>'.$problem['status'].'</td>';
		echo '<td>'.$problem['name'].'</td>';
		echo '<td>'.$problem['description'].'</td>';
		echo '<td>'.$problem['date'].'</td>';
		echo '<td>'.$problem['priority'].'</td>';
		
		echo '</tr>';
	}
?>

</table>

<br></br>
<hr>
<br>

<!-- The following edits problem details -->
<?php
	if (isset($_SESSION['problem_id'])) {

		$pid = $_SESSION['problem_id'];
		
		//Grabs the problem that corresponds to the problem ID entered
		$sql_PIDspecifier = "SELECT * FROM problem WHERE id='$pid'";
		$PIDspecifier = mysqli_query($connREPORT, $sql_PIDspecifier);
		
		//Sets up the drop down for changing priority on the problem selected
		while ($problem_specific=mysqli_fetch_assoc($PIDspecifier)) {
			echo 'Set status for the problem with Problem ID of '.$pid.': ';
			echo '<form action="includes/problemstatus.inc.php" id="problemstatus" method="POST">';
			echo '<select name="state">';
			echo '<option value="" disabled selected>'.$problem_specific['status'].'</option>';
			echo '<option value="Pending">Pending</option>';
			echo '<option value="Verified">Verified</option>';
			echo '<option value="Resolved">Resolved</option>';
			echo '<option value="False">False</option>';
			echo '</select>';
			echo '<br></br>';
			echo '<button type="submit">Save</button>';
			echo '</form>';
			echo '<br>';
			echo '<hr>';
			$ps = $problem_specific['status'];
		}
	}
	//Asks for Problem ID
	else {
		echo '<div><p>Please enter the Problem ID to the problem you wish to change.</p></div>';
		echo '<form action="includes/problemid.inc.php" method="POST">';
		echo '<input type="text" name="id" placeholder="Problem ID"><br>';
		echo '</form>';
		if ($_SESSION['error'] != null) {
			echo '<br>';
			echo $_SESSION['error'];
		}

		$ps = null;
	}
	
	//If the priority status is set to verified
	if ($ps == "Verified") {
		echo '<br>';
		echo "The new status is verified. You may change the type of problem, problem priority, and/or concatenate a description.";
		
		//Grabs the problem that corresponds to the problem ID entered
		$sql_PIDspecifier = "SELECT * FROM problem WHERE id='$pid'";
		$PIDspecifier = mysqli_query($connREPORT, $sql_PIDspecifier);

		//Displays the changeable content for the civil user
		while ($problem_specific=mysqli_fetch_assoc($PIDspecifier)) {
			
			//Displays drop down menu of problems
			echo '<br></br>';
			echo 'Problem Name';
			echo '<form action="includes/problemedit.inc.php" id="problem" method="POST">';
			echo '<select name="problem_name">';
			echo '<option value="" disabled selected>'.$problem_specific['name'].'</option>';
			echo '<option value="Waste collection">Waste collection</option>';
			echo '<option value="Bins">Bins</option>';
			echo '<option value="Graffiti & litter">Graffiti & litter</option>';
			echo '<option value="Roads">Roads</option>';
			echo '<option value="Water">Water</option>';
			echo '<option value="Trees and animals">Trees and animals</option>';
			echo '<option value="Winter issues">Winter issues</option>';
			echo '<option value="Property issues">Property issues</option>';
			echo '<option value="Complaints & comments">Complaints & comments</option>';
			echo '</select><br></br>';
			
			//Displays drop down menu of priority level. Note that 1 is the highest priority and 9 is the lowest
			echo 'Priority';
			echo '<br>';
			echo '<select name="priority">';
			echo '<option value="" disabled selected>'.$problem_specific['priority'].'</option>';
			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';			
			echo '<option value="4">4</option>';			
			echo '<option value="5">5</option>';			
			echo '<option value="6">6</option>';			
			echo '<option value="7">7</option>';			
			echo '<option value="8">8</option>';			
			echo '<option value="9">9</option>';
			echo '</select><br>';
			
			//Editable description
			echo '<br>';
			echo 'Description';
			echo '<br>';
			echo '<textarea rows="4" cols="50" name="desc" form="problem">'.$problem_specific['description'].'</textarea><br>';
			
			//Save button
			echo '<br>';
			echo '<button type="submit">Save</button>';
			echo '</form>';
			echo '<br>';
			echo '<hr>';
		}
	}
	
	//The finish button appears only if a Problem ID has been chosen
	if (isset($_SESSION['problem_id'])) {
		echo '<br>';
		echo 'Make sure to save changes before finishing!';
		echo '<br></br>';
		echo '<form action="includes/finish.inc.php" id="finish" method="POST">';
		echo '<button type="submit">Finish</button>';
		echo '<br>';
	}
?>

<br><hr>

<!-- The opening of the body tag is in header.php -->
</body>
<!-- The opening of the html tag is in header.php -->
</html>