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
  </head>
  <body>
	<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary border-body" data-bs-theme="dark">
	  <div class="container-fluid">
		<a class="navbar-brand" href="index.php">FindHire</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
		  <ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link" href="index.php">Job Posts</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="jobApplications.php">Job Applications</a>
			</li>
		  </ul>
		</div>
	  </div>
	</nav>
	
	<div class="container">
		<div class="row">
			<div class="col mt-4">
				<h3>Here are the list of your applications.</h3>
			</div>
		</div>
		<div class="row row-cols-1">
			<div class="col">
				<div class="card mt-4">
					<div class="card-header">
						Application for Job Post 1
					</div>
					<div class="card card-body">
						<p class="card-text">Appeal</p>
						<p class="card-text">Resume Link</p>
					</div>
					<div class="card card-body">
						<p class="card-text">Status: n/a</p>
						<button class="btn btn-secondary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#messageForm" aria-expanded="false" aria-controls="messageForm">
							Follow Up
						</button>
						<div class="collapse" id="messageForm">
							<form class="card card-body" action="core/handleForms.php" method="POST">
								<div class="mb-3">
									<label for="message" class="form-label">Send a message to the HR staff in-charge</label>
									<textarea class="form-control" id="message" rows="4"></textarea>
								</div>
								<div class="mb-3">
									<button type="submit" class="btn btn-secondary" id="submitMessageBtn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>