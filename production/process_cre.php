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
    if (isset($_POST['cre_name']) && isset($_POST['cre_reason']) && isset($_POST['component']) && isset($_POST['display']))
    {
        $sub_component = $_POST['cre_name'];
        $component = $_POST['component'];
        $reason = $_POST['cre_reason'];
        $display = $_POST['display'];
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
        }

    }

    else
    {
        $msg = "Missing information";
    }
    
    $_SESSION['MSG'] = $msg;
    $_SESSION['COMP'] = $component;
    $_SESSION['DISPLAY'] = $display;
    header("Location: add_cre.php");
    return;

// $error = [];


?>