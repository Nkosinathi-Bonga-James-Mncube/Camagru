<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" type= "text/css" href = "css/tabs.css">
    <link rel = "stylesheet" type = "text/css" href = "css/login.css">
</head>
<body>
<nav>
    <ul>
    <li><a href="main.php">Back to main</a></li>
    <li><a href="new_email.php">Change Email</a></li>
    <li><a href="change_username.php">Change Username</a></li>
    <li><a href="upload.php">Upload images</a></li>
    <li><a href="grid.php">Gallery Edit page</a></li>

    <li><a href="logout.php">Log-out</a></li>
    </ul>
    </nav>
    <h1>New Password</h1>
    <form action="" method="post">
        <h2>email<input type="text" name="email_new" placeholder="email"></h2>
        <h2>new password<input type="password" name="email_pass1" placeholder="password"></h2>
        <h3>re-enter password<input type="password" name="email_pass2" placeholder="re-enter password"></h3>
        <button type="submit" name="new_sub">Login</button>
    </form>
  

</body>
</html>
<?php
if (isset($_POST['email_new']) &&  isset($_POST['email_pass1']) && isset($_POST['email_pass1']))
{
    $email1= htmlspecialchars(strip_tags(trim($_POST['email_new'])));
    $pass1 = htmlspecialchars(strip_tags(trim($_POST['email_pass1'])));
    $pass2 = htmlspecialchars(strip_tags(trim($_POST['email_pass2'])));
}
include "error_input_check.php";
if (isset($_POST['new_sub']) && error_check_input("Empty",$email1,$pass1,$pass2) == -1)
{
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);

    $sql9 = 'SELECT * FROM table1 WHERE email = ?';
    $stmt = $pdo->prepare($sql9);
    $stmt->execute([$email1]);
    $post = $stmt->fetchAll();
    
    foreach($post as $post)
    {
        $email_found = $post['email'];
        $vkey1 = $post['verf'];
    }
    if (($pass1 == $pass2) && ($email_found == $email1) && ($vkey1 == $_GET['vkey']))
    {
        $h_pass = password_hash($pass1,PASSWORD_DEFAULT);

        include "config/database.php";
        include_once "config/connection.php";
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        
        $sql2 ='UPDATE table1 SET pass = :pass WHERE email = :email';
        $stmt1 = $pdo->prepare($sql2);
        $stmt1->execute(['pass'=>$h_pass,'email' => $email1]);
        echo ("Password changed");
    }
    else
    {
        echo("Possbile issue :". "<br>");
        echo ("1.Passwords does not match. Please re-enter"."<br>");
        echo ("2.Email is incorrect/doesnt exist.Please re-enter"."<br>");
        echo ("3.Verfication email doesnt match email address.Please click on forgot password section   "."<br>");
    }
}
?>