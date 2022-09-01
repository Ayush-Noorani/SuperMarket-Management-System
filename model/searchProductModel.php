<?php 

class searchProductModel extends db {
    protected function model_GP($val){
        $mysqli = $this->connect();
        $stmt = $mysqli->prepare('SELECT * FROM products WHERE p_name = ?;');
        $stmt->bind_param("s",$val);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}
?>