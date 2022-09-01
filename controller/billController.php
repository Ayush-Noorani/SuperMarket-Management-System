<?php 

class billController extends billModel{
    public $pid;
    public function getProdprice($id){
        $pid = $id;
        return $this->p_price($pid);
    }
    
    public function makeBill($i,$q,$c_no,$r){
       return $this->insertBill($i,$q,$c_no,$r);
    }
}
?>