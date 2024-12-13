<?php
require_once 'dbConfig.php';


function insertApplicant($pdo, $firstName, $lastName, $email, $birthday, $pass, $username) {
	$checkUserSQL = "select * from applicant_accounts where username = ?";
	$checkUserSQLStmt = $pdo->prepare($checkUserSQL);
	$checkUserSQLStmt->execute([$username]);
	
	if ($checkUserSQLStmt->rowCount() == 0) {
		$sql = "insert into applicant_accounts (first_name, last_name, email, birthday, applicant_pass, username)
		values(?,?,?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$firstName, $lastName, $email, $birthday, $pass, $username]);
		
		if ($executeQuery) {
			$response = array(
				"status"=> "200",
				"message"=> "You have been successfully registered!"
			);
		} else {
			$response = array(
				"status"=> "400",
				"message"=> "Something went wrong with your registration"
			);
		}
	} else {
		$response = array(
				"status"=> "400",
				"message"=> "User already exists"
			);	
	}
	
	return $response;
}

function loginApplicant($pdo, $username, $password) {
	$sql = "select * from applicant_accounts where username = ?";
	$stmt = $pdo->prepare($sql);
	
	if ($stmt->execute([$username])) {
		$applicantInfoRow = $stmt->fetch();
		$applicantID = $applicantInfoRow['applicant_id'];
		$passwordApplicant = $applicantInfoRow['applicant_pass'];
		
		if ($password == $passwordApplicant) {
			$_SESSION['applicantID'] = $applicantID;
			$response = array(
				"status"=> "200",
				"message"=> "You have been successfully logged in"
			);
		} else {
			$response = array(
				"status"=> "400",
				"message"=> "Something went wrong when you logged in"
			);
		}
	} 
	if ($stmt->rowCount() == 0) {
		$response = array(
				"status"=> "400",
				"message"=> "Username/password invalid"
			);
	}
	
	return $response;
}
?>