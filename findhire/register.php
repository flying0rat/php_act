<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FindHire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
	</style>
  </head>
  <body>
	<div class="container">
		<div class="row">
			<div class="col mt-4 mb-3">
				<h2>Input information in the appropriate input fields</h2>
			</div>
		</div>
		<div class="row text-center">
			<div class="col">
				<div class="card">
					<form class="px-3 py-4" action="core/handleForms.php" method="POST">
						<div class="row mb-3">
							<label for="fname" class="col-sm-2 col-form-label">First Name</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="fname">
							</div>
							<label for="lname" class="col-sm-2 col-form-label">Last Name</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="lname">
							</div>
						</div>
						<div class="row mb-3">
							<label for="email" class="col-sm-2 col-form-label">E-mail Address</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="email">
							</div>
						</div>
						<div class="row mb-3">
							<label for="bday" class="col-sm-2 col-form-label">Birthday</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" name="bday">
							</div>
						</div>
						<div class="row mb-3">
							<label for="username" class="col-sm-2 col-form-label">Username</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="username">
							</div>
							<label for="userpass" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" name="userpass">
							</div>
						</div>
						<input type="submit" class="btn btn-secondary" name="registerBtn" value="Register">
					</form>
				</div>
			</div>
		</div>
	</div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>