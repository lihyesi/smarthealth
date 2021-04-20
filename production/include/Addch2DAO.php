<?php

require_once 'common.php';

class Addch2DAO {

    public function addch2($comhos_name_new) {
        
        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);

        // Step 2 - Prepare SQL
        $presql = "ALTER TABLE ch_criteria ADD ".$comhos_name_new." varchar(500) NOT NULL DEFAULT 'YES' AFTER status2;";
    

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);
        $msg = "Record Added Successfully";


        // Step 4 - Return
        return $msg;
    }

}


?>