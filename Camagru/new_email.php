<?php
if (!$_SESSION['verf_no'])
{
    header("Location: localhost:8080/Camagru/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" type= "text/css" href = "css/tabs.css">
    <link rel = "stylesheet" type = "text/css" href = "css/login.css">
</head>
<body>
<nav>
        <ul>
        <li><a href = 'http://localhost:8080/Camagru/main.php'>Back to main</a></li>
        <li><a href="new_pass.php">Change Password</a></li>
        <li><a href="change_username.php">Change Username</a></li>
        <li><a href="upload.php">Upload images</a></li>
        <li><a href="grid.php">Gallery Edit page</a></li>
        <li><a href = 'http://localhost:8080/Camagru/index.php'>Logout</a></li>
        
        </ul>
</nav>
    <h1>Please enter user email<h1>
        <form action="" method="post">
            <h5>email address<input type="text" name="email_enter" placeholder="email"></h5>
            <button type="submit" name="forgot_send">Send</button>
        </form>
   
        
</body>
</html>
<?php
include "forgot_email.php";

if (isset($_POST['forgot_send']))
{ 
    $email_enter = $_POST['email_enter'];
    $email_found = NULL;
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    
    $sql8 = 'SELECT * FROM table1 WHERE email = ?';
    $stmt = $pdo->prepare($sql8);
    $stmt->execute([$email_enter]);
    $post = $stmt->fetchAll();
    foreach($post as $post)
    {
        $email_found = $post['email'];
        $vkey = $post['verf'];
    }
    if (($email_enter == $email_found) && !(($email_enter == NULL) && ($email_found == NULL)))
    {
        new_email($email_enter,$vkey);
        echo ("Password reset email has been sent.Please check your email");
    }
    else
    {
        echo ("The email address doesnt exists");
    }
       
        
}
?>