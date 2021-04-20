<?php

require_once 'common.php';

class EdituserDAO {

    public function edituser($name_of_user, $username, $old_username) {

        // Step 1 - Connect to Database
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);


        // Step 2 - Prepare SQL
        $presql = "UPDATE chrw_user SET username = '".$username."', name_of_user= '".$name_of_user."' WHERE username = '".$old_username."';";
        

        // Step 3 - Execute SQL
        $result = mysqli_query($connection, $presql);


        // Step 4 - Retrieve Query Results
        $msg = "Record Updated Successfully";

        
        $_SESSION['USER'] = $name_of_user;
        $_SESSION['USERNAME'] = $username;

        // Step 6 - Return
        return $msg;
    }

}


?>