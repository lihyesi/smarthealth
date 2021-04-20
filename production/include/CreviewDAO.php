<?php

require_once 'common.php';

class CreviewDAO {

    public function retrieve($component) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT display_type from ch_form where component = '".$component."';";
             

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_crev = null;

        while($row = mysqli_fetch_row($result)) {
            $return_crev = 
                new Creview(
                    $row[0]);
            
        }


        // Step 5 - Return
        return $return_crev;
    }
}


?>