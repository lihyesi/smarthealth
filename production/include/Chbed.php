<?php

class Chbed {

    // ch_name, ch_shortform, bed_status_private_male, bed_status_private_female, bed_status_sub_male, bed_status_sub_female, lastupdate
    private $ch_name;
    private $ch_shortform;
    private $bed_status_private_male;
    private $bed_status_private_female;
    private $bed_status_sub_male;
    private $bed_status_sub_female;
    private $lastupdate;
    


    public function __construct($ch_name, $ch_shortform, $bed_status_private_male, $bed_status_private_female, $bed_status_sub_male, $bed_status_sub_female, $lastupdate) {    
        $this->ch_name = $ch_name;
        $this->ch_shortform = $ch_shortform;
        $this->bed_status_private_male = $bed_status_private_male;
        $this->bed_status_private_female = $bed_status_private_female;
        $this->bed_status_sub_male = $bed_status_sub_male;
        $this->bed_status_sub_female = $bed_status_sub_female;
        $this->lastupdate = $lastupdate;
    }
    
    public function getch_name() {
        return $this->ch_name;
    }

    public function getch_shortform() {
        return $this->ch_shortform;
    }
    
    public function getbed_status_private_male() {
        return $this->bed_status_private_male;
    }

    public function getbed_status_private_female() {
        return $this->bed_status_private_female;
    }

    public function getbed_status_sub_male() {
        return $this->bed_status_sub_male;
    }

    public function getbed_status_sub_female() {
        return $this->bed_status_sub_female;
    }

    public function getlastupdate() {
        return $this->lastupdate;
    }

}

?>