<?php
session_start();

?>
<html>
<head>
</head>
<body>
    <h1>Change Username</h1>
    <form action="" method="post">
        <h2>username<input type="text" name="old_user" placeholder="email"></h2>
        <h2>new username<input type="text" name="new_user1" placeholder="password"></h2>
        <h3>re-enter username<input type="text" name="new_user2" placeholder="re-enter password"></h3>
        <button type="submit" name="new_user">Change email</button>
    </form>
    <nav>
        <ul>
        <li><a href="main.php">Back to main</a></li>
        </ul>
    </nav>
</body>
</html>
<?php
$old_user= trim($_POST['old_user']);
$new_user1 = trim($_POST['new_user1']);
$new_user2 = trim($_POST['new_user2']);

if (isset($_POST['new_user']))
{
    include "config/database.php";
    include "config/setup.php";
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $sql11 = 'SELECT * FROM table1 WHERE username = ?';
    $stmt = $pdo->prepare($sql11);
    $stmt->execute([$old_user]);
    $post = $stmt->fetchAll();
    
    foreach($post as $post)
    {
        $username_found = $post->username;
        $email_found = $post->email;
    }
    if (($new_user1 == $new_user2) && ($username_found == $old_user))
    {
        $sql2 ='UPDATE table1 SET username = :username WHERE email = :email';
        $stmt1 = $pdo->prepare($sql2);
        $stmt1->execute(['email'=>$email_found,'username' => $new_user1]);
        echo ("Username is changed");
    }
    else
    {
        echo("Possbile issues :". "<br>");
        echo ("1.New usernames do not match. Please re-enter"."<br>");
        echo ("2.Old username is incorrect/doesnt exist.Please re-enter"."<br>");
    }
}