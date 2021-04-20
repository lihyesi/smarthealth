<?php

require_once 'common.php';

class EditcompDAO {

    public function editcomp($component, $display_type, $status2, $old_component, $importance) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);



        // Step 2 - Prepare SQL
        $presql = "UPDATE ch_form SET component = '".$component."', display_type= '".$display_type."', status2='".$status2."', importance='".$importance."' WHERE component = '".$old_component."';";


        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $msg = "Record Updated Successfully";


        // Step 5 - Return
        return $msg;
    }

}


?>