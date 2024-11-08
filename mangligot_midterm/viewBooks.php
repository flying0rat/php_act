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
	<?php $getBooks = getAuthoredBooks($pdo, $_GET['author_id']); ?>
	<?php $getAuthor = getAuthorByID($pdo, $_GET['author_id']); ?>
	<h1>Books written by <?php echo $getAuthor['first_name'] . ' "' . $getAuthor['pen_name'] . '" ' . $getAuthor['last_name']; ?></h1>
	<form action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
		<p>
			<label for="title">Book Title</label>
			<input type="text" name="title">
			<label for="genre">Genre</label>
			<input type="text" name="genre">
		</p>
		<p>
			<label for="pubdate">Date Published</label>
			<input type="date" name="pubdate">
		</p>
		<p>
			<label for="pubstatus">Publishing Status</label>
			<input type="text" name="pubstatus">
			<label for="sold">Copies Sold</label>
			<input type="number" name="sold">
		</p>
		<p>
			<input type="submit" name="insertBookBtn">
		</p>
	</form>
	
	<table>
		<tr>
			<th>Book ID</th>
			<th>Title</th>
			<th>Genre</th>
			<th>Publishing Status</th>
			<th>Date Published</th>
			<th>Added By</th>
			<th>Copies Sold</th>
			<th></th>
		</tr>
		<?php foreach ($getBooks as $row) { ?>
		<tr>
			<td><?php echo $row['book_id']; ?></td>
			<td><?php echo $row['book_title']; ?></td>
			<td><?php echo $row['genre']; ?></td>
			<td><?php echo $row['publishing_status']; ?></td>
			<td><?php echo $row['date_published']; ?></td>
			<td><?php echo $row['editor_fname'] . " " . $row['editor_lname']; ?></td>
			<td><?php echo $row['copies_sold']; ?></td>
			<td>
				<p><a href="editBook.php?book_id=<?php echo $row['book_id']; ?>&author_id=<?php echo $getAuthor['author_id'] ?>">Edit</a></p>
				<p><a href="deleteBook.php?book_id=<?php echo $row['book_id']; ?>&author_id=<?php echo $getAuthor['author_id'] ?>">Delete</a></p>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>