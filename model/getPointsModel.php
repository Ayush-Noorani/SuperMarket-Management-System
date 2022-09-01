<?php 

class getPointsModel extends db{
    protected function customerPoints($cust_num){
        $mysqli = $this->connect();
        $stmt = $mysqli->prepare("SELECT c_points FROM customers WHERE c_number = ?;");
        $stmt->bind_param('i',$cust_num);
        $stmt->execute();
        return $stmt->get_result();
    }

    protected function RedeemedPoints(){
        $mysqli = $this->connect();
        $stmt = $mysqli->query("SELECT SUM(redeemed_points) as points FROM points_redeemed WHERE WEEKOFYEAR(date_redeemed) = WEEKOFYEAR(now());");
        $result = $stmt->fetch_assoc();
        return $result;
    }
}
?>