<?php

require_once 'common.php';

class UsernewDAO {

    public function retrieve($username) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);

        // Step 2 - Prepare SQL

        $presql = "SELECT username, name_of_user from chrw_new_user WHERE username = '".$username."'";
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_user = null;

        while($row = mysqli_fetch_row($result)) {
            $return_user = 
                new Usernew(
                    $row[0],
                    $row[1]);
        }

        


        // Step 5 - Return
        return $return_user;
    }


}


?>