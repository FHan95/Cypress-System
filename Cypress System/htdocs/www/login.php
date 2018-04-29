<!-- This is the login web page -->

<?php
	include 'header.php';

	$_SESSION['loginError'] = ((isset($_SESSION['loginError'])) ? $_SESSION['loginError'] : null);
?>

<h1>LOGIN</h1>

<hr><br>

<!-- The log in form -->
<form action="includes/login.inc.php" method="POST">
	<p>Please enter your username.</p>
	<input type="text" name="uid" placeholder="Username"><br></br>
	<p>Please enter your password.</p>
	<input type="password" name="pwd" placeholder="Password"><br></br>
	<button type="submit">Login</button>
</form>

<?php
	if ($_SESSION['loginError'] != null) {
		echo '<br>';
		echo $_SESSION['loginError'];
		echo '<br>';
	}
?>

<br><hr>

<!-- Use the following for permissions on this page if logged in -->
<?php
/* 	if (isset($_SESSION['id'])) {
		//This redirects the user to the index.php since if the user is logged in they should not be able to log in again
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