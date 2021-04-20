<?php

    session_start();
    
    // clear all SESSION
    session_unset();
    session_destroy();

    // redirect user back to index.php (login page/landing page)
    header('Location: ../index.php');
    return;
?>