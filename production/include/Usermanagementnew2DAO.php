<?php

require_once 'common.php';

class Usermanagementnew2DAO {

    public function retrieve() {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT username from chrw_user where role2 = 'admin'";
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_userm = null;
        $user_list = array();

        while($row = mysqli_fetch_row($result)) {
            $return_userm = 
                new Usermanagementnew2(
                    $row[0]);
            array_push($user_list,$return_userm);
        }


        // Step 5 - Return
        return $user_list;
    }

}


?>