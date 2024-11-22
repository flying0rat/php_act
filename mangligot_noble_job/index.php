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
    <div class="container">
        <form class="table" action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF'])); ?>" method="GET">
            <p class="tableRow">
                <input class="tableCell inputSize" type="text" name="searchInput" placeholder="Search here">
                <input class="tableCell" type="submit" name="searchBtn">
				<p><a href="insertApplicant.php">Insert applicant here</a></p>
            </p>
        </form>
    </div>
    <div class="container">
        <?php if (isset($_SESSION['key']['message'])) { ?>
            <h1 class="success">
                <?php echo $_SESSION['key']['message']; ?>
            </h1>
        <?php } unset($_SESSION['key']['message']); ?>
		<p class="center">Here are the list of applicants:</p>
		<table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Favorite Manga</th>
                <th>Favorite Manga Artist</th>
                <th>Date Added</th>
                <th></th>
            </tr>
<?php if (!isset($_GET['searchBtn'])) { ?>
    <?php $getAllApplicants = getAllApplicants($pdo); ?>
        <?php foreach ($getAllApplicants as $row) { ?>
            <tr>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['fav_manga'] ?></td>
                <td><?php echo $row['fav_artist'] ?></td>
                <td><?php echo $row['date_added'] ?></td>
                <td>
                    <a href="editApplicant.php?applicant_id=<?php echo $row['applicant_id']; ?>">Edit</a>
                    <a href="deleteApplicant.php?applicant_id=<?php echo $row['applicant_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
<?php } else { ?>
    <?php $searchForApplicant = searchForApplicant($pdo, $_GET['searchInput']); ?>
        <?php foreach ($searchForApplicant as $row) { ?>
            <tr>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['fav_manga'] ?></td>
                <td><?php echo $row['fav_artist'] ?></td>
                <td><?php echo $row['date_added'] ?></td>
                <td>
                    <a href="editApplicant.php?applicant_id=<?php echo $row['applicant_id']; ?>">Edit</a>
                    <a href="deleteApplicant.php?applicant_id=<?php echo $row['applicant_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
<?php } ?>
        </table>
    </div>
</body>
</html>