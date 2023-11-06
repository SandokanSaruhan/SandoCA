<?php 
	
	include('dbconnect.php');
	
	$p_title=$_POST['p_title'];
	$p_price=$_POST['p_price'];
	$p_desc=$_POST['p_desc'];
	$p_amount=$_POST['p_amount'];
	$p_tags=$_POST['p_tags'];
	$category=$_POST['category'];
	$brand=$_POST['brand'];

	$password=md5($_POST['password']);
	$mobile=$_POST['mobile'];
	$address1=$_POST['address1'];
	$address2=$_POST['address2'];
	$name = "/^[A-Z][a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

	

	//Get Tags
	// Split the tags into an array
    $tagArray = explode(',', $p_tags);

    // Trim whitespace from each tag
    $tagArray = array_map('trim', $tagArray);

    // Display the tags
    foreach ($tagArray as $tag) {
    	//Test
     	//echo '<span>' . $tag . '</span>';
    }



	//Test 
	//$p_image='p_image_name';
	echo $category." category and brand ".$brand." and image ".$p_image." and tags ".$p_tags;



	if(empty($category) || empty($brand) || empty($p_title) || empty($p_price) || empty($p_desc) ||  empty($p_amount)){
		echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Please fill all the fields!</div>";

		
		exit(0);
	}

	else{
		if(!preg_match($name,$p_title)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Name: $p_title is not valid..!</b>
			</div>
		";
		exit();
		}

		if(!preg_match($number,$p_price)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Price number $p_price is not valid</b>
			</div>
		";
		exit();
		}

		if(!preg_match($name,$p_desc)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b> description $p_desc is not valid..!</b>
			</div>
		";
		exit();
		}

		if(!preg_match($number,$p_amount)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Amount number $p_amount is not valid</b>
			</div>
		";
		exit();
		}

		else {
					
					echo "
						<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>The porduct has been added</b>
						</div>
					";

					//$sql="INSERT INTO products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords, product_amount) VALUES ('$category','$brand','$p_title','$pr_price','$p_desc','$p_image','$p_tags','$p_amount')";



					//Test 

					$sql="INSERT INTO products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords, product_amount, product_popularity) VALUES ('$category','$brand','$p_title','$p_price','$p_desc','test','$p_tags','$p_amount','0')";


					$run_query=mysqli_query($conn,$sql);
					if($run_query){
						echo "
								<div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									Click <b><a href='index.php'>here</a></b> to main page.
								</div>
						";
				}
		}
	}
		
 ?>