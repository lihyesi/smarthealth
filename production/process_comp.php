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

    if (isset($_POST['comp_name']) && isset($_POST['display_type']))
    {
        $comp = $_POST['comp_name'];
        $comp_new = strtoupper(str_replace(" ","_",$comp));
        $display_type = $_POST['display_type'];

        // $dao2 = new Comp2Dao();
        // $comp2 = $dao2->retrieve($comp_new);

        // var_dump($comp2);

        $dao2 = new Comp3DAO();
        $comp2 = $dao2->retrieve($comp_new);

        // var_dump($comp2);

        if ($comp2 !=null)
        {
            $msg = "<div style='color:red;'>Component exist. Please change to another Component Name</div>";
        }
        else
        {
            $dao = new AddcompDAO();

            $msg = $dao->addcomp($comp_new, $display_type);

            if ($display_type == "RADIO")
            {
                $dao = new AddcreDAO();

                $reason = "Please edit the reason of rejection.";
                $sub_com = $comp_new;

                $msg2 = $dao->addcre($sub_com, $comp_new, $reason);
            }
        }


        


    }

    else
    {
        $msg = "Missing information";
    }
    
    $_SESSION['MSG'] = $msg;
    header("Location: add_component.php");
    return;


?>