<?php 

class loginContr extends loginModel {
    private $username;
    private $password;

    public function __construct($username, $password){
        echo "Received";
        $this->username = $username;
        $this->password = $password;
    }

    public function log_user_in(){
        echo "Moving forward";
        $this->getUser($this->username, $this->password);
    }
}

?>