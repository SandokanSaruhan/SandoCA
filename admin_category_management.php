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
                    <div class="panel-heading">Category Management</div>
                    <div class="panel-body">



                        <form>
                            <input type="text" id="search" placeholder="Search by Category Title">
                        </form>

                        <button><tr><th><a href="admin_category_add.php">Add Category</a></th></tr></button>

                        <table id="categoryTable" border="1">
                            <tr>
                                <th>Category ID</th>
                                <th>Category Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </table>

                        <script>
                            // Function to fetch and display categories based on search
                            function fetchCategories(search) {
                                $.ajax({
                                    url: "admin_category_fetch.php",
                                    type: "POST",
                                    data: { search: search },
                                    success: function(response) {
                                        $("#categoryTable").html(response);
                                    }
                                });
                            }

                            // Initial load of categories
                            fetchCategories("");

                            // Trigger search as user types
                            $("#search").keyup(function() {
                                var searchText = $(this).val();
                                fetchCategories(searchText);
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



