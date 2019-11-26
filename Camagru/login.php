<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" type = "text/css" href ="css/login.css">
</head>
<body>
    <h1>Login</h1>
    <form action="" method="post">
        <h3>username<input type="text" name="login_user" placeholder="username"></h3>
        <h2>password<input type="password" name="login_pass" placeholder="password"></h2>
        <button type="submit" name="login_sub">Login</button>
        <button type="submit" name="gallery_link">View Gallery</button>
    </form>
    <a href = 'http://localhost:8080/Camagru/Signup.php'>Sign-up</a>
    <br>
    <a href = 'http://localhost:8080/Camagru/forgot.php'>Forgot password</a>
</body>
</html>
<?php
if (isset($_POST['login_sub']))
{
    
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);

    $p_found =NULL;
    $login_user = htmlspecialchars(strip_tags(trim($_POST['login_user'])));
    $login_pass = htmlspecialchars(strip_tags(trim($_POST['login_pass'])));
    $sql7 = 'SELECT * FROM table1 WHERE username = ?';
    $stmt = $pdo->prepare($sql7);
    $stmt->execute([$login_user]);
    $post = $stmt->fetchAll();

    foreach($post as $post)
    {
        $p_found = $post['pass'];
        $is_valid = $post['valid'];
        $vkey = $post['verf'];
    }
    if (!$p_found)
    {
        echo("User is not present");
    }
    if (password_verify($login_pass,$p_found) && $p_found)
    {
        if ($is_valid == 1)
        {
            header("Location: http://localhost:8080/Camagru/main.php?vkey=$vkey");
        
       }
      else
        {
            echo ("Please check verification email//send link again");
        }
    }
    else if ($p_found)
    {
        echo ("Incorrect.Please check username and password");
    }
}
if (isset($_POST['gallery_link']))
{
    header("Location:http://localhost:8080/Camagru/P_gallery.php");
}
?>