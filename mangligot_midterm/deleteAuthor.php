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
	<h1>Are you sure you want to delete this author?</h1>
	<?php $getAuthorID = getAuthorByID($pdo, $_GET['author_id']); ?>

	<div class="deleteContainer">
		<div class="deleteDetails">
			<h2>First Name: <?php echo $getAuthorID['first_name']; ?></h2>
		</div>
		<div class="deleteDetails">
			<h2>Last Name: <?php echo $getAuthorID['last_name']; ?></h2>
		</div>
		<div class="deleteDetails">
			<h2>Pen Name: <?php echo $getAuthorID['pen_name']; ?></h2>
		</div>
		<div class="deleteDetails">
			<h2>Gender: <?php echo $getAuthorID['gender']; ?></h2>
		</div>
		<div class="deleteDetails">
			<h2>Date of Birth: <?php echo $getAuthorID['dob']; ?></h2>
			<div class="deleteBtn">
				<form action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
					<input type="submit" name="deleteAuthorBtn" value="Delete">
				</form>
			</div>
		</div>
	</div>
</body>
</html>