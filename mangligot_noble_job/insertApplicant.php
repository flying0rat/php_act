<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Noble Job Application</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php if (isset($_SESSION['key']['message'])) { ?>
    <h1 class="success">
        <?php echo $_SESSION['key']['message']; ?>
    </h1>
<?php } unset($_SESSION['key']['message']); ?>
	<div class="container">
		<h1>Fill in the details for the new applicant:</h1>
	</div>
	<div class="container">
		<form action="core/handleForms.php" method="POST">
			<p>
				<label for="fname">First Name</label>
				<input type="text" name="fname">
				<label for="lname">Last Name</label>
				<input type="text" name="lname">
				<p>Choose your gender:
					<input type="radio" name="gender" id="genderMale" value="Male">
					<label for="genderMale">Male</label>
					<input type="radio" name="gender" id="genderFemale" value="Female">
					<label for="genderFemale">Female</label>
					<input type="radio" name="gender" id="genderOther" value="Other">
					<label for="genderOther">Other</label>
				</p>
			</p>
			<p>
				<label for="email">Email</label>
				<input type="text" name="email">
			</p>
			<p>
				<label for="fvmanga">Favorite Manga</label>
				<input type="text" name="fvmanga">
			</p>
			<p>
				<label for="fvartist">Favorite Artist</label>
				<input type="text" name="fvartist">
			</p>
			<p>
				<input type="submit" name="insertApplicantBtn">
			</p>
		</form>
		<p>
			<a href="index.php">Go back to homepage</a>
		</p>
	</div>
</body>
</html>