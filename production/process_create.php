<?php
require_once 'include/common.php';
require_once('phpmailer/PHPMailerAutoload.php');

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

    // grab user input from $_POST: 1) username, 2) pass ---------------------------------------
    if (isset($_POST['name']) && isset($_POST['role']) && isset($_POST['username']) && isset($_POST['password']))
    {
        $name = $_POST['name'];
        $role = $_POST['role'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass = password_hash($password, PASSWORD_DEFAULT);

        $email = $username;
        $role2 = ucwords($role);
        $txt = nl2br("Dear ". $name .",
        \r\n Your request for an account is approved. Following is the information 
        \r\nFull Name: ".$name. "\r\nEmail: " . $email . "\r\nRole: " . $role2 . "\r\nPassword: ". $password ."
        \r\nPlease kindly change your password once login.
        \r\n\r\nThank you and stay safe.\r\n\r\nBest Regards,\r\nCHRW Referal Team");

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = 'lihyesi2@gmail.com';
        $mail->Password = 'smarthealth2021';

        $mail->SetFrom('lihyesi2@gmail.com');
        $mail->Subject ='CHRW Account Approved';
        $mail->Body = $txt;
        $mail->AddAddress($email);

        // Authentication ---------------------------------------------------------------------------
        
        $dao2 = new UserDAO();
        $user = $dao2->retrieve($username);
        if ($user !=null)
        {
            $msg = "<div style='color:red;'>Username exist. Please change to another username</div>";
        }
        else
        {
            if(!$mail->send()) 
            {
                $msg = 'Message could not be sent.';
            } 
            else 
            {
                $dao2 = new RejectuserDAO();
                $msg = $dao2->delete($email);

                $dao = new AdduserDAO();
                $msg = $dao->adduser($name, $role, $username, $pass);
            }
        }

    }

    else
    {
        $msg = "Missing information";
    }
    
    $_SESSION['MSG'] = $msg;
    header("Location: add_user.php");
    return;

// $error = [];


?>