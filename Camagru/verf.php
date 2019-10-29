<?php
  include "config/database.php";
  include "config/setup.php";
  $value = $_GET['vkey'];
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $sql5 ='UPDATE table1 SET valid = :valid WHERE verf = :verf';
  $stmt = $pdo->prepare($sql5);
  $stmt->execute(['valid' => '1' , 'verf' => $value]);
  $sql6 = 'SELECT * FROM table1 WHERE verf = ?';
  $stmt = $pdo->prepare($sql6);
  $stmt->execute([$value]);
  $post = $stmt->fetchAll();
  foreach($post as $post)
  {
    echo ("done'");
    $found = $post->valid;
    if($found == '1')
    {
        header("Location: http://localhost:8080/Camagru/valid.php");
    }
}

?>