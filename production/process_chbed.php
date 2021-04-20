<?php

require_once 'include/common.php';

// var_dump($_SESSION['CH']);


if (isset($_SESSION['CH']))
{
    $ch = $_SESSION['CH'];
    unset($_SESSION['CH']);
    foreach ($ch as $ch_name)
    {
        // echo $ch_name.":<br>";
        $pm = $_POST[$ch_name.'_pm'];
        $pf = $_POST[$ch_name.'_pf'];
        $sm = $_POST[$ch_name.'_sm'];
        $sf = $_POST[$ch_name.'_sf'];
        $lastupdate = $_POST[$ch_name.'_date'];

        // echo $ch_name." has ".$pm. "Private Male bed<br>";
        // echo $ch_name." has ".$pf. "Private Female bed<br>";
        // echo $ch_name." has ".$sm. "Subsidised Male bed<br>";
        // echo $ch_name." has ".$sf. "Subsidised Female bed<br>";

        $dao = new EditbedDAO();
        $msg = $dao->editbed($pm, $pf, $sm, $sf, $ch_name);

        $dao2 = new EditlastupdateDAO();
        $msg = $dao2->editdate($lastupdate, $ch_name);

        
    }
    header("Location: ch_bed_avail.php");
    return;  

}
else
{
    $msg = "Missing information";
    header("Location: ch_bed_avail.php");
    return;  
}
    




?>