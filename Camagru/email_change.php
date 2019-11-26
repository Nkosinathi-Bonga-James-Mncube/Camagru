<!DOCTYPE html>
<html>
<head>
</head>
<body>
<nav>
    <ul>
    <li><a href="logout.php">Log-out</a></li>
    <li><a href="main.php">Back to main</a></li>
    </ul>
    </nav>
    <h1>New Email address</h1>
    <form action="" method="post">
        <h2>email<input type="text" name="old_email" placeholder="email"></h2>
        <h2>new email<input type="text" name="new_email1" placeholder="password"></h2>
        <h3>re-enter email<input type="text" name="new_email2" placeholder="re-enter password"></h3>
        <button type="submit" name="new_email">Change email</button>
    </form>
   
</body>
</html>
<?php


if (isset($_POST['new_email']))
{
    
    $email1= htmlspecialchars(strip_tags(trim($_POST['old_email'])));
    $new_email1 = htmlspecialchars(strip_tags(trim($_POST['new_email1'])));
    $new_email2 = htmlspecialchars(strip_tags(trim($_POST['new_email2'])));
    
    include "config/database.php";
    include_once "config/connection.php";
    
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql10 = 'SELECT * FROM table1 WHERE email = ?';
    $stmt = $pdo->prepare($sql10);
    $stmt->execute([$email1]);
    $post = $stmt->fetchAll();

    
    foreach($post as $post)
    {
        $email_found2 = $post['email'];
        $name_found = $post['username'];
    }
    include "error_input_check.php";
    if (filter_var($new_email1,FILTER_VALIDATE_EMAIL) && ($new_email1 == $new_email2) && (isset($email_found2) == $email1) && search_dup_new_name($new_email1,NULL) == NULL)
    {
        include "config/database.php";
        include_once "config/connection.php";
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        
        $sql2 ='UPDATE table1 SET email = :email WHERE username = :username';
        $stmt1 = $pdo->prepare($sql2);
        $stmt1->execute(['email'=>$new_email1,'username' => $name_found]);
        echo ("Email changed");
    }
    else
    {
        echo("Possbile issues :". "<br>");
        echo ("1.New email address do not match. Please re-enter"."<br>");
        echo ("2.Old Email is incorrect/doesnt exist.Please re-enter"."<br>");
        echo ("3.Email address has already been taken.Please re-enter new email address"."<br>");
        echo ("4.Email address is invaid format.Please re-enter"."<br>");
    }
}


?>