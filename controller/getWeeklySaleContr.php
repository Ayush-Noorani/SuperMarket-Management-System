<?php 

class getWeeklySaleContr extends getWeeklySale{
    public function getws(){
        return $this->thisWeeksSale();
    }
    public function getSales(){
        return $this->getWeeklyCollection();
    }
    public function getSalefromDate($s_date,$f_date){
        return $this->datewiseSale($s_date,$f_date);
    }
}
?>