<?php

require_once 'common.php';

class AddnewuserDAO {

    public function adduser($email, $fullname) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "INSERT INTO chrw_new_user(username, name_of_user) VALUES ('".$email."','".$fullname."');";
        
        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);
        $msg = "Request sent successfully";



        // Step 4 - Return
        return $msg;
    }

}


?>