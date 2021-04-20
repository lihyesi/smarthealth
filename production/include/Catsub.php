<?php

class Catsub {

    private $sub_component;

    public function __construct($sub_component) {    
        $this->sub_component = $sub_component;
        
    }

    public function get_subcomponent() {
        return $this->sub_component;
    }


}

?>