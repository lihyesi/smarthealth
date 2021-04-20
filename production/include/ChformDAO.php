<?php

require_once 'common.php';

class ChformDAO {

    public function retrieve($bed_gender, $pri) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT ch_name, ch_shortform, $bed_gender, $pri, lastupdate from ch_infomation where $pri>0 order by $pri;";
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_form = null;
        $list = array();

        while($row = mysqli_fetch_row($result)) {
            $return_form = 
                new Chform(
                    $row[0],
                    $row[1],
                    $row[2],
                    $row[3],
                    $row[4]);

            array_push($list,$return_form);
            
        }


        // Step 5 - Return
        return $list;
    }
}


?>