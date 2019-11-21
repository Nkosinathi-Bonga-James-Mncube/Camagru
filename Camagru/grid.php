<?php
session_start();

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include "likes.php";

?>
<html>
<head>
    <link rel = "stylesheet" href="css/style.css">
</head>
<body>

<nav>
        <ul>
        <li><a href="logout.php">Log-out</a></li>
        <li><a href="forgot.php">Change Password</a></li>
        <li><a href="email_change.php">Change Email</a></li>
        <li><a href="change_username.php">Change Username</a></li>
        <li><a href="upload.php">Upload images</a></li>
        <li><a href="main.php">Back to main</a></li>
        <form action="" method = "post">
        <input type = "checkbox" name = "note" <?php if (get_note_flag() == 1) echo "checked=checked"; note_flag(get_note_flag())?>/>Receive email notification<br>
        <button type = "submit" name = "confirm">Confirm</button><br> 
        </form>
        </ul>
        <div >
            <h1><u>Public Gallery Section</u></h1>
            <form action = "" method = "post" >
            <button name = "Prev">Return</button>
            <button name = "Next">Next</button>
            </form>
            
        </div>
    </nav>
<section class="container">
    <div class="gallery-container">
        <?php
        if (!isset($_POST['Next']))
        {
            $_SESSION['num'] = -5;
        }
        if ( $_SESSION['num'] >= -5 && $_SESSION['num'] +5  <= ft_count())
        {
            $_SESSION['num']++;
            $_SESSION['num']++;
            $_SESSION['num']++;
            $_SESSION['num']++;
            $_SESSION['num']++;
        }
       display_images();    
        ?>    
    </div>
</section>
</body>
</html>
<?php
    function ft_count()
    {
        include "config/database.php";
        include_once "config/connection.php";
        $pdo = DB_Connection($DB_DSN,$DB_NAME, $DB_USER,$DB_PASSWORD);
        $sql = 'SELECT * FROM images';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['1']);
        $value = $stmt->rowCount();
        return($value);
    }
 function display_images()
 {
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    //echo($num);
   $sql = 'SELECT * FROM images ORDER BY created DESC LIMIT '.$_SESSION['num'].',5' ;
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['verf_no']]);
   $post = $stmt->fetchAll();
   
   foreach($post as $post)
   {
       $file_pic = pathinfo($post['pic_location']);
        echo'<a href = http://localhost:8080/Camagru/comments.php?p='.$file_pic['filename'].'>
       <div style="background-image:url('.$post['pic_location'].');"></div>
       <p>'.$file_pic['filename'].'</p>
       </a>';
   }
 }
if (isset($_POST['confirm']))
{ 
   
    if (isset($_POST['note'])){
        $status = true;
        note_flag($status);
    }else{
        note_flag($status);
    }
    header("Refresh:0");
}
?>