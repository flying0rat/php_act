<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publishing Company</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
	<h1>Are you sure you want to delete this author?</h1>
	<?php $getAuthorID = getAuthorByID($pdo, $_GET['author_id']); ?>

	<div class="analystContainer" style="border-style: solid; height: 300px;">
		<h2>First Name: <?php echo $getAuthorID['first_name']; ?></h2>
		<h2>Last Name: <?php echo $getAuthorID['last_name']; ?></h2>
		<h2>Pen Name: <?php echo $getAuthorID['pen_name']; ?></h2>
		<h2>Gender: <?php echo $getAuthorID['gender']; ?></h2>
		<h2>Date of Birth: <?php echo $getAuthorID['dob']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
				<input type="submit" name="deleteAuthorBtn" class="inputBtn" value="Delete">
			</form>
		</div>
	</div>
</body>
</html>