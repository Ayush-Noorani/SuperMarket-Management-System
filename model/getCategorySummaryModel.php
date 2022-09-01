<?php 

class getCategorySummaryModel extends db{
    protected function getCategorySummary($cat_id){
        $mysqli = $this->connect();
        $stmt = $mysqli->query("SELECT sales.prod_id as prod_id, products.p_name as prod_name, SUM(sales.quantity) as quantity, SUM(sales.s_price) as s_price FROM sales, products WHERE sales.prod_id = products.prod_id AND WEEKOFYEAR(sales.date) = WEEKOFYEAR(now()) and sales.cat_id = $cat_id GROUP BY (sales.prod_id)");
        return $stmt;
    }
}
?>