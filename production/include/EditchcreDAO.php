<?php

require_once 'common.php';

class EditchcreDAO {

    public function editchcre($ch, $ch_details, $criteria) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        
        // Step 2 - Prepare SQL
        $presql = "UPDATE ch_criteria SET ".$ch." = '".$ch_details."' WHERE sub_component = '".$criteria."';";

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $msg = "Record Updated Successfully";

        // Step 5 - Return
        return $msg;
    }

}


?>