
<?php
session_start();
include('dbconnect.php');

// Search query
$search = isset($_POST['search']) ? $_POST['search'] : '';
$query = "SELECT * FROM products WHERE product_title LIKE '%$search%'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['product_id'] . '</td>
                <td>' . $row['product_cat'] . '</td>
                <td>' . $row['product_brand'] . '</td>
                <td>' . $row['product_title'] . '</td>
                <td>' . $row['product_price'] . '</td>
                <td>' . $row['product_desc'] . '</td>
                <td>' . $row['product_image'] . '</td>
                <td>' . $row['product_keywords'] . '</td>
                <td>' . $row['product_amount'] . '</td>
                <td>' . $row['product_popularity'] . '</td>
                <td><a href="admin_product_edit.php?id=' . $row['product_id'] . '">Edit</a></td>
                <td><a href="admin_product_delete.php?id=' . $row['product_id'] . '">Delete</a></td>
               </tr>';
    }
} else {
    echo '<tr><td colspan="4">No product found.</td></tr>';
}

$conn->close();
?>


