<?php 
	include('dbconnect.php');
	
	$c_title = $_POST['c_name'];
	$password = md5($_POST['password']);
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$name = "/^[A-Z][a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

	echo $c_title;
	echo "zaa";

	if (empty($c_title)) {
		echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Please fill all the fields!</div>";
		exit(0);
	} else {
		if (!preg_match($name, $c_title)) {
			echo "
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Name: $c_title is not valid..!</b>
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

			$sql = "INSERT INTO categories (cat_title) VALUES ('$c_title')";
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

	//if it is not working, change the name to category_adder.php and check main.js too
?>