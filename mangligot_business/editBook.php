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
	<a href="viewBooks.php?author_id=<?php echo $_GET['author_id']; ?>">View <?php echo $getAuthor['first_name'] . ' "' . $getAuthor['pen_name'] . '" ' . $getAuthor['last_name']; ?>'s Books</a>
	<h1>Edit the book details</h1>
	<form action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?>&author_id=<?php echo $getAuthor['author_id'] ?>" method="POST">
		<p>
			<label for="title">Book Title</label>
			<input type="text" name="title" value="<?php echo $bookDetails['book_title']; ?>">
		</p>
		<p>
			<label for="pubdate">Date Published</label>
			<input type="date" name="pubdate" value="<?php echo $bookDetails['date_published']; ?>">
		</p>
		<p>
			<label for="editor">Editor ID</label>
			<input type="text" name="editor" value="<?php echo $bookDetails['editor_id']; ?>">
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
</body>
</html>