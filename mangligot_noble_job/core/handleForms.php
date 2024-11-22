<?php 
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertApplicantBtn'])) {
	$insertApplicant = insertApplicantRecord($pdo, $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['gender']
	, $_POST['fvmanga'], $_POST['fvartist']);
	
	if ($insertApplicant) {
		$_SESSION['key']['statusCode'] = 200;
		$_SESSION['key']['message'] = "Applicant successfully added";
		header("Location: ../insertApplicant.php");
	} else {
		$_SESSION['key']['statusCode'] = 400;
		$_SESSION['key']['message'] = "An error has occured adding the applicant";
		header("Location: ../insertApplicant.php");
	}
}

if (isset($_POST['updateApplicantBtn'])) {
	$updateApplicant = editApplicantRecord($pdo, $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['gender']
	, $_POST['fvmanga'], $_POST['fvartist'], $_GET['applicant_id']);
	
	if ($updateApplicant) {
		$_SESSION['key']['statusCode'] = 200;
		$_SESSION['key']['message'] = "Applicant successfully updated";
		header("Location: ../index.php");
	} else {
		$_SESSION['key']['statusCode'] = 400;
		$_SESSION['key']['message'] = "An error has occured updating the applicant";
		header("Location: ../index.php");
	}
}

if (isset($_POST['deleteApplicantBtn'])) {
	$deleteApplicant = deleteApplicant($pdo, $_GET['applicant_id']);
	
	if ($deleteApplicant) {
		$_SESSION['key']['statusCode'] = 200;
		$_SESSION['key']['message'] = "Applicant successfully deleted";
		header("Location: ../index.php");
	} else {
		$_SESSION['key']['statusCode'] = 400;
		$_SESSION['key']['message'] = "An error has occured deleting the applicant";
		header("Location: ../index.php");
	}
}
?>