<?php

class User {

    private $username;
    private $name_of_user;
    private $password2;
    private $role2;

    public function __construct($username, $name_of_user, $password2, $role2) {    
        $this->username = $username;
        $this->name_of_user = $name_of_user;
        $this->password2 = $password2;
        $this->role2 = $role2;
    }

    public function getusername() {
        return $this->username;
    }

    public function getname_of_user() {
        return $this->name_of_user;
    }

    public function getpassword() {
        return $this->password2;
    }

    public function getrole() {
        return $this->role2;
    }
}

?>