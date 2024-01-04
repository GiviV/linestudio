<?php

require_once '../config/connect.php';

$work_id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `works` WHERE `id` = '$work_id'");

header("Location: ../works-list.php");