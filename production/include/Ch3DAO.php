<?php

require_once 'common.php';

class Ch3DAO {

    public function retrieve($ch) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT ch_name, ch_shortform, ch_address, ch_contact, ch_fax, ch_status from ch_infomation where ch_name='".$ch."'";
                


        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);
        $return_ch = null;
        

        // Step 4 - Retrieve Query Results
        while($row = mysqli_fetch_row($result)) {
            $return_ch = 
                new Ch2(
                    $row[0],
                    $row[1],
                    $row[2],
                    $row[3],
                    $row[4],
                    $row[5]);
        }


        // Step 5 - Return
        return $return_ch;
    }
}


?>