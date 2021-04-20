<?php

class Compmanagement{

    private $component;
    private $display_type;
    private $status2;
    private $importance;

    public function __construct($component, $display_type, $status2, $importance) {    
        $this->component = $component;
        $this->display_type = $display_type;
        $this->status2 = $status2;
        $this->importance = $importance;
    }

    public function getcomponent() {
        return $this->component;
    }

    public function getstatus2() {
        return $this->status2;
    }

    public function getdisplay_type() {
        return $this->display_type;
    }

    public function getimportance() {
        return $this->importance;
    }

}

?>