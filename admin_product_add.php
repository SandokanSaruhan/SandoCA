<?php
	session_start();
	if(!isset($_SESSION['uid'])){
	header('Location:index.php');
	}
 ?>

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
					<div class="panel-heading">Product Form</div>
					<div class="panel-body">
					<form method="post" action="admin_product_adder.php" id="upload-form"  enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<label for="p_title">Title</label>
							<input type="text" id="p_title" name="p_title" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="p_price">Price</label>
							<input type="text" id="p_price" name="p_price" class="form-control">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label for="p_amount">Amount</label>
							<input type="text" id="p_amount" name="p_amount" class="form-control">
						</div>
						<div class="col-md-6"></div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<label for="p_desc">Description</label>
							<input type="textarea" id="p_desc" name="p_desc" class="form-control">
						</div>
					</div>

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

							<label for="brand">Brand:</label>
							<select id="brand" name="brand">
  								<option value="">Select a brand</option>
							</select>

						
							<script>
							const categorySelect = document.getElementById("category");
							const brandSelect = document.getElementById("brand");

							categorySelect.addEventListener("change", (event) => {
  								const categoryId = event.target.value;
  
  								if (categoryId) {
    								// Call a function to fetch the brands for the selected category
    								fetchBrands(categoryId);
  								} else {
    								// Clear the brand select element if no category is selected
    								clearBrandSelect();
  								}
							});

							function clearBrandSelect() {
  								brandSelect.innerHTML = '<option value="">Select a brand</option>';
							}					
							</script>
			

							<script>
							function fetchBrands(categoryId) {
  								// Clear any existing options from the brand select element
  								brandSelect.innerHTML = '<option value="">Select a brand</option>';
  
  								// Send an AJAX request to fetch the brands for the selected category
  								const xhr = new XMLHttpRequest();
  								xhr.open("GET", `get_brands.php?category=${categoryId}`);
  
  								xhr.onreadystatechange = function() {
    								if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      								const brands = JSON.parse(xhr.responseText);
      
      									// Loop through the brands and create an option element for each one
      									for (const brand of brands) {
        									const optionElement = document.createElement("option");
        									optionElement.value = brand.brand_id;
        									optionElement.textContent = brand.brand_title;
        									brandSelect.appendChild(optionElement);
      									}
    								}
  								};
  
  								xhr.send();
							}
							</script>

						</div>
					</div>

					<br>
					<div class="row">
						<div class="col-md-12">
							<label for="p_tags">Tags</label>
							<input type="textarea" id="p_tags" name="p_tags" class="form-control">
						</div>
					</div>

					<br><br>
					<div class="col-md-12">
						<input type="button" class="btn btn-primary" value="Save" name="save" id="save_btn" onclick="uploadFile()">
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