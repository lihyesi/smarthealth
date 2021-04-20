<?php

class Usermanagementnew2{

    private $username;

    public function __construct($username) {    
        $this->username = $username;
    }

    public function getusername() {
        return $this->username;
    }

}

?>