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
    if (isset($_SESSION['CH_LIST']))
    {
        $ch_list = $_SESSION['CH_LIST'];
        unset($_SESSION['CH_LIST']);
        // var_dump($ch_list);

    // ------------------------------------------------------------------------------------------
        $dao = new DeletechDAO();
        $dao2 = new Deletech2DAO();
        
        foreach ($ch_list as $ch)
        {
            $msg = $dao2->delete2($ch);
            $msg = $dao->delete($ch);
        }
    }
    else
    {
        $msg = "Issue with deleting Community Hospital. Please try again";
    }

    $_SESSION['MSG'] = $msg;
    header("Location: deletech_confirmation.php");
    return;
    
    

?>