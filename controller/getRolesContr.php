<?php 

class getRolesContr extends getRolesModel{
    public function getRoles(){
        return $this->fetchRoles();
    }
}
?>