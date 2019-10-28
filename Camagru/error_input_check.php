<?php
 function error_check_input($enter_user,$enter_email,$enter_pass1,$enter_pass2)
 {
     $up = preg_match('@[A-Z]@',$enter_pass1);
     $lo = preg_match('@[a-z]@',$enter_pass1);
     $sp = preg_match('@[^\w]@',$enter_pass1);

     if ($enter_pass1 != $enter_pass2)
     {
         echo ('Password are not identical');
         return (1);
     }
     else if (strlen ($enter_pass1) <= 8)
     {
         echo ('Password must be 8 characters or greater'."<br>");
         return(1);
     }
     if ($enter_user == NULL || $enter_email == NULL || $enter_pass1 == NULL || $enter_pass2 == NULL)
     {
         
         echo ("Please check username,surname,password are entered"."<br>");
         return(1);
     }
     else if (preg_match('/\s/',$enter_user) || preg_match('/\s/',$enter_email))
     {
         echo ("There are space in username or password". "<br>");
         return(1);
     }
     else if (!$up |!$lo|!$sp)
     {
         echo ("Weak password.Please make sure passsword has:"."<br>");
         echo ("> At least one uppercase"."<br>");
         echo ("> At least one lowercase"."<br>");
         echo ("> At least one special character"."<br>");
         return(1);
     }
     else if (!filter_var($enter_email,FILTER_VALIDATE_EMAIL))
     {
         echo("Please enter valid email address". "<br>");
         return(1);
     }
     else
     {
         return(-1);
     }
 
 }
?>