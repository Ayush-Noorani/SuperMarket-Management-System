<?php 

class billModel extends db{
    public function insertBill($item,$quantity,$cust_no,$redeem){
        $gtotal = 0;
        $mysqli = $this->connect();

        for($i = 0; $i < sizeof($item); $i += 1){
            $total = 0;
            $sql = $mysqli->prepare("SELECT p_price, p_category FROM products WHERE prod_id = ?;");
            $sql->bind_param("s",$item[$i]);
            $sql->execute();
            $res = $sql->get_result();
            $result = $res->fetch_assoc();
            $gtotal = $gtotal + ($quantity[$i] * $result["p_price"]);
            $total = ($quantity[$i] * $result["p_price"]);
            $stmt = $mysqli->prepare("UPDATE products SET p_quantity = p_quantity - ? WHERE prod_id = ?;");
            $stmt->bind_param("ss",$quantity[$i],$item[$i]);
            $stmt->execute();
            $stmt = $mysqli->prepare("INSERT INTO sales (c_id, prod_id, cat_id, quantity, date, s_price) VALUES (?,?,?,?,now(),?);");
            $stmt->bind_param("iiiii",$cust_no,$item[$i],$result["p_category"],$quantity[$i],$total);
            $stmt->execute();
        }

        $points = $gtotal/10;
        if($redeem){
            $new_total = $gtotal - $redeem;
            $stmt = $mysqli->query("UPDATE customers SET c_points = c_points - $redeem WHERE c_number = $cust_no;");
            if($stmt){
                return ($new_total);
            }
        }
        else{
            $stmt = $mysqli->prepare("UPDATE customers SET c_points = c_points + $points WHERE c_number = ?;");
            $stmt->bind_param("i",$cust_no);
            if($stmt->execute()){
                return ($gtotal);
            }
        }
    }

    protected function p_price($id){
        $mysqli = $this->connect();
        $stmt = $mysqli->prepare("SELECT p_price FROM products WHERE prod_id = ?;");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>