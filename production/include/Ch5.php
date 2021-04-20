<?php

class Ch5 {

    private $ch_name;
    private $ch_shortform;
    private $priority2;
    private $priority_vnh;


    public function __construct($ch_name, $ch_shortform, $priority2, $priority_vnh) {    
        $this->ch_name = $ch_name;
        $this->ch_shortform = $ch_shortform;
        $this->priority2 = $priority2;
        $this->priority_vnh = $priority_vnh;
    }

    public function getch_name() {
        return $this->ch_name;
    }

    public function getch_shortform() {
        return $this->ch_shortform;
    }

    public function getpriority2() {
        return $this->priority2;
    }
    
    public function getpriority_vnh() {
        return $this->priority_vnh;
    }

}

?>