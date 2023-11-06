<?php
if(isset($_POST['save'])) {
  // Check if file was uploaded without errors
  if(isset($_FILES["p_image"]) && $_FILES["p_image"]["error"] == 0) {
    $file_name = $_FILES["p_image"]["name"];
    $file_tmp = $_FILES["p_image"]["tmp_name"];
    $file_type = $_FILES["p_image"]["type"];
    $file_size = $_FILES["p_image"]["size"];
    // Set upload folder path
    $upload_path = "uploads/";
    // Check if the file already exists in the upload directory
    if(file_exists($upload_path . $file_name)) {
      echo "File already exists.";
    } else {
      // Move uploaded file to target folder
      if(move_uploaded_file($file_tmp, $upload_path . $file_name)) {
        echo "File uploaded successfully.";
      } else {
        echo "Error uploading file.";
      }
    }
  } else {
    echo "Error: " . $_FILES["p_image"]["error"];
  }
}
?>
