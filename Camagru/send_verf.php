<?php

$to = $enter_email;
$subject = "Verfication email";
$txt = "Hi $enter_user, please click the link to verify you have registered to this site.Thank you!<a href = 'http://localhost:8080/Camagru/smail/ver.php?vkey=$vkey'>Registration</a>";
$headers = "From:nonreply@localhost:8080 \r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if (mail($to,$subject,$txt,$headers))
{
    echo ("Verfication email has been sent.Please check your email");
}
else
{
    echo ("There has been an issue sending your email. Please try again");
}
?>
