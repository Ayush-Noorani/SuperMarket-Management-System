<?php

class addNewCustomerModel extends db{
    protected function addCust($c_name,$c_number){
        $mysqli = $this->connect();
        $stmt = $mysqli->prepare("INSERT INTO customers(c_name,c_number) VALUES (?,?);");
        $stmt->bind_param("ss",$c_name,$c_number);
        if($stmt->execute()){
            return "Customer added succesfully";
        }
        else{
            return "Failed to add new customer";
        }

    }
}


?>