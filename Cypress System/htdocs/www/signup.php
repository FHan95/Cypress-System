<!-- This is the sign up web page -->

<?php
	include 'header.php';

	$_SESSION['signupError'] = ((isset($_SESSION['signupError'])) ? $_SESSION['signupError'] : null);
?>

<h1>SIGN UP</h1>

<hr><br>

<!-- The sign up form -->
<form action="includes/signup.inc.php" method="POST">
	<p>Please enter your first name.</p>
	<input type="text" name="first" placeholder="First name"><br></br>
	<p>Please enter your last name.</p>
	<input type="text" name="last" placeholder="Last name"><br></br>
	<p>Please enter your username.</p>
	<input type="text" name="uid" placeholder="Username"><br></br>
	<p>Please enter your password.</p>
	<input type="password" name="pwd" placeholder="Password"><br></br>
	<button type="submit">SIGN UP</button>
</form>

<?php
	if ($_SESSION['signupError'] != null) {
		echo '<br>';
		echo $_SESSION['signupError'];
		echo '<br>';
	}
?>

<br><hr>

<!-- Use the following for permissions on this page if logged in -->
<?php
/* 	if (isset($_SESSION['id'])) {
		//This redirects the user to the index.php since if the user is logged in they should not be able to sign up
		header("Location: index.php");
		//For troubleshooting
		echo "Hello ".$_SESSION['uid'].".";
	}
	else {
		//For troubleshooting
		//echo "You are not logged in!";
	} */
?>

<!-- The opening of the body tag is in header.php -->
</body>
<!-- The opening of the html tag is in header.php -->
</html>