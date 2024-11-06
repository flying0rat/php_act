<?php 
require_once "dbConfig.php";
require_once "models.php";

if (isset($_POST['insertAuthor'])) {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $penName = $_POST['pname'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];

    $query = insertAuthorRecord($pdo, $firstName, $lastName, $penName, $gender, $birthday);

    if ($query) {
        header('Location: ../index.php');
    } else {
        echo "Author registration failed";
    }
}

if (isset($_POST['editAuthorBtn'])) {
	$query = updateAuthor($pdo, $_POST['fname'], $_POST['lname'], $_POST['pname'], $_POST['gender'], $_POST['birthday'], $_GET['author_id']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Edit failed";
	}
}

if (isset($_POST['deleteAuthorBtn'])) {
	$query = deleteAuthor($pdo, $_GET['author_id']);
	
	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertBookBtn'])) {
	$query = insertBook($pdo, $_GET['author_id'], $_POST['title'], $_POST['pubdate'], $_POST['editor'], $_POST['genre'], $_POST['pubstatus'], $_POST['sold']);
	
	if ($query) {
		header("Location: ../viewBooks.php?author_id=" . $_GET['author_id']);
	} else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editBookBtn'])) {
	$query = updateBook($pdo, $_POST['title'], $_POST['sold'], $_POST['pubdate'], $_POST['editor'], $_POST['genre'], $_POST['pubstatus'], $_GET['book_id']);
	
	if ($query) {
		header("Location: ../viewBooks.php?author_id=" . $_GET['author_id']);
	} else {
		echo "Update failed";
	}
}

if (isset($_POST['deleteBookBtn'])) {
	$query = deleteBook($pdo, $_GET['book_id']);
	
	if ($query) {
		header("Location: ../viewBooks.php?author_id=" . $_GET['author_id']);
	} else {
		echo "Deletion failed";
	}
}
?>