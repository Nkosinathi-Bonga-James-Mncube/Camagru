<?php
session_start();
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
        </ul>
        <div >
            <h1><u>Gallery Section</u></h1>
        </div>
    </nav>
<section class="container">
    <div class="gallery-container">
        <?php
       //include "config/database.php";
       //include "config/setup.php";
       //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        include "config/database.php";
        include_once "config/connection.php";
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);

       //$sql = 'SELECT * FROM table2 WHERE verf_code = ?';
       $sql = 'SELECT * FROM images ORDER BY created DESC';
       $stmt = $pdo->prepare($sql);
       $stmt->execute([$_SESSION['verf_no']]);
       $post = $stmt->fetchAll();
       
       foreach($post as $post)
       {
           $file_pic = pathinfo($post['pic_location']);
           //$file_pic = pathinfo($post->pic_location);
            echo'<a href = http://localhost:8080/Camagru/comments.php?p='.$file_pic['filename'].'>
           <div style="background-image:url('.$post['pic_location'].');"></div>
           <p>'.$file_pic['filename'].'</p>
           </a>';
       }
       /* orginal <div style="background-image:url('.$post->pic_location.');"></div>*/
        ?>    
    </div>
</section>
</body>
</html>
<?php
?>