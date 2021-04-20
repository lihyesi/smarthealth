<?php

require_once 'include/common.php';

$dao = new UserDAO();


// Form processing

$password = '';
$name = '';
$role = '';



if (isset($_POST['username'])&& isset($_POST['pass']))
{
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    // var_dump($_POST);

    
    //retrieve username and password from database
    $user = $dao->retrieve($username);
    
    // check if user exist
    if ($user != null)
    {
        $password = $user->getpassword();
        $name = $user->getname_of_user();
        $role = $user->getrole();

        // Authentication
        // if ($pass == $password)
        if (password_verify($pass, $password))
        {
            $_SESSION['USER'] = $name;
            $_SESSION['ROLE'] = $role;
            $_SESSION['USERNAME'] = $username;

            header("Location: querypage.php");
            return;
        }
        else
        {
            $msg = "Wrong password";
            $_SESSION['FAIL'] = $msg;
            header("Location: ../index.php");
            return;
        }
    }
    else
    {
        $msg = "User does not exist";
        $_SESSION['FAIL'] = $msg;
        header("Location: ../index.php");
        return;
    }

}


?>