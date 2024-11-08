<?php 
require_once "core/dbConfig.php";
require_once "core/models.php"; 

if (!isset($_SESSION['userID'])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darklight Publishing</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<?php if (isset($_SESSION['userID'])) { ?>
    <h1>Welcome <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> to Darklight Publishing!</h1>
	<a href="core/handleForms.php?logoutUser=1">Logout</a>
<?php } else { echo "<h1>No user logged in</h1>"; }?>
	<form action="core/handleForms.php" method="POST">
		<div class="container">
			<p>
				<label for="fname">First Name</label>
				<input type="text" name="fname" >
				<label for="lname" >Last Name</label>
				<input type="text" name="lname">
				<label for="gender">Gender:</label>
				<input type="radio" name="gender" id="genderMale" value="Male">
				<label for="genderMale">Male</label>
				<input type="radio" name="gender" id="genderFemale" value="Female">
				<label for="genderFemale">Female</label>
				<input type="radio" name="gender" id="genderOther" value="Other">
				<label for="genderOther">Other</label>
			</p>
			<p>
				<label for="pname">Pen Name</label>
				<input type="text" name="pname">
				<label for="birthday">Birthday</label>
				<input type="date" name="birthday">
			</p>
			<p>
				<input type="submit" name="insertAuthor">
				<input type="reset">
			</p>
		</div>
	</form>
	<br>
    <table>
        <tr>
            <th>Author ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Pen Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
			<th>Added By</th>
			<th></th>
        </tr>

		<?php $getAuthors = getAllAuthor($pdo); ?>
		<?php foreach ($getAuthors as $row) { ?>
		<tr>
			<td><?php echo $row['author_id']; ?></td>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
			<td><?php echo $row['pen_name']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td><?php echo $row['dob']; ?></td>
			<td><?php echo $row['editor_fname'] . " " . $row['editor_lname']; ?></td>
			<td>
				<div>
					<p><a href="editAuthor.php?author_id=<?php echo $row['author_id'];?>">Edit</a></p>
					<p><a href="deleteAuthor.php?author_id=<?php echo $row['author_id'];?>">Delete</a></p>
					<p><a href="viewBooks.php?author_id=<?php echo $row['author_id'];?>">View Books</a></p>
				</div>
			</td>
		</tr>
		<?php } ?>
    </table>
</body>
</html>