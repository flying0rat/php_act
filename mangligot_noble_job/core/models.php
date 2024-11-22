<?php

require_once 'dbConfig.php';

function getAllApplicants($pdo) {
    $sql = "select * from mangaka_applicants order by first_name asc";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getApplicantByID($pdo, $applicantID) {
    $sql = "select * from mangaka_applicants where applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$applicantID]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function searchForApplicant($pdo, $searchQuery) {
    $sql = "select * from mangaka_applicants 
    where concat(first_name,last_name,email,gender,fav_manga,fav_artist,date_added)
    like ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute(["%" . $searchQuery . "%"]);

    if ($executeQuery) {
		$_SESSION['key']['statusCode'] = 200;
		$_SESSION['key']['message'] = "Search successful";
        return $stmt->fetchAll();
    }
}

function insertApplicantRecord($pdo, $firstName, $lastName, $email, $gender, $favManga, $favArtist) {
	$sql = "insert into mangaka_applicants (first_name, last_name, email, gender, fav_manga, fav_artist)
	values(?,?,?,?,?,?)";
	
	$stmt = $pdo->prepare($sql);
	$executeQuery= $stmt->execute([$firstName, $lastName, $email, $gender, $favManga, $favArtist]);
	
	if ($executeQuery) {
		return true;
	}
}

function editApplicantRecord($pdo, $firstName, $lastName, $email, $gender, $favManga, $favArtist, $applicantID) {
	$sql = "update mangaka_applicants
	set first_name = ?,
		last_name = ?,
		email = ?,
		gender = ?,
		fav_manga = ?,
		fav_artist = ?
	where applicant_id = ?";
	
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$firstName, $lastName, $email, $gender, $favManga, $favArtist, $applicantID]);
	
	if ($executeQuery) {
		return true;
	}
}

function deleteApplicant($pdo, $applicantID) {
	$sql = "delete from mangaka_applicants where applicant_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$applicantID]);
	
	if ($executeQuery) {
		return true;
	}
}
?>