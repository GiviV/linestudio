
<?php
require_once 'config/connect.php';

session_start();

// Check if the user is logged in, otherwise redirect to login page
    if (!isset($_SESSION['login']) || !isset($_SESSION['pass']) || 
        $_SESSION['login'] !== 'linestudio' || $_SESSION['pass'] !== 'linestudio123..') {
        header("Location: ../../admin/index.php"); // Replace 'login_page.php' with your actual login page
        exit;
    }

// Fetch data for the page
$works_query = "SELECT `id`, `image`, `orders` FROM `works` ORDER BY `orders` ASC";
$result = mysqli_query($connect, $works_query);
$works = mysqli_fetch_all($result, MYSQLI_ASSOC);  // Fetch as an associative array for clearer usage

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard-style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Dashboard</title>
    
    <style>
        img{
            width:100px;
        }
    </style>
</head>
<body>
    <main>
        <?php require_once 'nav.php'; ?>
        <div></div>
        <div class="dashboard-content">
            <div class="list-title">
                <h2>Work Images</h2>
                <a href="add-image.php"><button class="add">Add image</button></a>
            </div>
            <div class="table-container">
                <table>
                    
                    <thead>
                             <tr>
                        <th>#</th>
                        <th>image</th>
                        <th>image name</th>
                        <th>Services</th>
                    </tr>
                    </thead>
  <tbody id="sortable">
    <?php
    foreach ($works as $item) {
        
        echo '<tr data-id="' . $item['id'] . '">
                 <td><img src="imgs/burger.svg"></td>

                <td>  <img class="grid-item" src="../../imgs/works/' . $item['image'] . '" alt="Image"></td>
                 <td>   <span>' . $item['image'] . '</span></td>
                 
                 
                 <td>
                      <a href="vendor/delete.php?id='.$item['id'].'"><button class="delete">delete</button></a>
                     </td>
              </tr>';
    }
    ?>
</tbody>
    </table>

            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
$(document).ready(function() {
    $("#sortable").sortable({
        update: function(event, ui) {
            var newOrder = $("#sortable").sortable("toArray", { attribute: "data-id" });
            console.log("Sending new order:", newOrder);

            // Send the new order to the update_order.php file.
            $.post("update_order.php", { newOrder: newOrder }, function(response) {
                console.log("Server response:", response);
            });
        }
    });

    $("#sortable").disableSelection();
});

    </script>
</body>
</html>
