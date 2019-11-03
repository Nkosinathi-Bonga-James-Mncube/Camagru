<?php
session_start();
//$here = 'raharir391@imail8.net';
$here = $_SESSION['email'];
echo($here."<br>");
include "config/database.php";
include "config/setup.php";
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$sql = 'SELECT * FROM table2 WHERE email = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$here]);
$post = $stmt->fetchAll();

foreach($post as $post)
{
    echo '<a href = "#">';
}
/*$k = 1;
while ($k <= 4)
{
    include "grid.html";
    $k++;
}*/
?>