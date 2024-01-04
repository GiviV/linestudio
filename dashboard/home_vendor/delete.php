<?php

require_once '../config/connect.php';

$work_id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `main` WHERE `main`.`id` = '$work_id'");

header("Location: ../intro_imgs.php");