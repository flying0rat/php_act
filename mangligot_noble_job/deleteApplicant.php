<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Noble Job Application</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php if (isset($_SESSION['key']['message'])) { ?>
    <h1 class="success">
        <?php echo $_SESSION['key']['message']; ?>
    </h1>
<?php } unset($_SESSION['key']['message']); ?>
<?php $getApplicantByID = getApplicantByID($pdo, $_GET['applicant_id']); ?>
	<div class="container border">
		<h2>First Name: <?php echo $getApplicantByID['first_name']; ?></h2>
		<h2>Last Name: <?php echo $getApplicantByID['last_name']; ?></h2>
		<h2>Email: <?php echo $getApplicantByID['email']; ?></h2>
		<h2>Gender: <?php echo $getApplicantByID['gender']; ?></h2>
		<h2>Favorite Manga: <?php echo $getApplicantByID['fav_manga']; ?></h2>
		<h2>Favorite Artist: <?php echo $getApplicantByID['fav_artist']; ?></h2>
		<form action="core/handleForms.php?applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
			<input type="submit" name="deleteApplicantBtn" value="Delete">
		</form>
	</div>
	
</body>
</html>