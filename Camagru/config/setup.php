<?php
$pdo = new PDO($DB_DSN,$DB_USER,$DB_PASSWORD);  
   /*try{
      
      include "config/database.php";
      $DB_DSN = 'mysql:host=localhost';
      $pdo = new PDO($DB_DSN,$DB_USER,$DB_PASSWORD);
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
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $pdo = new PDO($DB_DSN,$DB_USER,$DB_PASSWORD);
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
}*/
?>