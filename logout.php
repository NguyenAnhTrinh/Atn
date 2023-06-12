<?php 
session_start();
ob_start();
unset($_SESSION['UserName']);
header('location:index.php');
?>