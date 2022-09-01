<?php 

class createUserContr extends createUserModel{
    public function makeuser($u,$p,$r){
        return $this->createUser($u,$p,$r);
    }
}
?>