<?php 

class updateProductContr extends updateProductModel{
    public function updateItem($prod_id,$quantity){
        return $this->update($prod_id,$quantity);
    }
}
?>