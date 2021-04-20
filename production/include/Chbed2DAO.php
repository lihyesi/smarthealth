<?php

require_once 'common.php';

class Chbed2DAO {

    public function retrieve($ch_bed) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT ch_name, ch_shortform, bed_status_private_male, bed_status_private_female, bed_status_sub_male, bed_status_sub_female, lastupdate from ch_infomation where ch_name='".$ch_bed."'";
        
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);

        // Step 4 - Retrieve Query Results
        $return_ch = null;

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
            
        }

        // Step 6 - Return
        return $return_ch;
    }
}


?>