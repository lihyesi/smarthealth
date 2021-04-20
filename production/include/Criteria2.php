<?php

class Criteria2 {

    private $sub_component;
    private $ch;


    public function __construct($sub_component, $ch) {    
        $this->sub_component = $sub_component;
        $this->ch = $ch;
    }
    
    public function getsub_component() {
        return $this->sub_component;
    }

    public function getch() {
        return $this->ch;
    }

}

?>