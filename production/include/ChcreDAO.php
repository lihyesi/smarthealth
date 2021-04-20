<?php

require_once 'common.php';

class ChcreDAO {

    public function retrieve($component) {
        
        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT sub_component from ch_criteria where component = '".$component."' and Status2='show';";
        
       

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);

        // Step 4 - Retrieve Query Results
        $return_cre = null;
        $cre_list = array();

        while($row = mysqli_fetch_row($result)) {
            $return_cre = 
                new Chcre(
                    $row[0]);
            array_push($cre_list,$return_cre);
            
        }


        // Step 5 - Return
        return $cre_list; 
    }
}


?>