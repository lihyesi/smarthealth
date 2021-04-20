<?php

require_once 'common.php';

class CatDAO {

    public function retrieve($num) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT component, importance from ch_form where class2 = '".$num."' and Status2='show';";
        
        
        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);
        $return_crev = null;
        $list = array();

        // Step 4 - Retrieve Query Results
        while($row = mysqli_fetch_row($result)) {
            $return_crev = 
                new Cat(
                    $row[0],
                    $row[1]);
            array_push($list,$return_crev);
        }

        // Step 5 - Return
        return $list;
    }
}


?>