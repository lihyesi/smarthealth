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
    if (isset($_SESSION['CRE_LIST']) && isset($_POST['component']) && isset($_POST['display']))
    {
        $cre_list = $_SESSION['CRE_LIST'];
        unset($_SESSION['CRE_LIST']);
        var_dump($cre_list);

    // ------------------------------------------------------------------------------------------
        $dao = new DeletecreDAO();
        
        foreach ($cre_list as $cre)
        {
            $msg = $dao->delete($cre);

            $dao2 = new DeletecompDAO();
            $msg2 = $dao2->delete($cre);

            $dao3 = new Deletecre2DAO();
            $msg3 = $dao3->delete($cre);
        }

        $component = $_POST['component'];
        $display = $_POST['display'];


    }
    else
    {
        $component = $_POST['component'];
        $display = $_POST['display'];
        $msg = "Issue with deleting criteria. Please try again";
    }

    $_SESSION['MSG'] = $msg;
    $_SESSION['COMP'] = $component;
    $_SESSION['DISPLAY'] = $display;
    header("Location: deletecre_confirmation.php");
    return;
    
    

?>