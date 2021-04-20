<?php

require_once 'common.php';

class AddcreDAO {

    public function addcre($sub_component, $component, $reason) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "INSERT INTO ch_criteria(sub_component, component, reason, status2) VALUES ('".$sub_component."','".$component."','".$reason."','show');";
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);
        $msg = "Record Added Successfully";


        // Step 4 - Return
        return $msg;
    }

}


?>