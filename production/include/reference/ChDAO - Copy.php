<?php

require_once 'common.php';

class ChDAO {

    // Retrieve a row from table chrw_user where username == $username
    // If no matching row is found, return null
    public function retrieve() {

        // Step 1 - Connect to Database
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();


        // Step 2 - Prepare SQL
        $sql = "SELECT ch_name, ch_shortform, ch_address, ch_contact, ch_fax from ch_info";
        $stmt = $pdo->prepare($sql);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        

        // Step 3 - Execute SQL
        $return_ch = null;
        $ch_list = array();

        while($row = $stmt->fetch()) {
            $return_ch = 
                new Ch(
                    $row['ch_name'],
                    $row['ch_shortform'],
                    $row['ch_address'],
                    $row['ch_contact'],
                    $row['ch_fax']);
            array_push($ch_list,$return_ch);
            
        }

        // Step 4 - Retrieve Query Results


        // Step 5 - Clear Resources
        $stmt = null;
        $pdo = null;


        // Step 6 - Return
        return $ch_list; // a User object
    }
}


?>