<?php

class Usermanagementnew{

    private $username;
    private $name_of_user;

    public function __construct($username, $name_of_user) {    
        $this->username = $username;
        $this->name_of_user = $name_of_user;
    }

    public function getusername() {
        return $this->username;
    }

    public function getname_of_user() {
        return $this->name_of_user;
    }
}

?>