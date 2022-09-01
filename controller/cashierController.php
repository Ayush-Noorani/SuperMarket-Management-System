
<?php 

class cashierController extends updateProductModel{
   public function performTransaction()
   {
        $this->cashierUpdate($prod_id,$quantity);
   }
}
?>