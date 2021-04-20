<?php

require_once 'include/common.php';

// var_dump($_SESSION['CH']);


if (isset($_SESSION['CH']))
{
    $ch = $_SESSION['CH'];
    unset($_SESSION['CH']);

    var_dump($ch);

    foreach ($ch as $ch_name2)
    {
        $shortform = $_POST[$ch_name2.'_shortform'];
        $address = $_POST[$ch_name2.'_address'];
        $contact = $_POST[$ch_name2.'_contact'];
        $fax = $_POST[$ch_name2.'_fax'];
        $ch_status = $_POST[$ch_name2.'_status'];
        $ch_status_old = $_POST[$ch_name2.'_status_old'];

        if ($ch_status == 'hide')
        {
            $pri = '0';
            $pri_vnh = '0';
            $dao = new EditpriDAO();
            $msg = $dao->editpri($ch_name2, $pri, $pri_vnh);
        }
        else if(trim($ch_status) != trim($ch_status_old))
        {
            $dao3 =new Ch4DAO();
            $priority = $dao3->retrieve();
            $pri = $priority[0] + 1;
            $pri_vnh = $priority[1] + 1;
            $dao = new EditpriDAO();
            $msg = $dao->editpri($ch_name2, $pri, $pri_vnh);
        }
      



        if(strlen($contact)>8)
        {
            $msg = "<div style='color:red;'>One of the Community Hospital contact is more than 8 number</div>";
            $_SESSION['MSG'] = $msg;
            header("Location: ch_check.php");
            return;
        }
        else if(strlen($fax)>8)
        {
            $msg = "<div style='color:red;'>One of the Community Hospital fax number is more than 8 number</div>";
            $_SESSION['MSG'] = $msg;
            header("Location: ch_check.php");
            return; 
        }
        else
        {
            $dao2 = new Ch3DAO();
            $msg = $dao2->retrieve($ch_name2);
            if ($msg != null)
            {
                // $msg2 = "got record<br>";
                // echo  $shortform."<br>";
                // echo  $address."<br>";
                // echo  $contact."<br>";
                // echo  $fax."<br>";
                // echo  $ch_status."<br>";
                // echo  $ch_name2."<br>";
                
                $dao = new EditchDAO();
                $msg = $dao->editch($shortform, $address, $contact, $fax, $ch_status, $ch_name2);
                // var_dump($msg);
            }
            else
            {
                $msg = "<div style='color:red;'>No Record found</div>";
                $_SESSION['MSG'] = $msg;
                header("Location: ch_check.php");
                return;
            }

            // echo $ch_name2;
            // $dao = new EditchDAO();
            // echo $ch_name2;

            // $msg = $dao->editch($shortform, $address, $contact, $fax, $ch_status, $ch_name2);
            // $_SESSION['MSG'] = $msg;
            // echo $msg;
            // header("Location: ch_management.php");
            // return;
        }
        
    }
    $_SESSION['MSG'] = $msg;
    header("Location: ch_check.php");
    return;  

}
else
{
    $msg = "<div style='color:red;'>Missing information</div>";
    $_SESSION['MSG'] = $msg;
    header("Location: ch_check.php");
    return;  
}
    




?>