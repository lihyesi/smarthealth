<?php

require_once 'common.php';

class EditchDAO {

    public function editch($shortform, $address, $contact, $fax, $ch_status, $ch_name2) {
        // $ch_info = array();
        // array_push($ch_info, $shortform);
        // array_push($ch_info, $address);
        // array_push($ch_info, $contact);
        // array_push($ch_info, $fax);
        // array_push($ch_info, $ch_status);
        // array_push($ch_info, $ch_name2);

        // $msg = $ch_info;

        if (empty($fax))
        {
            $fax = 0;
        }


        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "UPDATE ch_infomation SET ch_shortform='".$shortform."', ch_address='".$address."', ch_contact=".$contact.", ch_fax=".$fax.", ch_status='".$ch_status."' WHERE ch_name='".$ch_name2."'";


        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $msg = "Record Updated Successfully";

        // Step 5 - Return
        return $msg;
    }

}


?>