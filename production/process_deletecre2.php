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
    if (isset($_SESSION['CRE_LIST']) && isset($_POST['component']))
    {
        $cre_list = $_SESSION['CRE_LIST'];
        unset($_SESSION['CRE_LIST']);

        $component = $_POST['component'];
        $component_comp = $_POST['component_comp'];
        $component_disp = $_POST['component_disp'];
        // var_dump($cre_list);

    // ------------------------------------------------------------------------------------------
                
        $dao = new DeletecreDAO();
        
        foreach ($cre_list as $cre)
        {
            $dao2 = new CreDAO();
            $cre_list = $dao2->retrieve($component);

            if (count($cre_list) == 1)
            {
                $msg = $dao->delete($cre);
                $dao3 = new DeletecompDAO();
                $msg2 = $dao3->delete($component);
                
            }
            else
            {
                $msg = $dao->delete($cre);
            }
        }

    }
    else
    {
        $component = $_POST['component'];
        $component_comp = $_POST['component_comp'];
        $component_disp = $_POST['component_disp'];
        $msg = "Issue with deleting criteria. Please try again";
    }

    $_SESSION['MSG'] = $msg;
    $_SESSION['COMP'] = $component;
    $_SESSION['COMPCOMP'] = $component_comp;
    $_SESSION['COMPDISP'] = $component_disp;
    header("Location: deletecre_confirmation2.php");
    return;
    
    

?>