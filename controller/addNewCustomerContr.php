<?php

class addNewCustomerContr extends addNewCustomerModel{
    public function addCustomer($c_name,$c_number){
        return $this->addCust($c_name,$c_number);
    }
}
?>