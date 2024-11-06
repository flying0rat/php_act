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
	<?php $getAuthor = getAuthorByID($pdo, $_GET['author_id']); ?>
	<?php $bookDetails = getBookDetails($pdo, $_GET['book_id']); ?>
	<h1>Are you sure you want to delete this book from <?php echo $getAuthor['first_name'] . ' "' . $getAuthor['pen_name'] . '" ' . $getAuthor['last_name']; ?></h1>
	<div class="bookContainer" style="border-style: solid; height: 350px;">
		<h2>Book Title: <?php echo $bookDetails['book_title']; ?></h2>
		<h2>Genre: <?php echo $bookDetails['genre']; ?></h2>
		<h2>Editor ID: <?php echo $bookDetails['editor_id']; ?></h2>
		<h2>Publishing Status: <?php echo $bookDetails['publishing_status']; ?></h2>
		<h2>Date Published: <?php echo $bookDetails['date_published']; ?></h2>
		<h2>Copies Sold: <?php echo $bookDetails['copies_sold']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>" method="POST">
				<input type="submit" name="deleteBookBtn" class="inputBtn" value="Delete">
			</form>
		</div>
	</div>
</body>
</html>