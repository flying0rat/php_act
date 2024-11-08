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
	<?php $getAuthorID = getAuthorByID($pdo, $_GET['author_id']); ?>
	<div class="displayFlex">
		<h1>Edit author details</h1>
	</div>
	<br>
	<form class="center" action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
		<div class="container">
			<p>
				<label for="fname">First Name</label>
				<input type="text" name="fname" value="<?php echo $getAuthorID['first_name']; ?>">
				<label for="lname">Last Name</label>
				<input type="text" name="lname" value="<?php echo $getAuthorID['last_name']; ?>">
				<label for="gender">Gender:</label>
				<input type="radio" name="gender" id="genderMale" value="Male" <?php if ($getAuthorID['gender'] == 'Male') { echo "checked='checked'";} ?>>
                <label for="genderMale">Male</label>
                <input type="radio" name="gender" id="genderFemale" value="Female" <?php if ($getAuthorID['gender'] == 'Female') { echo "checked='checked'";} ?>>
                <label for="genderFemale">Female</label>
                <input type="radio" name="gender" id="genderOther" value="Other" <?php if ($getAuthorID['gender'] == 'Other') { echo "checked='checked'";} ?>>
                <label for="genderOther">Other</label>
			</p>
			<p>
				<label for="pname">Pen Name</label>
				<input type="text" name="pname" value="<?php echo $getAuthorID['pen_name']; ?>">
				<label for="birthday">Birthday</label>
				<input type="date" name="birthday" value="<?php echo $getAuthorID['dob']; ?>">
			</p>
			<p>
				<input type="submit" name="editAuthorBtn">
				<input type="reset">
			</p>
		</div>
	</form>
	<div class="displayFlex">
	<?php 
	if ($getAuthorID['last_edited_by'] != null) {
		echo "<p>Last edit by " . $getAuthorID['editor_fname'] . " " . $getAuthorID['editor_lname'] . " at " . $getAuthorID['last_edited'] . "</p>";
	} else
		echo "<p>The entry hasn't been updated</p>";
	?>
	</div>
</body>
</html>