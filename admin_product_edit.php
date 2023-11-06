
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
                    <div class="panel-heading">Edit Product</div>
                    <div class="panel-body">

<?php 

session_start();
include('dbconnect.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Retrieve brands details
    $query = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_title = $row['product_title'];
        $product_price= $row['product_price'];
        $product_desc = $row['product_desc'];
        $product_amount = $row['product_amount'];
        $product_keywords = $row['product_keywords'];
    } else {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Product ID not provided.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_product_title = $_POST['product_title'];
    $new_product_price = $_POST['product_price'];
    $new_product_desc = $_POST['product_desc'];
    $new_product_amount = $_POST['product_amount'];
    $new_product_keywords = $_POST['product_keywords'];

    // Update brand title
    // $update_query = "UPDATE products SET product_title = '$new_product_title'  WHERE product_id = '$product_id'";
    // $update_query = "UPDATE products SET product_amount = '$new_product_amount' WHERE product_id = '$product_id'";
    $update_query = "UPDATE products SET product_title = '$new_product_title', product_price = '$new_product_price', product_desc = '$new_product_desc', product_amount = '$new_product_amount', product_keywords = '$new_product_keywords' WHERE product_id = '$product_id'";

    
    if ($conn->query($update_query) === TRUE) {
        echo "Product updated successfully. <a href='admin_product_management.php'>Go back</a>";
        exit();
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

?>   
                        <form method="post">
                            <label for="product_title">Product Title:</label>
                            <input type="text" id="product_title" name="product_title" value="<?php echo $product_title; ?>"><br>
                            <label for="product_price">Product Price:</label>
                            <input type="text" id="product_price" name="product_price" value="<?php echo $product_price; ?>"><br>
                            <label for="product_amount">Product Amount:</label>
                            <input type="text" id="product_amount" name="product_amount" value="<?php echo $product_amount; ?>"><br>
                            <label for="product_desc">Product Desc:</label>
                            <input type="text" id="product_desc" name="product_desc" value="<?php echo $product_desc; ?>"><br>
                            <label for="product_keywords">Product Keywords:</label>
                            <input type="text" id="product_keywords" name="product_keywords" value="<?php echo $product_keywords; ?>"><br>
                            <button type="submit">Update</button>
                        </form>

                    </div>
                </div>
                <a href="admin_product_management.php">Back to Product Management</a>         
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>
</html>