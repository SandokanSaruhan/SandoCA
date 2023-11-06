<?php 
	include('dbconnect.php');
	
	$b_title = $_POST['b_name'];
	$category=$_POST['category'];
	$password = md5($_POST['password']);
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$name = "/^[A-Z][a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

	echo "zaa";
	echo $b_title;
	echo $category;
	
	if (empty($category)) {
		echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Please fill all the fields!</div>";
		exit(0);
	} else if (empty($b_title)) {
		echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Please fill all the fields!</div>";
		exit(0);
	} else {
		if (!preg_match($name, $b_title)) {
			echo "
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Name: $b_title is not valid..!</b>
				</div>
			";
			exit();
		} else {
			echo "
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>The product has been added</b>
				</div>
			";

			$sql = "INSERT INTO brands (brand_title,cat_id) VALUES ('$b_title','$category')";
			$run_query = mysqli_query($conn, $sql);
			
			if ($run_query) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						Click <b><a href='index.php'>here</a></b> to go back to the main page.
					</div>
				";
			}
		}
	}
?>