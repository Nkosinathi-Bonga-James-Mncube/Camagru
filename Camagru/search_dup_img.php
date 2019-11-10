<?php
 function get_image($value)
 {
    include "config/database.php";
    include_once "config/connection.php";
     $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
     $n_found = NULL;
     $sql11 = 'SELECT pic_location FROM images WHERE pic_location = ?';
     $stmt = $pdo->prepare($sql11);
     $stmt->execute([$value]);
     $post = $stmt->fetchAll();
     foreach($post as $post)
     {
         $n_found = $post['pic_location'];
     }
     return ($n_found);
 }
?>