
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Please enter user email<h1>
        <form action="" method="post">
            <h5>email address<input type="text" name="email_enter" placeholder="email"></h5>
            <button type="submit" name="forgot_send">Send</button>
        </form>
        <a href = 'http://localhost:8080/Camagru/login.php'>Login-in</a>
</body>
</html>
<?php

if (isset($_POST['forgot_send']))
{
  

    //include "config/database.php";
    //include "config/setup.php";
    //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    //$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $email_enter = $_POST['email_enter'];
    //echo($email_enter);
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    
    $sql8 = 'SELECT * FROM table1 WHERE email = ?';
    $stmt = $pdo->prepare($sql8);
    $stmt->execute([$email_enter]);
    $post = $stmt->fetchAll();
    foreach($post as $post)
    {
        $email_found = $post->email;
        $vkey = $post->verf;
    }
    if (($email_enter == $email_found) && !(($email_enter == NULL) && ($email_found == NULL)))
    {
        include "forgot_email.php";
        echo ("Password reset email has been sent.Please check your email");
    }
    else
    {
        echo ("The email address doesnt exists");
    }
       
        
}
?>