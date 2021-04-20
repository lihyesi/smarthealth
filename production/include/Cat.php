<?php

class Cat {

    private $component;
    private $importance;

    public function __construct($component, $importance) {    
        $this->component = $component;
        $this->importance = $importance;
    }

    public function get_component() {
        return $this->component;
    }

    public function get_importance() {
        return $this->importance;
    }

}

?>