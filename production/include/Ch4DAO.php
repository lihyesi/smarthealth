<?php

require_once 'common.php';

class Ch4DAO {

    public function retrieve() {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);



        // Step 2 - Prepare SQL
        $presql = "SELECT MAX(priority2), MAX(priority_vnh) from ch_infomation";
        


        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);
        
        // Step 4 - Retrieve Query Results
        $return_priority = null;
        $return_priority = mysqli_fetch_row($result);


        // Step 5 - Return
        return $return_priority;
    }
}


?>