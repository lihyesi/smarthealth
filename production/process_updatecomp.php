<?php

require_once 'include/common.php';

if (isset($_SESSION['USER']))
{
  $old_username = $_SESSION['USERNAME'];

}
else
{
    header("Location: ../index.php");
	return;
}

// Form processing

if (isset($_POST['component'])&& isset($_POST['display_type']) && isset($_POST['status2']) && isset($_POST['old_component']) && isset($_POST['importance']))
{
    $component2 = $_POST['component'];
    $display_type = $_POST['display_type'];
    $status2 = $_POST['status2'];
    $old_component = $_POST['old_component'];
    $component = strtoupper(str_replace(" ","_",$component2));
    $importance = $_POST['importance'];

    if($component == $old_component)
    {
        $dao = new EditcompDAO();

        $msg = $dao->editcomp($component, $display_type, $status2, $old_component, $importance);
        $_SESSION['MSG'] = $msg;
        header("Location: comp_edit.php");
        return;
    }
    else
    {
        $dao = new Comp3DAO();
        $comp = $dao->retrieve($component);

        if($comp != null)
        {
            $msg = "Component name exist. Please change to another name";
            $_SESSION['MSG'] = $msg;
            header("Location: comp_edit.php");
            return;
        }
        else
        {
            $dao = new EditcompDAO();

            $msg = $dao->editcomp($component, $display_type, $status2, $old_component, $importance);
            $_SESSION['MSG'] = $msg;

            $dao2 = new Editcre2DAO();
            $msg = $dao2->editcre2($component, $old_component);

            if ($display_type == "RADIO")
            {
                $dao3 = new Editcre3DAO();
                $msg = $dao3->editcre3($component, $old_component);
            }


            header("Location: comp_edit.php");
            return;
        }

    }
       
    
  

}
else
{
    $msg = "Missing information";
    $_SESSION['MSG'] = $msg;
    header("Location: comp_edit.php");
    return;
}




?>