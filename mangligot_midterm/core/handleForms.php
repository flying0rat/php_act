<?php 
require_once "dbConfig.php";
require_once "models.php";


if (isset($_POST['registerBtn'])) {
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	$birthday = $_POST['dobirth'];
	$username = $_POST['uname'];
	$password = sha1($_POST['pass']);
	
	if (!empty($firstName) && !empty($lastName) && !empty($birthday) && !empty($username) && !empty($password)) {
		$insertQuery = insertNewEditor($pdo, $username, $password, $birthday, $firstName, $lastName);
		
		if ($insertQuery) {
			header("Location: ../login.php");
		} else {
			header("Location: ../registerEditor.php");
		}
	} else {
		$_SESSION['message'] = "Please make sure the input fields are not empty";
		
		header("Location: ../registerEditor.php");
	}
}

if (isset($_POST['insertAuthor'])) {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $penName = $_POST['pname'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
	$addedBy = $_SESSION['userID'];

    $query = insertAuthorRecord($pdo, $firstName, $lastName, $penName, $gender, $birthday, $addedBy);

    if ($query) {
        header('Location: ../index.php');
    } else {
        echo "Author registration failed";
    }
}

if (isset($_POST['editAuthorBtn'])) {
	$query = updateAuthor($pdo, $_POST['fname'], $_POST['lname'], $_POST['pname'], $_POST['gender'], $_POST['birthday'], $_SESSION['userID'], $_GET['author_id']);

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
	$query = insertBook($pdo, $_GET['author_id'], $_POST['title'], $_POST['pubdate'], $_SESSION['userID'], $_POST['genre'], $_POST['pubstatus'], $_POST['sold']);
	
	if ($query) {
		header("Location: ../viewBooks.php?author_id=" . $_GET['author_id']);
	} else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editBookBtn'])) {
	$query = updateBook($pdo, $_POST['title'], $_POST['sold'], $_POST['pubdate'], $_SESSION['userID'], $_POST['genre'], $_POST['pubstatus'], $_GET['book_id']);
	
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

if (isset($_POST['loginBtn'])) {
	$username = $_POST['username'];
	$password = sha1($_POST['pass']);
	
	if (!empty($username) && !empty($password)) {
		$loginQuery = loginUser($pdo, $username, $password);
		
		if ($loginQuery) {
			header("Location: ../index.php");
		} else {
			header("Location: ../login.php");
		}
	} else {
		$_SESSION['message'] = "Please make sure the input fields are not empty";
		header("Location: ../login.php");
	}
}

if (isset($_GET['logoutUser'])) {
	unset($_SESSION['userID'], $_SESSION['username'], $_SESSION['firstname'], $_SESSION['lastname'], $_SESSION['message']);
	header("Location: ../login.php");
}
?>