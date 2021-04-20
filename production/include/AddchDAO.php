<?php

require_once 'common.php';

class AddchDAO {

    public function addch($comhos_name_new, $comhos_short_new, $comhos_address_new, $comhos_contact, $comhos_fax, $max_pri, $max_privnh) {
        
        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "INSERT INTO ch_infomation(ch_name, ch_shortform, ch_address, ch_contact, ch_fax, bed_status_private_male, bed_status_private_female, bed_status_sub_male, bed_status_sub_female, ch_status, priority2, priority_vnh) VALUES ('".$comhos_name_new."','".$comhos_short_new."','".$comhos_address_new."',".$comhos_contact.",".$comhos_fax.",0,0,0,0,'show',".$max_pri.",".$max_privnh.");";
    

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);
        $msg = "Record Added Successfully";

        // Step 4 - Return
        return $msg;
    }

}


?>