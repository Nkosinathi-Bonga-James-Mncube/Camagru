<html>
<head>
<meta http-equiv="refresh">
<link rel = "stylesheet" type = "text/css" href = "css/login.css">
</head>
<body>
<form action="" method="post">
    <h1><u>Sign-up page</u></h1>
    <h2>user<input type="text" name="create_user" placeholder="Username"></h2>
    <h3>email adress<input type="text" name="create_email" placeholder="email"></h3>
    <h4>password<input type="password" name="create_pass1" placeholder="password"></h4>
    <h5>re-enter password<input type="password" name="create_pass2" placeholder="re-enter password"></h5>
    <button type="submit" name="create_button">Create user</button>
</form>
<a href = 'http://localhost:8080/Camagru/index.php'>Login-in</a>
<br>
</body>
</html>

<?php
include "error_input_check.php";
if (isset($_POST['create_button']))
{
    
        $enter_user = NULL;
        $enter_email = NULL;
        $enter_pass1 = NULL;
        $enter_pass2= NULL;
     
        $enter_user = htmlspecialchars(strip_tags(trim($_POST['create_user'])));
        $enter_email = htmlspecialchars(strip_tags(trim($_POST['create_email'])));
        $enter_pass1 = htmlspecialchars(strip_tags(trim($_POST['create_pass1'])));
        $enter_pass2 = htmlspecialchars(strip_tags(trim($_POST['create_pass2'])));
    if (error_check_input($enter_user,$enter_email,$enter_pass1,$enter_pass2) == -1)
    {
        include "create_user.php";
    }
}

?>