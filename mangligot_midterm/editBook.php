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
	<a href="viewBooks.php?author_id=<?php echo $_GET['author_id']; ?>">View <?php echo $getAuthor['first_name'] . ' "' . $getAuthor['pen_name'] . '" ' . $getAuthor['last_name']; ?>'s Books</a>
	<div class="displayFlex">
		<h1>Edit the book details</h1>
	</div>
	<form class="center" action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?>&author_id=<?php echo $getAuthor['author_id'] ?>" method="POST">
		<p>
			<label for="title">Book Title</label>
			<input type="text" name="title" value="<?php echo $bookDetails['book_title']; ?>">
		</p>
		<p>
			<label for="pubdate">Date Published</label>
			<input type="date" name="pubdate" value="<?php echo $bookDetails['date_published']; ?>">
		</p>
		<p>
			<label for="genre">Genre</label>
			<input type="text" name="genre" value="<?php echo $bookDetails['genre']; ?>">
		</p>
		<p>
			<label for="pubstatus">Publishing Status</label>
			<input type="text" name="pubstatus" value="<?php echo $bookDetails['publishing_status']; ?>">
			<label for="sold">Copies Sold</label>
			<input type="number" name="sold" value="<?php echo $bookDetails['copies_sold']; ?>">
		</p>
		<p>
			<input type="submit" name="editBookBtn">
		</p>
	</form>
	<div class="displayFlex">
	<?php 
	if ($bookDetails['last_edited_by'] != null) {
		echo "<p>Last edit by " . $bookDetails['editor_fname'] . " " . $bookDetails['editor_lname'] . " at " . $bookDetails['last_edited'] . "</p>";
	} else
		echo "<p>The entry hasn't been updated</p>";
	?>
	</div>
</body>
</html>