<?php

require_once 'common.php';

class AdduserDAO {

    public function adduser($name_of_user, $role2, $username, $password2) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "INSERT INTO chrw_user(username, name_of_user, password2, role2) VALUES ('".$username."','".$name_of_user."','".$password2."','".$role2."');";
        
        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);
        $msg = "Record Added Successfully";



        // Step 4 - Return
        return $msg;
    }

}


?>