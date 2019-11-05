<?php
 function get_image($value)
 {
     include "config/database.php";
     include "config/setup.php";
     $n_found = NULL;
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
     $sql11 = 'SELECT pic_location FROM table2 WHERE pic_location = ?';
     $stmt = $pdo->prepare($sql11);
     $stmt->execute([$value]);
     $post = $stmt->fetchAll();
     foreach($post as $post)
     {
         $n_found = $post->pic_location;
     }
     return ($n_found);
 }
?>