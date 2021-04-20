<?php

class Creview {

    private $display_type;


    public function __construct($display_type) {    
        $this->display_type = $display_type;
    }

    public function getdisplay_type() {
        return $this->display_type;
    }

}

?>