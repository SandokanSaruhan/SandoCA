<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SandoCA</title>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    <a href="test_admin.php">Back</a>
                    <div class="panel-heading">Product Management</div>
                    <div class="panel-body">



                        <form>
                            <input type="text" id="search" placeholder="Search by Product Title">
                        </form>

                        <button><tr><th><a href="admin_product_add.php">Add Product</a></th></tr></button>

                        <table id="productTable" border="1">
                            <tr>
                                <th>Product ID</th>
                                <th>Product Category ID</th>
                                <th>Product Brand ID</th>
                                <th>Product Title</th>
                                <th>Product Price</th>
                                <th>Product Description</th>
                                <th>Product Image Name</th>
                                <th>Product Keywords</th>
                                <th>Product Amount</th>
                                <th>Product Popularity</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </table>

                        <script>
                            // Function to fetch and display products based on search
                            function fetchProducts(search) {
                                $.ajax({
                                    url: "admin_product_fetch.php",
                                    type: "POST",
                                    data: { search: search },
                                    success: function(response) {
                                        $("#productTable").html(response);
                                    }
                                });
                            }

                            // Initial load of products
                            fetchProducts("");

                            // Trigger search as user types
                            $("#search").keyup(function() {
                                var searchText = $(this).val();
                                fetchProducts(searchText);
                            });
                        </script>

                    
                    </div>
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



