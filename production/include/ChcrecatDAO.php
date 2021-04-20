<?php

require_once 'common.php';

class ChcrecatDAO {

    public function retrieve() {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT DISTINCT component FROM ch_criteria where Status2='show';";
      

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_comp = null;
        $comp_list = array();

        while($row = mysqli_fetch_row($result)) {
            $return_comp = 
                new Chcrecat(
                    $row[0]);
            array_push($comp_list,$return_comp);
            
        }


        // Step 5 - Return
        return $comp_list;
    }
}


?>