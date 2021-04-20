<?php
require_once 'include/common.php';

if (isset($_SESSION['USER']))
{
    $name = $_SESSION['USER'];
    $role = $_SESSION['ROLE'];
    // unset($_SESSION['USER']);

}
else
{
  header("Location: ../index.php");
}
  


    // grab user input from $_POST: 1) username---------------------------------------
    if (isset($_GET['username']))
    {
        $username = $_GET['username'];
        // var_dump($_GET);

        // echo $username;

    // ------------------------------------------------------------------------------------------
    
    // Authentication ---------------------------------------------------------------------------
        $dao = new DeleteuserDAO();

        $msg = $dao->delete($username);

    }
    else
    {
        $msg = "Issue with deleting user. Please try again";
    }

    // $_SESSION['MSG'] = $msg;
    header("Location: ch_user.php");
    return;
    
    

?>