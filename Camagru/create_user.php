<?php

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$enter_user = htmlspecialchars(strip_tags(trim($_POST['create_user'])));
$enter_email = htmlspecialchars(strip_tags(trim($_POST['create_email'])));
$enter_pass1 = htmlspecialchars(strip_tags(trim($_POST['create_pass1'])));
$bfound = NULL;
$h_pass = password_hash($enter_pass1,PASSWORD_DEFAULT);
$vkey = md5(time().$enter_user);
//echo ($enter_user. "<br>");

include_once "search_dup.php";
include_once "config/database.php";
include_once "config/connection.php";
if (search_dup($enter_email,$enter_user) == NULL)
{
    //echo "Search for dub. <br/>";
    try
    {
        // include_once "config/database.php";
        // include_once "config/connection.php";
        
        //echo "DB_DSN = $DB_DSN <br/>";
        //echo "DB_USER = $DB_USER <br/>";
        //echo "DB_PASSWORD = $DB_PASSWORD <br/>";
        
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
       
        //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $sql3 = $pdo->prepare("INSERT INTO table1(username,email,pass,verf,valid) VALUES (:username,:email,:pass,:verf,:valid)");
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