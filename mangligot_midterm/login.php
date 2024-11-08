<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darklight Publishing</title>
    <link rel="stylesheet" href="styles/styles.css">
	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
	</style>
</head>
<body>
	<div class="main">
		<br><br><br><br><br><br>
		<div class="row header">
			<div class="displayFlex">
				<h1>Welcome to Darklight Publishing</h1>
			</div>
			<div class="displayFlex">
				<?php if (isset($_SESSION['message'])) { ?>
					<h2 style="color: red;"><?php echo $_SESSION['message']; ?><h2>
				<?php } else {
					echo ("<h2>Please login as an editor for access</h2>");
				} unset($_SESSION['message']); ?>
			</div>
		</div>
		<div class="row content">
			<br>
			<div class="login center">
				<form class="center" action="core/handleForms.php" method="POST">
					<p>
						<label for="username">Username</label>
						<input type="text" name="username">
					</p>
					<p>
						<label for="pass">Password</label>
						<input type="password" name="pass">
					</p>
					<p>
						<input type="submit" name="loginBtn" value="Login">
					</p>
				</form>
			</div>
			<div class="displayFlex">
				<p>Don't have an account? Register <a href="registerEditor.php">here</a></p>
			</div>
		</div>
		<div class="row footer"></div>
	</div>
</body>
</html>