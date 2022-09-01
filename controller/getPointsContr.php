<?php

CLASS getPointsContr extends getPointsModel{
    public function getPoints($num){
        return $this->customerPoints($num);
    }

    public function weeklyRedeem(){
        return $this->RedeemedPoints();
    }
}
?>