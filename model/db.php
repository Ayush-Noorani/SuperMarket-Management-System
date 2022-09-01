<?php
class db {
   protected function connect(){
       $username = "root";
       $password = "";
       $mysqli = new mysqli("localhost",$username,$password,"smsys");
       return $mysqli;
   }
}