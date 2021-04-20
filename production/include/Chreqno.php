<?php

class Chreqno {

    private $reason;

    public function __construct($reason) {    
        $this->reason = $reason;
    }

    public function get_reqno() {
        return $this->reason;
    }

}

?>