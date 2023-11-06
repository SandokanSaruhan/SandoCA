<!--
<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>

<?php 
/*
session_start();
include('dbconnect.php');

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Retrieve category details
    $query = "SELECT * FROM categories WHERE cat_id = '$category_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $category_title = $row['cat_title'];
    } else {
        echo "Category not found.";
        exit();
    }
} else {
    echo "Category ID not provided.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_category_title = $_POST['category_title'];

    // Update category title
    $update_query = "UPDATE categories SET cat_title = '$new_category_title' WHERE cat_id = '$category_id'";
    
    if ($conn->query($update_query) === TRUE) {
        echo "Category updated successfully. <a href='admin_category_management.php'>Go back</a>";
        exit();
    } else {
        echo "Error updating category: " . $conn->error;
    }
}
*/
?>

<h1>Edit Category</h1>

<form method="post">
    <label for="category_title">Category Title:</label>
    <input type="text" id="category_title" name="category_title" value="<?php echo $category_title; ?>">
    <button type="submit">Update</button>
</form>

<a href="admin_category_management.php">Back to Category Management</a>

</body>
</html>
-->

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
                    <div class="panel-heading">Edit Category</div>
                    <div class="panel-body">

<?php 

session_start();
include('dbconnect.php');

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Retrieve category details
    $query = "SELECT * FROM categories WHERE cat_id = '$category_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $category_title = $row['cat_title'];
    } else {
        echo "Category not found.";
        exit();
    }
} else {
    echo "Category ID not provided.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_category_title = $_POST['category_title'];

    // Update category title
    $update_query = "UPDATE categories SET cat_title = '$new_category_title' WHERE cat_id = '$category_id'";
    
    if ($conn->query($update_query) === TRUE) {
        echo "Category updated successfully. <a href='admin_category_management.php'>Go back</a>";
        exit();
    } else {
        echo "Error updating category: " . $conn->error;
    }
}

?>
                        
                        <form method="post">
                            <label for="category_title">Category Title:</label>
                            <input type="text" id="category_title" name="category_title" value="<?php echo $category_title; ?>">
                            <button type="submit">Update</button>
                        </form>

                    </div>
                </div>
                <a href="admin_category_management.php">Back to Category Management</a>         
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
