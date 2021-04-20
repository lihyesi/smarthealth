<?php

class Comp {

    private $component;

    public function __construct($component) {    
        $this->component = $component;
    }

    public function getcomponent() {
        return $this->component;
    }
}

?>