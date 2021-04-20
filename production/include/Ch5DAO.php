<?php

require_once 'common.php';

class Ch5DAO {

    public function retrieve() {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT ch_name, ch_shortform, priority2, priority_vnh from ch_infomation where ch_status = 'show' ORDER BY priority2";
             

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);   


        // Step 4 - Retrieve Query Results
        $return_ch = null;
        $ch_list = array();

        while($row = mysqli_fetch_row($result)) {
            $return_ch = 
                new Ch5(
                    $row[0],
                    $row[1],
                    $row[2],
                    $row[3]);
            array_push($ch_list,$return_ch);
            
        }


        // Step 5 - Return
        return $ch_list;
    }
}


?>