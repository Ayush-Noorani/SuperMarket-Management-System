<?php 

class loginModel extends db
{
    public function getUser($username, $password){
        $mysqli = $this->connect();
        $stmt = $mysqli->prepare('SELECT password FROM users WHERE username = ?;');
        $stmt->bind_param("s",$username);
        $stmt->execute();

        $stmt->bind_result($pass);
        $stmt->fetch();

        if($password == $pass){
            $checkpwd = 1;
        }
        else{
            $checkpwd = 0;
        }

        if($checkpwd == 0){
            header("Location: ../login.php");
        }

        else if($checkpwd == 1){
            $mysqli = $this->connect();
            $stmt = $mysqli->prepare('SELECT username,role FROM users WHERE username = ?;');
            $stmt->bind_param("s",$username);
            $stmt->execute();
    
            $stmt->bind_result($db_username,$role);
            $stmt->fetch();

             session_start();
             $_SESSION['user'] = $db_username;
             $_SESSION['role'] = $role;

             if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'Admin'){
                 header("Location: ../admin_landing.php");
             }
             else if($_SESSION['role'] == 'supervisor' || $_SESSION['role'] == 'Supervisor'){
                 header("Location: ../supervisor_landing.php");
             }
             else if($_SESSION['role'] == 'cashier' || $_SESSION['role'] == 'Cashier'){
                 header("Location: ../cashier_landing.php");
             }
        }
    }
}


?>