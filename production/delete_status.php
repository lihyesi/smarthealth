<?php
 if (isset($_SESSION['MSG2']))
 {
     $msg = $_SESSION['MSG2'];
     unset($_SESSION['MSG2']);
     echo $msg;
 }
 else
 {
     echo "no session";
 }
?>