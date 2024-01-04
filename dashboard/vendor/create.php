<?php
require_once '../config/connect.php';

// Check if a file has been uploaded
if(isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $img = $_FILES['img']['name'];
    $order = 0; // Define the initial order value

    // Determine the next order value by querying the maximum order in the table
    $maxOrderQuery = "SELECT MAX(`orders`) FROM `works`";
    $result = mysqli_query($connect, $maxOrderQuery);
    if ($row = mysqli_fetch_row($result)) {
        $order = $row[0] + 1;
    }

    $tmpNameImg = $_FILES['img']['tmp_name'];

    // Specify the directory where you want to store the uploaded images
    $uploadDirectory = "../../imgs/works/";

    // Move the uploaded image to the specified directory
    if(move_uploaded_file($tmpNameImg, $uploadDirectory . $img)) {
        // Image uploaded successfully, now insert its information into the database
        $insertQuery = "INSERT INTO `works` (`image`, `orders`) VALUES ('$img', $order)";
        if (mysqli_query($connect, $insertQuery)) {
            // Image information inserted into the database
            header('Location: ../works-list.php');
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    } else {
        echo "Error uploading the image.";
    }
} else {
    echo "No file uploaded or an error occurred during upload.";
}
?>
