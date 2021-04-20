<?php

require_once 'common.php';

class ChbedDAO {

    public function retrieve() {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT ch_name, ch_shortform, bed_status_private_male, bed_status_private_female, bed_status_sub_male, bed_status_sub_female, lastupdate from ch_infomation";
        $result = mysqli_query($connection, $presql);
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);

        // Step 4 - Retrieve Query Results
        $return_ch = null;
        $ch_list = array();

        while($row = mysqli_fetch_row($result)) {
            $return_ch = 
                new Chbed(
                    $row[0],
                    $row[1],
                    $row[2],
                    $row[3],
                    $row[4],
                    $row[5],
                    $row[6]);
            array_push($ch_list,$return_ch);
            
        }


        // Step 5 - Return
        return $ch_list;
    }
}


?>