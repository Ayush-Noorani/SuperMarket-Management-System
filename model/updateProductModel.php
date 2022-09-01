<?php 

class updateProductModel extends db{
    protected function update($prod_id,$quantity){
        $mysqli = $this->connect();
        $stmt = $mysqli->prepare('UPDATE products SET p_quantity = p_quantity+? WHERE prod_id = ?;');
        $stmt->bind_param("ii",$quantity,$prod_id);
        if($stmt->execute()){
            return "Updated successfully";
        }
    }

    protected function cashierUpdate($prod_id,$quantity){
        $mysqli = $this->connect();
        $stmt = $mysqli->prepare('UPDATE products SET p_quantity = p_quantity-? WHERE prod_id = ?;');
        $stmt->bind_param("ii",$quantity,$prod_id);
        if($stmt->execute()){
            return 1;
        }

    }
}
?>