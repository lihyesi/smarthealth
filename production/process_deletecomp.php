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
    if (isset($_GET['component']))
    {
        $component = $_GET['component'];

    // ------------------------------------------------------------------------------------------
    
    // Authentication ---------------------------------------------------------------------------
        $dao = new CreDAO();
        $cre_list = $dao->retrieve($component);
        if ($cre_list !=null)
        {
            $dao = new DeletecompDAO();
            $msg = $dao->delete($component);
    
            $dao2 = new Deletecre2DAO();
            $msg = $dao2->delete($component);

            foreach ($cre_list as $cre)
            {
                $sub_component = $cre->getsub_component();
                $dao3 = new Deletecre2DAO();
                $msg = $dao3->delete($sub_component);

                $dao4 = new DeletecompDAO();
                $msg = $dao4->delete($sub_component);
            }
        }
        else
        {
            $dao = new DeletecompDAO();
            $msg = $dao->delete($component);
    
            $dao2 = new Deletecre2DAO();
            $msg = $dao2->delete($component);
        }

    }
    else
    {
        $msg = "Issue with deleting component. Please try again";
    }

    header("Location: ch_comp.php");
    return;
    
    

?>