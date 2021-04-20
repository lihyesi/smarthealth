<?php

require_once 'common.php';

class CriteriaDAO {

    public function retrieve($criteria, $ch_string) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT $ch_string from ch_criteria where sub_component = '".$criteria."';";
        $result = mysqli_query($connection, $presql);

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);

        // Step 4 - Retrieve Query Results
        $row = mysqli_fetch_row($result);

        // Step 5 - Return
        return $row;
    }
}


?>