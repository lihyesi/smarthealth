<?php

require_once 'common.php';

class UsermanagementDAO {

    public function retrieve($username) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "SELECT username, name_of_user, role2 from chrw_user where username <> '".$username."'";
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_userm = null;
        $user_list = array();

        while($row = mysqli_fetch_row($result)) {
            $return_userm = 
                new Usermanagement(
                    $row[0],
                    $row[1],
                    $row[2]);
            array_push($user_list,$return_userm);
        }


        // Step 5 - Return
        return $user_list;
    }

}


?>