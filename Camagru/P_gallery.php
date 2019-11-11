<html>
<head>
    <link rel = "stylesheet" href="css/style.css">
</head>
<body>
<nav>
        <ul>
        <li><a href="login.php">Log-in</a></li>
        </ul>
        <div >
            <h1><u>Public Gallery Section</u></h1>
        </div>
    </nav>
<section class="container">
    <div class="gallery-container">
        <?php
        include "config/database.php";
        include_once "config/connection.php";
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        $sql = 'SELECT * FROM images ORDER BY created DESC';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['verf_no']]);
        $post = $stmt->fetchAll();
       
       foreach($post as $post)
       {
           $file_pic = pathinfo($post['pic_location']);
            echo'<a href = #.>
           <div style="background-image:url('.$post['pic_location'].');"></div>
           <p>'.$file_pic['filename'].'</p>
           </a>';
       }
        ?>    
    </div>
</section>
</body>
</html>
<?php
?>