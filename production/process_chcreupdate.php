<?php

require_once 'include/common.php';

// var_dump($_POST);
// // var_dump($_SESSION['CH']);
// // var_dump($_SESSION['CRE']);

if (isset($_SESSION['CH']))
{
    $ch_namelist = $_SESSION['CH'];
    unset($_SESSION['CH']);

    $criteria = $_POST['cre'];
    // echo $criteria;

    foreach ($ch_namelist as $ch)
    {
        $ch_details = $_POST[$ch.'_updateinfo'];
        // echo $ch_details;

        $ch_details = trim($ch_details);
        if ($ch_details == "no" or $ch_details == "No" or $ch_details == "nO")
        {
            $ch_details = "NO";
        }
        else if ($ch_details == "yes" or $ch_details == "Yes")
        {
            $ch_details = "YES";
        }

        $dao = new EditchcreDAO();
        $msg = $dao->editchcre($ch, $ch_details, $criteria);
        $_SESSION['MSG'] = $msg;
    }

    header("Location: ch_cap_setting.php");
    return;
}
else if (isset($_SESSION['CRE']))
{
    $cre_list = $_SESSION['CRE'];
    unset($_SESSION['CRE']);
    
    foreach($cre_list as $cre)
    {
        // echo $cre;
        $cre_new = str_replace(".","_",$cre);
        // echo $cre_new;
        $cre_details = $_POST[$cre_new.'_updateinfo'];
        $ch = $_POST['ch'];

        $cre_details = trim($cre_details);
        if ($cre_details == "no" or $cre_details == "No" or $cre_details == "nO")
        {
            $cre_details = "NO";
        }
        else if ($cre_details == "yes" or $cre_details == "Yes")
        {
            $cre_details = "YES";
        }

        $dao = new EditchcreDAO();
        $msg = $dao->editchcre($ch, $cre_details, $cre);
        $_SESSION['MSG'] = $msg;
    }
    header("Location: ch_cap_setting.php");
    return;
}
else
{
    $msg = "Missing information";
    $_SESSION['MSG'] = $msg;
    header("Location: ch_cap_setting.php");
    return;
}




?>