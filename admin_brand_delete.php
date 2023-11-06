
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
                    <div class="panel-heading">Delete Brand</div>
                    <div class="panel-body">

<?php
session_start();
include('dbconnect.php');

if (isset($_GET['id'])) {
    $brand_id = $_GET['id'];

    // Delete the Brand
    $delete_query = "DELETE FROM brands WHERE brand_id = '$brand_id'";
    if ($conn->query($delete_query) == TRUE) {
        echo "Brand deleted successfully. <a href='admin_brand_management.php'>Go back</a>";
    } else {
        echo "Error deleting brand: " . $conn->error;
    }
} else {
    echo "Brand ID not provided.";
}
?>

                    </div>
                </div>
                <a href="admin_brand_management.php">Back to Brand Management</a>         
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>         
</body>
</html>
