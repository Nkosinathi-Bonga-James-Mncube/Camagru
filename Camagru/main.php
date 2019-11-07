<?php
session_start();
//include "get_name.php";
if(!isset($_SESSION['verf_no']))
{

    include "get_name.php";
    //include "config/database.php";
    //include "config/setup.php";
    //include "get_name.php";
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $vkey = $_GET['vkey'];
    //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $sql1 = 'SELECT * FROM table1 WHERE verf = ?';
    $stmt = $pdo->prepare($sql1);
    $stmt->execute([$vkey]);
    $post = $stmt->fetchAll();
    foreach($post as $post){
        $vkey_check = $post['verf'];
        $_name_hold = $post['username'];
        //$vkey_check = $post->verf;
        //$_name_hold = $post->username;
    }
    $_SESSION['verf_no'] = $vkey_check;
    //$_SESSION['verf_no'] = $_GET['vkey'];
      //$here = get_name($vkey_check);
    echo($_SESSION['verf_no']);
}
?>
<html>
    <head>
    </head>

    <body>   
    <nav>
        <ul>
        
        <li><a href="forgot.php">Change Password</a></li>
        <li><a href="email_change.php">Change Email</a></li>
        <li><a href="change_username.php">Change Username</a></li>
        <li><a href="upload.php">Upload images</a></li>
        <li><a href="grid.php">Gallery Edit page</a></li>
        <li><a href="logout.php">Log-out</a></li>
        
        </ul>
        <div >
            <h1>Hello!</h1>
        </div>
    </nav>
    </body>
</html>