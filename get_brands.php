<?php
// Connect to the database
include('dbconnect.php');

// Retrieve the selected category ID from the query string
$category = $_GET['category'];

// Retrieve the brands from the database for the selected category
$result = mysqli_query($conn, "SELECT brand_id, brand_title FROM brands WHERE cat_id = $category");


// Create an array with the brands
$brands = array();
while ($row = mysqli_fetch_assoc($result)) {
    $brands[] = $row;
}

// Close the database connection
mysqli_close($conn);

// Output the JSON response
echo json_encode($brands);
?>
