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
           echo '<a href = "#">
           <div style="background-image:url('.$post->pic_location.');"></div>
           <p>This is a paragraph</p>
           </a>';
       }
        echo '<a href = "#">
        <div></div>
        <p>test1</p>
        </a>';
        ?>    
    </div>
</section>
<!--section class "gallery-links"-->
<!--div class = "wrapper">
<div  class = "gallery-container">
<a href = "#">
<div></div>
<h1>temp<h1>
<p>here is an image</p>
</a>
</div>

<a href = "#">
<div></div>
<h1>temp<h1>
<p>here is an image</p>
</a>
</div>

</div>
</section-->
</body>
</html>
<?php
?>