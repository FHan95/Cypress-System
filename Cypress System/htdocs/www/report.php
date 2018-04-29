<!-- This is the problem reporting web page -->

<?php
	include 'header.php';
	
	$_SESSION['descError'] = ((isset($_SESSION['descError'])) ? $_SESSION['descError'] : null);
?>

<h1>REPORT PROBLEM</h1>

<hr><br>

<!-- The problem report form -->
<!-- These are the services that you can contact in terms of issues in Toronto's streets -->
<form action="includes/report.inc.php" id="problem" method="POST">
	<p>Please select a problem from the list.</p>
	<select name="services">
		<option value="" disabled selected>Problem Name</option>
		<option value="Waste collection">Waste collection</option>
		<option value="Bins">Bins</option>
		<option value="Graffiti & litter">Graffiti & litter</option>
		<option value="Roads">Roads</option>
		<option value="Water">Water</option>
		<option value="Trees and animals">Trees and animals</option>
		<option value="Winter issues">Winter issues</option>
		<option value="Property issues">Property issues</option>
		<option value="Complaints & comments">Complaints & comments</option>
	</select><br></br>
	<br>
	<p>Please enter a description.</p>
	<textarea rows="4" cols="50" name="desc" form="problem" placeholder="Enter text here..."></textarea><br></br>
	<button type="submit">Submit</button>
	
	<?php
		if ($_SESSION['descError'] != null) {
			echo '<br></br>';
			echo $_SESSION['descError'];
			echo '<br>';
		}
	?>
</form>

<br><hr><br>

<!-- The opening of the body tag is in header.php -->
</body>
<!-- The opening of the html tag is in header.php -->
</html>