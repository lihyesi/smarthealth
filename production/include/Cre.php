<?php

class Cre {

    private $sub_component;
    private $reason;
    private $status2;


    public function __construct($sub_component, $reason, $status2) {    
        $this->sub_component = $sub_component;
        $this->reason = $reason;
        $this->status2 = $status2;
    }
    
    public function getsub_component() {
        return $this->sub_component;
    }

    public function getreason() {
        return $this->reason;
    }

    public function getstatus2() {
        return $this->status2;
    }

}

?>