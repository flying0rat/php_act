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
			  <a class="nav-link active" aria-current="page" href="index.php">Job Posts</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="jobApplications.php">Job Applications</a>
			</li>
		  </ul>
		</div>
	  </div>
	</nav>
	
	<div class="container">
		<div class="row">
			<div class="col mt-4 mb-3">
				<h3>Application for Job Post 1</h3>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form class="row" action="core/handleForms.php" method="POST">
					<div class="col-12 mb-3">
						<label for="appeal" class="form-label">Tell us why you're the best for the job.</label><br>
						<textarea class="form-control" id="appeal" rows="7"></textarea>
					</div>
					<div class="col-12 mb-3">
						<label for="resume" class="form-label">Send your resume</label>
						<input class="form-control" type="file" id="resume">
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-secondary" id="submitApplicationBtn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>	
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>