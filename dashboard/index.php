<?php

session_start();
if($_SESSION['login'] !== 'linestudio' || $_SESSION['pass'] !== "linestudio123.."){
    header("Location: ../index.php");
 

}
