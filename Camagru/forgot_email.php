<?php
$to = "$email_enter";
$subject = "New password";
$txt = "Hi $email_enter , click here to get new password<a href = 'http://localhost:8080/Camagru/new_pass.php?vkey=$vkey'>Enter new Password</a>";
$headers = "From:nonreply@localhost:8080 \r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
if (!mail($to,$subject,$txt,$headers))
{
    echo ("There has been an issue sending your email. Please try again");
}
?>