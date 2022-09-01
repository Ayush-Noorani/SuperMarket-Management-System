<?php 
class createUserModel extends db{
    protected function createUser($u_name,$u_pass,$u_role){
        $mysqli = $this->connect();
        $stmt = $mysqli->prepare("INSERT INTO users(username,password,role) VALUES (?,?,?);");
        $stmt->bind_param("sss",$u_name,$u_pass,$u_role);
        if($stmt->execute()){
            return "New user created";
        }
        else{
            return "Failed to create new user";
        }
    }
}
?>