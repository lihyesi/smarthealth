<?php

require_once 'common.php';

class CatsubDAO {

    public function retrieve($criterias) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);



        // Step 2 - Prepare SQL
        $presql = "SELECT sub_component from ch_criteria where component = '".$criterias."' and Status2='show';";
        
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);
        $return_catsub = null;
        $catss = array();

        // Step 4 - Retrieve Query Results
        while($row = mysqli_fetch_row($result)) {
            $return_catsub = 
                new Catsub(
                    $row[0]);

            array_push($catss,$return_catsub);
        }



        // Step 5 - Return
        return $catss;
    }
}


?>