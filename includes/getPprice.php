<?php 
include "../model/db.php";
include "../model/billModel.php";
include "../controller/billController.php";

if(isset($_GET["pid"])){
    $pid = $_GET["pid"];
    $getter = new billController();
    $ans = $getter->getProdprice($pid);
    $result = $ans->fetch_assoc();
    echo $result["p_price"];
}
?>