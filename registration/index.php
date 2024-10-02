<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>registration</title>
</head>
<body>
	<?php session_start(); ?>

	<form action="handleForm.php" method="POST">
		<p>Username <input type="text" placeholder="First name here" name="firstName"></p>
		<p>Password <input type="password" placeholder="Password here" name="password"></p>
		<p><input type="submit" value="Login" name="loginBtn"></p>
        <p><a href="unset.php"><button type="button">Logout</button></a></p>
	</form>
	
	<?php
		if(isset($_SESSION['alreadyLogged'])) {
			if($_SESSION['alreadyLogged'] == 0) {
				echo(
					"<h2>
						User logged in: " . $_SESSION['firstName'] . "
					</h2>
					<h2>
						Password:<br>" . $_SESSION['password'] . "
					</h2>"
				);
			} elseif($_SESSION['alreadyLogged'] == 1) {
				echo(
					"<p>" . $_SESSION['firstName'] . " is already logged in.
					Wait for him to logout first"
				);
			}
		}
	?>
</body>
</html>