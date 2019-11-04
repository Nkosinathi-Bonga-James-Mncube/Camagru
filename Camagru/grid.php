<html>
<head>
    <link rel = "stylesheet" href="style.css">
</head>
<body>
<section class="container">
    <div class="gallery-container">
        <?php
        session_start();
        $here = $_SESSION['email'];
       include "config/database.php";
       include "config/setup.php";
       $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
       $sql = 'SELECT * FROM table2 WHERE email = ?';
       $stmt = $pdo->prepare($sql);
       $stmt->execute([$here]);
       $post = $stmt->fetchAll();
       
       foreach($post as $post)
       {
           $file_pic = pathinfo($post->pic_location);
            echo '<a href = include "comments.php">
           <div style="background-image:url('.$post->pic_location.');"></div>
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