<?php
require_once 'include/common.php';
require_once('phpmailer/PHPMailerAutoload.php');


// grab user input from $_POST: fullname, email, mobnum --> ---------------------------------------
if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['mobnum']))
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobnum = $_POST['mobnum'];
    $txt = nl2br("Dear Admin(s),
    \r\n". $fullname . " is requesting for an account. Following is the information 
    \r\nFull Name: ".$fullname. "\r\nEmail: " . $email . "\r\nMobile Number: " . $mobnum . "
    \r\nPlease kindly login to User Management in CHRW to Approve/Reject the User.
    \r\n\r\nThank you and stay safe.\r\n\r\nBest Regards,\r\nCHRW Referal Team");

    if (strlen($mobnum) == 8)
    {
        // sending email: lihyesi2@gmail.com    pwd:smarthealth2021
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
        $mail->Subject ='CHRW Account Request';
        $mail->Body = $txt;


        $dao2 = new UsernewDAO();
        $user = $dao2->retrieve($email);
        if ($user != null)
        {
            $msg = 'Request have been submitted by the same person';
        }
        else
        {
            $dao2 = new Usermanagementnew2DAO();
            $admin_list = $dao2->retrieve();
            foreach ($admin_list as $admin)
            {
                $email2 = $admin->getusername();

                $mail->AddAddress($email2);
                if(!$mail->send()) 
                {
                    $msg = 'Message could not be sent.';
                } 
                else 
                {
                    $msg = 'Message is sent.';
                }
                $mail->clearAddresses();
            }

            $dao = new AddnewuserDAO();
            $msg = $dao->adduser($email, $fullname);
            
            
        }

    }
    else
    {
        $msg = "Please check your input, for mobile number it should be less than 8 digit";
    }

}
else
{
    $msg = "Missing information";
}

$_SESSION['MSG2'] = $msg;
header("Location: signup.php");
return;

?>