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
    var_dump($_POST);
    // grab user input from $_POST: 1) username, 2) pass ---------------------------------------
    if (isset($_POST['cre_name']) && isset($_POST['cre_reason']) && isset($_POST['component']))
    {
        $sub_component = $_POST['cre_name'];
        $component = $_POST['component'];
        $component_comp = $_POST['component_comp'];
        $component_disp = $_POST['component_disp'];
        $reason = $_POST['cre_reason'];
        $sub_component_new = strtoupper(str_replace(" ","_",$sub_component));
        // Authentication ---------------------------------------------------------------------------
        
        $dao2 = new Cre2DAO();
        $sub_comp = $dao2->retrieve($sub_component_new);
        if ($sub_comp !=null)
        {
            $msg = "<div style='color:red;'>Sub component exist. Please change to another Sub Component Name</div>";
        }
        else
        {
            $dao = new AddcreDAO();

            $msg = $dao->addcre($sub_component_new, $component, $reason);



            $dao2 = new Addcomp2DAO();

            $display_type = "DROPDOWN";

            $comp_new = $component;

            $msg = $dao2->addcomp($comp_new, $display_type);
            
        }

    }

    else
    {
        $msg = "Missing information";
    }
    
    $_SESSION['MSG'] = $msg;
    $_SESSION['COMP'] = $component;
    $_SESSION['COMPCOMP'] = $component_comp;
    $_SESSION['COMPDISP'] = $component_disp;
    header("Location: add_subcre.php");
    return;

// $error = [];


?>