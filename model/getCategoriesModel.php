<?php 

class getCategoriesModel extends db{
    protected function getCategories(){
        $result = $this->connect()->query("SELECT cat_id,cat_name FROM category;");
        return $result;
    }
}
?>