<?php
session_start();
include("../php/config.php");
if(!isset($_SESSION['valid'])){
    header("Location: user-login.php");
}
else{
    include_once '../templates/users/user-index-template.php';
}
?>


