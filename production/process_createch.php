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

    if (isset($_POST['comhos_name']) && isset($_POST['comhos_short']) && isset($_POST['comhos_address']) && isset($_POST['comhos_contact']) && isset($_POST['comhos_fax']))
    {
        var_dump($_POST);

        $comhos_name = $_POST['comhos_name'];
        $comhos_name_new = strtolower(str_replace(" ","_",$comhos_name));
       

        $comhos_short = $_POST['comhos_short'];
        $comhos_short_new = strtoupper(str_replace(" ","",$comhos_short));
        if (strlen($comhos_short_new)>5)
        {
            $msg = "<div style='color:red;'>Community Hospital Shortform character should be limited to maximum 5 without space.</div>";
            $_SESSION['MSG'] = $msg;
            header("Location: add_comhos.php");
            return;
            // echo strlen($comhos_short_new);
        }


        $comhos_address = $_POST['comhos_address'];
        $comhos_address_new = strtoupper($comhos_address);


        $comhos_contact = $_POST['comhos_contact'];
        if(is_numeric($comhos_contact) == FALSE)
        {
            $msg = "<div style='color:red;'>Please make sure Contact is number format.</div>";
            $_SESSION['MSG'] = $msg;
            header("Location: add_comhos.php");
            return;
        }
        else if (strlen($comhos_contact)>8)
        {
            $msg = "<div style='color:red;'>Please make sure Contact is 8 digit only.</div>";
            $_SESSION['MSG'] = $msg;
            header("Location: add_comhos.php");
            return;
        }


        $comhos_fax = $_POST['comhos_fax'];
        if (empty($comhos_fax))
        {
            $comhos_fax = '0';
        }
        else if(is_numeric($comhos_fax) == FALSE)
        {
            $msg = "<div style='color:red;'>Please make sure Fax is number format.</div>";
            $_SESSION['MSG'] = $msg;
            header("Location: add_comhos.php");
            return;
        }
        else if (strlen($comhos_fax)>8)
        {
            $msg = "<div style='color:red;'>Please make sure Fax is 8 digit only.</div>";
            $_SESSION['MSG'] = $msg;
            header("Location: add_comhos.php");
            return;
        }
        
        echo $comhos_name_new."<br>";
        echo $comhos_short_new."<br>";
        echo $comhos_address_new."<br>";
        echo $comhos_contact."<br>";
        echo $comhos_fax."<br>";

        $dao3 =new Ch4DAO();
        $priority = $dao3->retrieve();
        var_dump ($priority);
        $max_pri = $priority['MAX(priority2)'] + 1;
        $max_privnh = $priority['MAX(priority_vnh)'] + 1;

        echo $max_pri;
        echo $max_privnh;


        $dao2 = new Ch3DAO();
        $ch = $dao2->retrieve($comhos_name_new);





        if ($ch !=null)
        {
            $msg = "<div style='color:red;'>Community Hospital exist. Please change to another Community Hospital Name</div>";
            $_SESSION['MSG'] = $msg;
            // header("Location: add_comhos.php");
            // return;
        }
        else
        {
            $dao4 = new Addch2DAO();

            $msg = $dao4->addch2($comhos_name_new);
            
            
            $dao = new AddchDAO();

            $msg = $dao->addch($comhos_name_new, $comhos_short_new, $comhos_address_new, $comhos_contact, $comhos_fax, $max_pri, $max_privnh);



        }


        


    }

    else
    {
        $msg = "Missing information";
    }
    
    $_SESSION['MSG'] = $msg;
    header("Location: add_comhos.php");
    return;


?>