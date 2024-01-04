<?php

session_start();

// Check if the user is logged in, otherwise redirect to login page
    if (!isset($_SESSION['login']) || !isset($_SESSION['pass']) || 
        $_SESSION['login'] !== 'linestudio' || $_SESSION['pass'] !== 'linestudio123..') {
        header("Location: ../../admin/index.php"); // Replace 'login_page.php' with your actual login page
        exit;
    }
    include('index.php');
    
    ?>
    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard-style.css">
    <title>Dashboard</title>
</head>

<body>


    <main>
      <?php
        require_once 'nav.php';
     ?>
     
        <div></div>
  

        <div class="dashboard-content">

            <div class="add-title">
               <a href="works-list.php">  
                    <img src="imgs/arrow-left.svg" alt="Back">
                </a>

                <h2>Add image</h2>
            </div>

            <form action="vendor/create.php" class="add-doc-form" method="post" enctype="multipart/form-data">

                <div class="forms-container">
                    <div class="">
            
                        <input type="file" name="img" required>
                    </div>
      
                </div>

                <button class="save-btn" type="submit">Save</button>
            </form>

        </div>

    </main>

</body>

</html>