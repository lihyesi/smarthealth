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

if (isset($_SESSION['COMPONENT']) && isset($_SESSION['CRE_LIST']) && isset($_SESSION['DISPLAY']))
{

    $component = $_SESSION['COMPONENT'];
    unset($_SESSION['COMPONENT']);

    $cre_list = $_SESSION['CRE_LIST'];
    unset($_SESSION['CRE_LIST']);

    $display = $_SESSION['DISPLAY'];
    unset($_SESSION['DISPLAY']);
    
    // var_dump($component);
    // var_dump ($_POST);
    // var_dump($cre_list);

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
            $_SESSION['DISPLAY'] = $display;
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
                $_SESSION['DISPLAY'] = $display;
            }
            else
            {
                $dao = new EditcreDAO();

                $msg = $dao->editcre($sub_com2, $status2, $reason, $sub_com_old);

                $dao2 = new Editcre2DAO();
                $msg = $dao2->editcre2($sub_com2, $sub_com_old);

                $dao4 = new Editcre4DAO();
                $msg = $dao4->editcre4($sub_com2, $sub_com_old);
                
                
                $_SESSION['MSG'] = $msg;
                $_SESSION['COMP'] = $component;
                $_SESSION['DISPLAY'] = $display;
            }

        }
    }

    header("Location: edit_cre.php");
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