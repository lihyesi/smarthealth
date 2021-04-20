<?php

class Usermanagement{

    private $username;
    private $name_of_user;
    private $role2;

    public function __construct($username, $name_of_user, $role2) {    
        $this->username = $username;
        $this->name_of_user = $name_of_user;
        $this->role2 = $role2;
    }

    public function getusername() {
        return $this->username;
    }

    public function getname_of_user() {
        return $this->name_of_user;
    }

    public function getrole() {
        return $this->role2;
    }
}

?>