<?php
session_start();
include "config/database.php";
include "config/setup.php";
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$sql1 = 'SELECT * FROM table1 WHERE verf = ?';
$stmt = $pdo->prepare($sql1);
$stmt->execute([$vkey]);
$post = $stmt->fetchAll();
$vkey = $_GET['vkey'];
foreach($post as $post){
    $vkey_check = $post->verf;
    $_name_hold = $post->username;
}
$_SESSION['username'] =$_name_hold;
?>
<html>
    <head>
    </head>

    <body>   
    <nav>
        <ul>
        <li><a href="logout.php">Log-out</a></li>
        <li><a href="forgot.php">Fogot Password</a></li>
        <li><a href="upload.php">Upload images</a></li>
        </ul>
        <div >
            <h1>Hello <?php echo($_SESSION['username'])?></h1>
        </div>
    </nav>
    </body>
</html>