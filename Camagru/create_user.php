<?php
include "search_dup.php";
include "remove.php";

$enter_user = htmlspecialchars(strip_tags(trim($_POST['create_user'])));
$enter_email = htmlspecialchars(strip_tags(trim($_POST['create_email'])));
$enter_pass1 = htmlspecialchars(strip_tags(trim($_POST['create_pass1'])));
$bfound = NULL;
$h_pass = password_hash($enter_pass1,PASSWORD_DEFAULT);


try{
    include "config/database.php";
    $DB_DSN = 'mysql:host=localhost';
    include "config/setup.php";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="CREATE DATABASE IF NOT EXISTS data1";
    $pdo->exec($sql);
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
    $pdo =  NULL;
}

try{
    include "config/database.php";
    include "config/setup.php";
    $sql2 = "CREATE TABLE IF NOT EXISTS table1(
        userID INT NOT NULL AUTO_INCREMENT, username VARCHAR(64),email VARCHAR(64),pass VARCHAR(70),verf VARCHAR(70),valid INT(1),PRIMARY KEY(userID)
        );";
    $pdo->exec($sql2);
    $pdo =  NULL;
}
catch(PDOException $e1)
{
    echo $sql2 . "<br>" . $e1->getMessage();
    $pdo =  NULL;
} 
$vkey = md5(time().$enter_user);
if (search_dup($enter_email,$enter_user) == NULL)
{
    try
    {
        include "config/setup.php";
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $sql3 = $pdo->prepare("INSERT INTO table1 (username,email,pass,verf,valid) VALUES (:username,:email,:pass,:verf,:valid)");
        $sql3->execute(['username'=>$enter_user,'email'=>$enter_email,'pass'=>$h_pass,'verf'=>$vkey,'valid'=>'0']);
        include "send_verf.php";

    }
    catch(PDOException $e2)
    {
        echo $sql2 . "<br>" . $e2->getMessage();
        $pdo =  NULL;
    }
}
?>