<?php 
session_start();
$_SESSION['user'] = null;
$_SESSION['role'] = null;
header("Location: ../login.php")
?>