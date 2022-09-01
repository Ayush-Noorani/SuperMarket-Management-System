<?php 
include "../model/db.php";
include "../model/loginModel.php";
include "../controller/loginContr.php";

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = new loginContr($username,$password);
        $login->log_user_in();
    }
?>