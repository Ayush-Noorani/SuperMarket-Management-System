<?php 

class getWeeklySale extends db {

    public function thisWeeksSale(){
        $mysqli = $this->connect();
        $mysqli->query("CALL weeklySale()");
        $result = $mysqli->query("SELECT * FROM weeklysalesummary;");
       return $result;
    }

    public function getWeeklyCollection(){
        $mysqli = $this->connect();
        $query = $mysqli->query("SELECT SUM(s_price) AS sum FROM sales WHERE WEEKOFYEAR(date) = WEEKOFYEAR(now());");
        $result = $query->fetch_assoc();
        return $result;
    }

    public function datewiseSale($s_date, $f_date){
        $mysqli = $this->connect();
        $stmt = $mysqli->prepare('SELECT cat_id, SUM(quantity) as quantity, SUM(s_price) as s_price FROM sales WHERE date BETWEEN ? AND ? GROUP BY(cat_id) ;');
        $stmt->bind_param("ss",$s_date,$f_date);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}
?>