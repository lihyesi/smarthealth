<?php

require_once 'common.php';

class ChreqnoDAO {

    public function retrieve($c) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT reason from ch_criteria where sub_component = '".$c."';";
        
       

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_requirementno = null;

        while($row = mysqli_fetch_row($result)) {
            $return_requirementno = 
                new Chreqno(
                    $row[0]);
            
        }

        // Step 5 - Return
        return $return_requirementno;
    }
}


?>