
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
                    <div class="panel-heading">Edit Brand</div>
                    <div class="panel-body">

<?php 

session_start();
include('dbconnect.php');

if (isset($_GET['id'])) {
    $brand_id = $_GET['id'];

    // Retrieve brands details
    $query = "SELECT * FROM brands WHERE brand_id = '$brand_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $brand_title = $row['brand_title'];
    } else {
        echo "Brand not found.";
        exit();
    }
} else {
    echo "Brand ID not provided.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_brand_title = $_POST['brand_title'];

    // Update brand title
    $update_query = "UPDATE brands SET brand_title = '$new_brand_title' WHERE brand_id = '$brand_id'";
    
    if ($conn->query($update_query) === TRUE) {
        echo "Brand updated successfully. <a href='admin_brand_management.php'>Go back</a>";
        exit();
    } else {
        echo "Error updating brand: " . $conn->error;
    }
}

?>
                        
                        <form method="post">
                            <label for="brand_title">Brand Title:</label>
                            <input type="text" id="brand_title" name="brand_title" value="<?php echo $brand_title; ?>">
                            <button type="submit">Update</button>
                        </form>

                    </div>
                </div>
                <a href="admin_brand_management.php">Back to Brand Management</a>         
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
