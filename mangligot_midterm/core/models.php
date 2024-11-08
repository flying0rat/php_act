<?php
require_once "dbConfig.php";

function insertAuthorRecord($pdo, $firstName, $lastName, $penName, $gender, $birthday, $addedBy) {

    $sql = "insert into author (first_name, last_name, pen_name, gender, dob, added_by)
    values(?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$firstName, $lastName, $penName, $gender, $birthday, $addedBy]);

    if ($executeQuery) {
        return true;
    }
}

function updateAuthor($pdo, $firstName, $lastName, $penName, $gender, $birthday, $lastEditBy, $authorID) {
	$sql = "update author set first_name = ?, last_name = ?, pen_name = ?, gender = ?, dob = ?, last_edited_by = ? where author_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$firstName, $lastName, $penName, $gender, $birthday, $lastEditBy, $authorID]);

	if ($executeQuery) {
		return true;
	}
}

function getAllAuthor($pdo) {
	$sql = "select
				a.author_id as author_id,
				a.first_name as first_name,
				a.last_name as last_name,
				a.pen_name as pen_name,
				a.gender as gender,
				a.dob as dob,
				e.first_name as editor_fname,
				e.last_name as editor_lname
			from author as a
			left join editor as e on a.added_by = e.editor_id
			group by author_id";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getAuthorByID($pdo, $authorID) {
	$sql = "select
				a.author_id as author_id,
				a.first_name as first_name,
				a.last_name as last_name,
				a.pen_name as pen_name,
				a.gender as gender,
				a.dob as dob,
				a.last_edited_by as last_edited_by,
				a.last_edited as last_edited,
				e.first_name as editor_fname,
				e.last_name as editor_lname
			from author as a
			left join editor as e on a.last_edited_by = e.editor_id
			where author_id = ?";
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
				b.genre as genre,
				b.publishing_status as publishing_status,
				e.first_name as editor_fname,
				e.last_name as editor_lname
			from book as b 
			join author as a on b.author_id = a.author_id
			left join editor as e on b.added_by = e.editor_id
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
				b.genre as genre,
				b.publishing_status as publishing_status,
				b.last_edited_by as last_edited_by,
				b.last_edited as last_edited,
				e.first_name as editor_fname,
				e.last_name as editor_lname
			from book as b 
			join author as a on b.author_id = a.author_id
			left join editor as e on b.added_by = e.editor_id
			where b.book_id = ?
			group by b.book_title;";
	
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$bookID]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function insertBook($pdo, $authorID, $bookTitle, $datePublished, $editorID, $genre, $status, $copySold) {
	$sql = "insert into book (book_title, author_id, date_published, added_by, genre, publishing_status, copies_sold) values (?,?,?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$bookTitle, $authorID, $datePublished, $editorID, $genre, $status, $copySold]);
	if ($executeQuery) {
		return true;
	}
}

function updateBook($pdo, $bookTitle, $copySold, $datePublished, $lastEditBy, $genre, $status, $bookID) {
	$sql = "update book
			set book_title = ?,
				copies_sold = ?,
				date_published = ?,
				last_edited_by = ?,
				genre = ?,
				publishing_status = ?
			where book_id = ?";
			
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$bookTitle, $copySold, $datePublished, $lastEditBy, $genre, $status, $bookID]);
	
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

function insertNewEditor($pdo, $username, $password, $birthday, $firstName, $lastName) {
	$checkUserSql = "select * from editor where username = ?";
	$checkUserSqlStmt = $pdo->prepare($checkUserSql);
	$checkUserSqlStmt->execute([$username]);
	
	if ($checkUserSqlStmt->rowCount() == 0) {
		$sql = "insert into editor (username, user_pass, birthday, first_name, last_name)
		values(?,?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$username, $password, $birthday, $firstName, $lastName]);
		
		if ($executeQuery) {
			$_SESSION['message'] = "User successfully inserted";
			return true;
		} else {
			$_SESSION['message'] = "An error occured from the query";
		}
	} else {
		$_SESSION['message'] = "User already exists";
	}
}

function loginUser($pdo, $username, $password) {
	$sql = "select * from editor where username = ?";
	$stmt = $pdo->prepare($sql);
	
	if ($stmt->execute([$username])) {
		$userInfoRow = $stmt->fetch();
		$DBuserID = $userInfoRow['editor_id'];
		$usernameDB = $userInfoRow['username'];
		$firstnameDB = $userInfoRow['first_name'];
		$lastnameDB = $userInfoRow['last_name'];
		$passwordDB = $userInfoRow['user_pass'];
		
		if($password == $passwordDB) {
			$_SESSION['firstname'] = $firstnameDB;
			$_SESSION['lastname'] = $lastnameDB;
			$_SESSION['username'] = $usernameDB;
			$_SESSION['userID'] = $DBuserID;
			$_SESSION['message'] = "Login Successful";
			return true;
		} else {
			$_SESSION['message'] = "Username/password invalid";
		}
	}
	if ($stmt->rowCount() == 0) {
		$_SESSION['message'] = "Username/password invalid";
	}
}
?>