<?php

require_once 'common.php';

class Criteria2DAO {

    public function retrieve($ch, $com) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT sub_component, $ch FROM ch_criteria WHERE component = '".$com."'";
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_criteria = null;
        $criteria_list = array();

        while($row = mysqli_fetch_row($result)) {
            $return_criteria = 
                new Criteria2(
                    $row[0],
                    $row[1]);
            array_push($criteria_list,$return_criteria);
            
        }

        // Step 5 - Return
        return $criteria_list;
    }
}


?>