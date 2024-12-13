<?php
require_once 'dbConfig.php';
require_once 'models.php';


if (isset($_POST['registerBtn'])) {
	$inserApplicant = insertApplicant($pdo, $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['bday'], sha1($_POST['userpass']), $_POST['username']);
	
	if ($inserApplicant['status'] == "200") {
		header("Location: ../login.php");
	} else {
		header("Location: ../register.php");
	}
}

if (isset($_POST['loginBtn'])) {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	
	if (!empty($username) && !empty($password)) {
		$loginQuery = loginApplicant($pdo, $username, $password);
		
		if ($loginQuery['status'] == "200") {
			header("Location: ../index.php");
		} else {
			header("Location: ../login.php");
		}
	} else {
		$response = array(
				"status"=> "400",
				"message"=> "Please make sure the input fields are not empty"
			);
		header("Location: ../login.php");
	}
}

?>
