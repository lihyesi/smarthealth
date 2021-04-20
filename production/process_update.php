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

if (isset($_POST['email'])&& isset($_POST['cpassword']) && isset($_POST['name']))
{
    $username = $_POST['email'];
    $pass = $_POST['cpassword'];
    $name = $_POST['name'];
    
    //username not change, no need to check username ----------------------------------------------------------------------------------------------------
    if ($username == $old_username)
    {
        $dao = new UserDAO();
        $user = $dao->retrieve($username);
        $password = $user->getpassword();

        
        
        // Authentication
        if (password_verify($pass, $password))
        {
            //check if password is changed ------------------------------------------------------
            if(empty($_POST['npassword']))
            {
                //password remains, update new info -------------------------------
                $dao = new EdituserDAO();

                $msg = $dao->edituser($name, $username, $old_username);
                $_SESSION['MSG'] = $msg;
                header("Location: profile_edit.php");
                return;  
            }

            else
            {
                //there is change of password -------------------------------------
                // echo "here";
                $pass2 = $_POST['npassword'];
                $pass3 = password_hash($pass2, PASSWORD_DEFAULT);
                // echo $pass3;

                //update new info
                $dao = new EdituserpassDAO();

                $msg = $dao->edituserpass($name, $username, $pass3, $old_username);
                $_SESSION['MSG'] = $msg;
                header("Location: profile_edit.php");
                return;  
            }
        }
        else
        {
            $msg = "Wrong password";
            $_SESSION['MSG'] = $msg;
            header("Location: profile_edit.php");
            return;  
        }
    }



// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    //change username, need to check if new username exist ----------------------------------------------------------------------------
    else
    {
        $dao = new UserDAO();
        $user = $dao->retrieve($username);
        if ($user !=null)
        {
            //username exist, cannot update the username --------------------------------------------
            $msg = "<div style='color:red;'>Username exist. Please change to another username</div>";
            $_SESSION['MSG'] = $msg;
            header("Location: profile_edit.php");
            return;
        }
        else
        {
            //username does not exist, proceed with update
            $user2 = $dao->retrieve($old_username);
            $password = $user2->getpassword();

            // Authentication
            if (password_verify($pass, $password))
            {
                //check if password is changed
                if(empty($_POST['npassword']))
                {
                    //password remains, update new info
                    $dao = new EdituserDAO();

                    $msg = $dao->edituser($name, $username, $old_username);
                    $_SESSION['MSG'] = $msg;
                    header("Location: profile_edit.php");
                    return;  
                }
                else
                {
                    //there is change of password -------------------------------------
                    $pass2 = $_POST['npassword'];
                    $pass3 = password_hash($pass2, PASSWORD_DEFAULT);

                    //update new info
                    $dao = new EdituserpassDAO();

                    $msg = $dao->edituserpass($name, $username, $pass3, $old_username);
                    $_SESSION['MSG'] = $msg;
                    header("Location: profile_edit.php");
                    return;
                }  
            }
            else
            {
                
                $msg = "Wrong password";
                $_SESSION['MSG'] = $msg;
                header("Location: profile_edit.php");
                return;
            }
        }
    }
}
else
{
    $msg = "Missing information";
    $_SESSION['MSG'] = $msg;
    header("Location: profile.php");
    return;
}




?>