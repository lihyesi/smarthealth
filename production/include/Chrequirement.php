<?php

class Chrequirement {

    private $fullname;

    public function __construct($fullname) {    
        $this->fullname = $fullname;
    }

    public function get_fullname() {
        return $this->fullname;
    }

}

?>