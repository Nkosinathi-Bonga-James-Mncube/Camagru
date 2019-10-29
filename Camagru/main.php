<?php
session_start();
include "config/database.php";
include "config/setup.php";
$vkey = $_GET['vkey'];
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$sql1 = 'SELECT * FROM table1 WHERE verf = ?';
$stmt = $pdo->prepare($sql1);
$stmt->execute([$vkey]);
$post = $stmt->fetchAll();
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
        <li><a href="forgot.php">Change Password</a></li>
        <li><a href="email_change.php">Change Email</a></li>
        <li><a href="change_username.php">Change Username</a></li>
        <li><a href="upload.php">Upload images</a></li>
        
        </ul>
        <div >
            <h1>Hello <?php echo($_SESSION['username'])?></h1>
        </div>
    </nav>
    </body>
</html>