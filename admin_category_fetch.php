
<?php
session_start();
include('dbconnect.php');

// Search query
$search = isset($_POST['search']) ? $_POST['search'] : '';
$query = "SELECT * FROM categories WHERE cat_title LIKE '%$search%'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
              <td>' . $row['cat_id'] . '</td>
              <td>' . $row['cat_title'] . '</td>
              <td><a href="admin_category_edit.php?id=' . $row['cat_id'] . '">Edit</a></td>
              <td><a href="admin_category_delete.php?id=' . $row['cat_id'] . '">Delete</a></td>
            </tr>';
    }
} else {
    echo '<tr><td colspan="4">No categories found.</td></tr>';
}

$conn->close();
?>


