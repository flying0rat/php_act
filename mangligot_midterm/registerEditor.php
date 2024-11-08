<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darklight Publishing</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])) { ?>
	<h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
	<?php } unset($_SESSION['message']); ?>
	<h1>Register as an editor</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="fname">First Name</label>
			<input type="text" name="fname">
			<label for="lname">Last Name</label>
			<input type="text" name="lname">
			<label for="dobirth">Birthday</label>
			<input type="date" name="dobirth">
		</p>
		<p>
			<label for="uname">Username</label>
			<input type="text" name="uname">
			<label for="pass">Password</label>
			<input type="password" name="pass">
		</p>
		<p>
			<label></label>
			<label></label>
			<label></label>
			<label></label>
			<input type="submit" name="registerBtn">
		</p>
	</form>
</body>
</html>