<?php

require_once 'common.php';

class UserDAO {

    public function retrieve($username) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);

        // Step 2 - Prepare SQL

        $presql = "SELECT username, name_of_user, password2, role2 from chrw_user WHERE username = '".$username."'";
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $return_user = null;

        while($row = mysqli_fetch_row($result)) {
            $return_user = 
                new User(
                    $row[0],
                    $row[1],
                    $row[2],
                    $row[3]);
        }

        


        // Step 5 - Return
        return $return_user;
    }


}


?>