<?php
function search_dup($enter_email,$enter_user)
{
    
    include "config/database.php";
    include "config/setup.php";
    $bfound = NULL;
    //$pdo = new PDO($DB_DSN,$DB_USER,$DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $sql4 = 'SELECT * FROM table1 WHERE email = :email OR username = :username';
    $stmt = $pdo->prepare($sql4);
    $stmt->execute(['email'=>$enter_email,'username'=>$enter_user]);
    $post = $stmt->fetchAll();
    foreach($post as $post)
    {
        $e_found = $post->email;
        $n_found = $post->username;
    }
    if ($enter_email == isset($e_found) | $enter_user == isset($n_found))
    {
        echo("User already exist. Please enter another username or email address");
        $bfound ="Found";
    }
    return ($bfound);
}

?>