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

if (isset($_SESSION['COMPONENT']) && isset($_SESSION['CRE_LIST']))
{

    $component = $_SESSION['COMPONENT'];
    unset($_SESSION['COMPONENT']);

    $cre_list = $_SESSION['CRE_LIST'];
    unset($_SESSION['CRE_LIST']);

    $component_comp = $_SESSION['COMPCOMP'];
    unset($_SESSION['COMPCOMP']);

    $component_disp = $_SESSION['COMPDISP'];
    unset($_SESSION['COMPDISP']);



    foreach($cre_list as $cre)
    {
        $cre = str_replace(".","_",$cre);
        $sub_com = $_POST[$cre.'sub_com'];
        $status2 = $_POST[$cre.'status2'];
        $reason = $_POST[$cre.'reason'];
        $sub_com_old = $_POST[$cre.'sub_com_old'];
        $sub_com2 = strtoupper(str_replace(" ","_",$sub_com));
        

        if($sub_com2 == $sub_com_old)
        {
            $dao = new EditcreDAO();

            $msg = $dao->editcre($sub_com2, $status2, $reason, $sub_com_old);
            $_SESSION['MSG'] = $msg;
            $_SESSION['COMP'] = $component;
            $_SESSION['COMPCOMP'] = $component_comp;
            $_SESSION['COMPDISP'] = $component_disp;
        }
        else
        {
            $dao = new Cre2DAO();
            $sub_com3 = $dao->retrieve($sub_com2);

            if($sub_com3 != null)
            {
                $msg = "Component name exist. Please change to another name";
                $_SESSION['MSG'] = $msg;
                $_SESSION['COMP'] = $component;
                $_SESSION['COMPCOMP'] = $component_comp;
                $_SESSION['COMPDISP'] = $component_disp;
            }
            else
            {
                $dao = new EditcreDAO();

                $msg = $dao->editcre($sub_com2, $status2, $reason, $sub_com_old);
                $_SESSION['MSG'] = $msg;
                $_SESSION['COMP'] = $component;
                $_SESSION['COMPCOMP'] = $component_comp;
                $_SESSION['COMPDISP'] = $component_disp;
            }

        }
    }

    header("Location: edit_subcre.php");
    return;
       
    
  

}
else
{
    $msg = "Missing information";
    $_SESSION['MSG'] = $msg;
    header("Location: comp_edit.php");
    return;
}




?>