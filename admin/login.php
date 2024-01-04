<?php
session_start();

$login = $_POST['login'];
$pass = $_POST['pass'];

$_SESSION['login'] = $login;
$_SESSION['pass'] = $pass;
require_once '../dashboard/config/connect.php';
if($_SESSION['login'] === 'linestudio' && $_SESSION['pass'] === 'linestudio123..'){
    header("Location: ../dashboard/intro_imgs.php");
}else{
?> <h1>WRONG LOGIN OR PASSWORD , TRY AGAIN</h1>
<?php } ?>