<?php

session_start();

if(isset($_POST['loginBtn'])) {
	if(isset($_SESSION['alreadyLogged'])) {
		$_SESSION['alreadyLogged'] = 1;
		header('Location: index.php');
	} else {
		$firstName = $_POST['firstName'];
		$password = md5($_POST['password']);
		
		$_SESSION['alreadyLogged'] = 0;
		$_SESSION['firstName'] = $firstName;
		$_SESSION['password'] = $password;

		header('Location: index.php');
	}
}
?>
