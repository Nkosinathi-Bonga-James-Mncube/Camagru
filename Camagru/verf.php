<?php
include "config/database.php";
include_once "config/connection.php";

  $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
  $value = $_GET['vkey'];
  $sql5 ='UPDATE table1 SET valid = :valid WHERE verf = :verf';
  $stmt = $pdo->prepare($sql5);
  $stmt->execute(['valid' => '1' , 'verf' => $value]);
  $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
  $sql6 = 'SELECT * FROM table1 WHERE verf = ?';
  $stmt = $pdo->prepare($sql6);
  $stmt->execute([$value]);
  $post = $stmt->fetchAll();
  foreach($post as $post)
  {
    $found = $post['valid'];
    echo($found);
    if($found == '1')
    {
        header("Location: http://localhost:8080/Camagru/valid.php");
    }
}

?>