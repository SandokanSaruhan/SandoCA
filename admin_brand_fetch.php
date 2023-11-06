
<?php
session_start();
include('dbconnect.php');

// Search query
$search = isset($_POST['search']) ? $_POST['search'] : '';
$query = "SELECT * FROM brands WHERE brand_title LIKE '%$search%'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
              <td>' . $row['brand_id'] . '</td>
              <td>' . $row['brand_title'] . '</td>
              <td>' . $row['cat_id'] . '</td>
              <td><a href="admin_brand_edit.php?id=' . $row['brand_id'] . '">Edit</a></td>
              <td><a href="admin_brand_delete.php?id=' . $row['brand_id'] . '">Delete</a></td>
            </tr>';
    }
} else {
    echo '<tr><td colspan="4">No brands found.</td></tr>';
}

$conn->close();
?>


