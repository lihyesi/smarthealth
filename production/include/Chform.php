<?php

class Chform {

    private $ch_name;
    private $ch_shortform;
    private $bed_gender;
    private $pri;
    private $lastupdate;


    public function __construct($ch_name, $ch_shortform, $bed_gender, $pri, $lastupdate) {    
        $this->ch_name = $ch_name;
        $this->ch_shortform = $ch_shortform;
        $this->bed_gender = $bed_gender;
        $this->pri = $pri;
        $this->lastupdate = $lastupdate;
    }

    public function get_chname() {
        return $this->ch_name;
    }

    public function get_shortname() {
        return $this->ch_shortform;
    }

    public function get_bedavail() {
        return $this->bed_gender;
    }

    public function get_priority() {
        return $this->pri;
    }

    public function get_lastupdate() {
        return $this->lastupdate;
    }


}

?>