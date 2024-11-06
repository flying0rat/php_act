<?php
require_once "dbConfig.php";

function insertAuthorRecord($pdo, $firstName, $lastName, $penName, $gender, $birthday) {

    $sql = "insert into author (first_name, last_name, pen_name, gender, dob)
    values(?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$firstName, $lastName, $penName, $gender, $birthday]);

    if ($executeQuery) {
        return true;
    }
}

function updateAuthor($pdo, $firstName, $lastName, $penName, $gender, $birthday, $authorID) {
	$sql = "update author set first_name = ?, last_name = ?, pen_name = ?, gender = ?, dob = ? where author_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$firstName, $lastName, $penName, $gender, $birthday, $authorID]);

	if ($executeQuery) {
		return true;
	}
}

function getAllAuthor($pdo) {
	$sql = "select * from author";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getAuthorByID($pdo, $authorID) {
	$sql = "select * from author where author_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$authorID]);
	
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function deleteAuthor($pdo, $authorID) {
	$deleteAuthorBooks = "delete from book where author_id = ?";
	$deleteStmt = $pdo->prepare($deleteAuthorBooks);
	$executeDeleteQuery = $deleteStmt->execute([$authorID]);

	if ($executeDeleteQuery) {
		$sql = "delete from author where author_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$authorID]);
		
		if ($executeQuery) {
			return true;
		}
	}
}

function getAuthoredBooks($pdo, $authorID) {
	$sql = "SELECT
				b.book_id as book_id,
				b.book_title as book_title,
				b.copies_sold as copies_sold,
				b.date_published as date_published,
				b.editor_id as editor_id,
				b.genre as genre,
				b.publishing_status as publishing_status
			from book as b 
			join author as a on b.author_id = a.author_id
			where b.author_id = ?
			group by b.book_title;";
	
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$authorID]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getBookDetails($pdo, $bookID) {
	$sql = "SELECT
				b.book_title as book_title,
				b.copies_sold as copies_sold,
				b.date_published as date_published,
				b.editor_id as editor_id,
				b.genre as genre,
				b.publishing_status as publishing_status
			from book as b 
			join author as a on b.author_id = a.author_id
			where b.book_id = ?
			group by b.book_title;";
	
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$bookID]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function insertBook($pdo, $authorID, $bookTitle, $datePublished, $editorID, $genre, $status, $copySold) {
	$sql = "insert into book (book_title, author_id, date_published, editor_id, genre, publishing_status, copies_sold) values (?,?,?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$bookTitle, $authorID, $datePublished, $editorID, $genre, $status, $copySold]);
	if ($executeQuery) {
		return true;
	}
}

function updateBook($pdo, $bookTitle, $copySold, $datePublished, $editorID, $genre, $status, $bookID) {
	$sql = "update book
			set book_title = ?,
				copies_sold = ?,
				date_published = ?,
				editor_id = ?,
				genre = ?,
				publishing_status = ?
			where book_id = ?";
			
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$bookTitle, $copySold, $datePublished, $editorID, $genre, $status, $bookID]);
	
	if ($executeQuery) {
		return true;
	}
}

function deleteBook($pdo, $bookID) {
	$sql = "delete from book where book_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$bookID]);
	if ($executeQuery) {
		return true;
	}
}
?>