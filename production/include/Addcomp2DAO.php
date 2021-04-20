<?php

require_once 'common.php';

class Addcomp2DAO {

    public function addcomp($comp_new, $display_type) {
        $importance = "LESS_FREQUENT";
        
        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "INSERT INTO ch_form(component, display_type, status2, importance, class2) VALUES ('".$comp_new."','".$display_type."', 'show', '".$importance."', 2);";


        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);
        $msg = "Record Added Successfully";


        // Step 4 - Return
        return $msg;
    }

}


?>