<?php 

class getRolesModel extends db{
    protected function fetchRoles(){
        $stmt = $this->connect()->query("SELECT role from users");
        return $stmt;
    }
}
?>