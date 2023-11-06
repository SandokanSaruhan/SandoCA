<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SandoCA</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">SandoCA</a>
			</div>

			
		</div>
	</div>
	<p><br><br></p>
	<p><br><br></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="err_msg"></div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Brand Form</div>
					<div class="panel-body">
				<form method="post" action="admin_brand_adder.php" id="upload-form">

					<br>
					<div class="row">
						<div class="col-md-12">

							<?php
								// Connect to the database
								include('dbconnect.php');

								// Retrieve the categories from the database
								$result = mysqli_query($conn, "SELECT cat_id, cat_title FROM categories");

								// Close the database connection
								mysqli_close($conn);
							?>


							<label for="category">Category:</label>
							<select id="category" name="category">
  								<option value="">Select a category</option>
  							<?php
  								// Loop through the categories and create an option element for each one
  								while ($row = mysqli_fetch_assoc($result)) {
    								echo '<option value="' . $row['cat_id'] . '">' . $row['cat_title'] . '</option>';
  								}
  							?>
							</select>

						</div>
					</div>

					<br>
					<div class="row">
						<div class="col-md-6">
							<label for="c_name">Brand Name</label>
							<input type="text" id="b_name" name="b_name" class="form-control">
						</div>
					</div>

	
					<br><br>
					<div class="col-md-12">
						<input type="button" class="btn btn-primary" value="Add" name="add" id="add_brand_btn">
					</div>

					</div>
					</div>
					</form>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>






	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</body>
</html>