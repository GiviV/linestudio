<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newOrder'])) {
    $newOrder = $_POST['newOrder'];
    $order = 1;
    
    foreach ($newOrder as $imageId) {
        $imageId = (int)$imageId;
        $query = "UPDATE `works` SET `orders` = $order WHERE `id` = $imageId";
        $result = mysqli_query($connect, $query);
        
        if (!$result) {
            die('Error updating database: ' . mysqli_error($connect));
        }

        $order++;
    }

    if (!$result) {
    echo 'Error updating ID ' . $imageId . ': ' . mysqli_error($connect);
        } else {
            echo 'Updated ID ' . $imageId . ' to order ' . $order . '. ';
        }

} else {
    echo "Connected to the database.";
}
?>
