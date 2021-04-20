<?php

class Chcre {

    private $sub_component;


    public function __construct($sub_component) {    
        $this->sub_component = $sub_component;
    }

    public function getsub_component() {
        return $this->sub_component;
    }

}

?>