<?php

require_once 'common.php';

class Compmanagement2DAO {


    public function retrieve() {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT component, display_type, status2, importance from ch_form where status2='show'";
  
        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_comp = null;
        $comp_list = array();

        while($row = mysqli_fetch_row($result)) {
            $return_comp = 
                new Compmanagement(
                    $row[0],
                    $row[1],
                    $row[2],
                    $row[3]);
            array_push($comp_list,$return_comp);
        }

        
        // Step 5 - Return
        return $comp_list;
    }

}


?>