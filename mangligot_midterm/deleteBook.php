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
	<?php $getAuthor = getAuthorByID($pdo, $_GET['author_id']); ?>
	<?php $bookDetails = getBookDetails($pdo, $_GET['book_id']); ?>
	<h1>Are you sure you want to delete this book from <?php echo $getAuthor['first_name'] . ' "' . $getAuthor['pen_name'] . '" ' . $getAuthor['last_name']; ?>?</h1>
	<div class="deleteContainer">
		<div class="deleteDetails">
			<h2>Book Title: <?php echo $bookDetails['book_title']; ?></h2>
		</div>
		<div class="deleteDetails">
			<h2>Genre: <?php echo $bookDetails['genre']; ?></h2>
		</div>
		<div class="deleteDetails">
			<h2>Publishing Status: <?php echo $bookDetails['publishing_status']; ?></h2>
		</div>
		<div class="deleteDetails">
			<h2>Date Published: <?php echo $bookDetails['date_published']; ?></h2>
		</div>
		<div class="deleteDetails">
			<h2>Copies Sold: <?php echo $bookDetails['copies_sold']; ?></h2>
			<div class="deleteBtn">
			<form action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>" method="POST">
				<input type="submit" name="deleteBookBtn" class="inputBtn" value="Delete">
			</form>
		</div>
		</div>
	</div>
</body>
</html>