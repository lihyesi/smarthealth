<?php

class Ch {

    private $ch_name;
    private $ch_shortform;
    private $ch_address;
    private $ch_contact;
    private $ch_fax;


    public function __construct($ch_name, $ch_shortform, $ch_address, $ch_contact, $ch_fax) {    
        $this->ch_name = $ch_name;
        $this->ch_shortform = $ch_shortform;
        $this->ch_address = $ch_address;
        $this->ch_contact = $ch_contact;
        $this->ch_fax = $ch_fax;
    }

    public function getch_name() {
        return $this->ch_name;
    }

    public function getch_shortform() {
        return $this->ch_shortform;
    }

    public function getch_address() {
        return $this->ch_address;
    }
    
    public function getch_contact() {
        return $this->ch_contact;
    }

    public function getch_fax() {
        return $this->ch_fax;
    }

}

?>