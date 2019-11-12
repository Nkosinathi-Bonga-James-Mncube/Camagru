<?php
include "database.php";
include "connection.php";

//ini_set('display_errors', 1); 
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$servername = $DB_DSN;
$username = $DB_USER;
$password = $DB_PASSWORD;
$db_name = $DB_NAME;

echo "DB_DSN = $DB_DSN <br/>";
echo "DB_USER = $DB_USER <br/>";
echo "DB_PASSWORD = $DB_PASSWORD <br/>";

   
try {
    $conn = new PDO($servername, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
    $conn->exec($sql);
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

// ADD TABLE TO THE DATABASE
$conn = DB_Connection($servername, $db_name, $username, $password);
if ($conn) {
    echo "Connected to the database. <br/>";
}
else {
    echo "Failed to connect to DB. <br/>";
}

try {
    $sql2 = "CREATE TABLE IF NOT EXISTS table1(
        userID INT NOT NULL AUTO_INCREMENT, username VARCHAR(64),email VARCHAR(64),pass VARCHAR(70),verf VARCHAR(70),valid INT(1),PRIMARY KEY(userID)
        );";
    $conn->exec($sql2);
    echo "Table1 users successfully added. <br/>";   
}
catch (PDOException $ex) {
    echo "ERROR: could add table to database: " . $ex->getMessage(); 
}

try{
    $sql3 = "CREATE TABLE IF NOT EXISTS comments(
        userID INT NOT NULL AUTO_INCREMENT, comments VARCHAR(255),name_img VARCHAR(255),flag int(11),created DATETIME DEFAULT CURRENT_TIMESTAMP,verf_no VARCHAR(64),PRIMARY KEY(userID)
        );";
    $conn->exec($sql3);
    echo "Comments successfully added. <br/>"; 
    //$pdo =  NULL;
}
catch(PDOException $e1)
{
    echo $sql3 . "<br>" . $e1->getMessage();
    $pdo =  NULL;
}
 try{
     $sql4 = "CREATE TABLE IF NOT EXISTS images(
        userID INT NOT NULL AUTO_INCREMENT,verf_code VARCHAR(64),created DATETIME DEFAULT CURRENT_TIMESTAMP,webcam int(11),name_img VARCHAR(255),pic_location VARCHAR(64),PRIMARY KEY(userID)
                );";
                 
            $conn->exec($sql4);
            echo "images successfully added. <br/>";
        }
catch(PDOException $e4)
{
    echo $sql2 . "<br>" . $e4->getMessage();
    $pdo =  NULL;
}

try{
    $sql4 = "CREATE TABLE IF NOT EXISTS Likes(
       userID INT NOT NULL AUTO_INCREMENT,name_img VARCHAR(255),verf_code VARCHAR(64),flag int(11) DEFAULT '0',likes int(11),PRIMARY KEY(userID)
               );";
                
           $conn->exec($sql4);
           echo "Likes successfully added. <br/>";
       }
catch(PDOException $e4)
{
   echo $sql2 . "<br>" . $e4->getMessage();
   $pdo =  NULL;
} 
?>