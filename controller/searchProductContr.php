<?php 

class searchProductContr extends searchProductModel {
    public function getProduct($val){
        $value = $val;
        return $this->model_GP($value);
    }
}
?>