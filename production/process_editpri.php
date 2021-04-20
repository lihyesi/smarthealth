<?php

require_once 'include/common.php';

var_dump($_POST);


if (isset($_SESSION['CH']))
{
    $ch_list = $_SESSION['CH'];
    unset($_SESSION['CH']);

    $priority_list = array();
    $priority_vnh_list = array();

    foreach ($ch_list as $ch)
    {
        $priority = $_POST[$ch.'_priority2'];
        $priority_vnh = $_POST[$ch.'_priority_vnh'];

        if (in_array($priority, $priority_list))
        {
            $msg = "There are repeated priority. Please make sure that all of the Community Hospital have different priority";
            $_SESSION['MSG'] = $msg;
            header("Location: edit_pri.php");
            return; 
        }
        else if (in_array($priority_vnh, $priority_vnh_list))
        {
            $msg = "There are repeated priority for VNH. Please make sure that all of the Community Hospital have different priority";
            $_SESSION['MSG'] = $msg;
            header("Location: edit_pri.php");
            return; 
        }
        else
        {
            array_push($priority_list, $priority);
            array_push($priority_vnh_list, $priority_vnh);

            $dao = new EditpriDAO();
            $msg = $dao->editpri($ch, $priority, $priority_vnh);

            $_SESSION['MSG'] = $msg;
        }
    }
    header("Location: edit_pri.php");
    return;


}
else
{
    $msg = "Missing information";
    $_SESSION['MSG'] = $msg;
    header("Location: edit_pri.php");
    return;  
}
    




?>