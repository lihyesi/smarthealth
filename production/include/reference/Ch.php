<?php

class Ch {

    private $ch_name;
    private $db_ch_name;
    private $ch_shortform;
    private $ch_address;
    private $ch_contact;
    private $ch_fax;
    private $bed_status_private;
    private $bed_status_sub;
    private $ch_status;
    private $hide_reason;
    private $priority;
    private $priority_vnh;


    public function __construct($ch_name, $db_ch_name, $ch_shortform, $ch_address, $ch_contact, $ch_fax, $bed_status_private, $bed_status_sub, $ch_status, $hide_reason, $priority, $priority_vnh) {    
        $this->ch_name = $ch_name;
        $this->db_ch_name = $db_ch_name;
        $this->ch_shortform = $ch_shortform;
        $this->ch_address = $ch_address;
        $this->ch_contact = $ch_contact;
        $this->ch_fax = $ch_fax;
        $this->bed_status_private = $bed_status_private;
        $this->bed_status_sub = $bed_status_sub;
        $this->ch_status = $ch_status;
        $this->hide_reason = $hide_reason;
        $this->priority = $priority;
        $this->priority_vnh = $priority_vnh;
    }

    public function getch_name() {
        return $this->ch_name;
    }

    public function getdb_ch_name() {
        return $this->db_ch_name;
    }

    public function getch_shortform() {
        return $this->shortform;
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

    public function getbed_status_private() {
        return $this->bed_status_private;
    }

    public function getbed_status_sub() {
        return $this->bed_status_sub;
    }

    public function getch_status() {
        return $this->ch_status;
    }

    public function gethide_reason() {
        return $this->hide_reason;
    }

    public function getpriority() {
        return $this->priority;
    }

    public function getpriority_vnh() {
        return $this->priority_vnh;
    }
}

?>