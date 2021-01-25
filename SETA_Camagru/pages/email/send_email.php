<?php
function send_verf_mail($enter_email,$enter_user,$vkey)
{
    $to = $enter_email;
    $subject = "Verfication email - Camagru ";
    $txt = "Hi $enter_user,<br> Please click the link to verify you have registered to this site.Thank you!<a href = 'http://localhost:8080/Camagru/SETA_Camagru/pages/validation/verf.php?vkey=$vkey'>Registration</a>";
    $headers = "From:nonreply@localhost:8080 \r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $mail_status =mail($to,$subject,$txt,$headers);
    if ($mail_status == true)
    {
        echo ("Verfication email has been sent.Please check your inbox");
        echo $mail_status;
    }
    else
    {
        echo ("There has been an issue sending your email. Please try again");
    }
    return ($mail_status);
}
function send_forgot_pass_mail($email_enter,$username,$vkey)
{
    $to = $email_enter;
    $subject = "Resetting password - Camagru";
    $txt = "Hi $username,<br> Click here to get new password : <a href = 'http://localhost:8080/Camagru/SETA_Camagru/pages/change_details.php?vkey=$vkey'>Enter new Password</a>";
    $headers = "From:nonreply@localhost:8080 \r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $mail_status =mail($to,$subject,$txt,$headers);
    if ($mail_status == true)
    {
        echo ("Password reset email has been sent.Please check your inbox");
        return "sent";
    }
    else
    {
        echo ("There has been an issue sending your email. Please try again");
    }
    return "failed";

}

?>