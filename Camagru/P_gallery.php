<?php
session_start();
?>
<html>
<head>
    <link rel = "stylesheet" href="css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "css/login.css">
</head>
<body>

<nav>

        <div >
            <h1><u>Public Gallery Section</u></h1>
            <li><a href="logout.php">Log-in</a></li>
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
        if ($_SESSION['num'] >= -5 && $_SESSION['num'] +5  <= ft_count())
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
        $stmt = $pdo->prepare('SELECT * FROM images');
        $stmt->execute();
        $value = $stmt->rowCount();
        return($value);
    }
 function display_images()
 {
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);

   $stmt = $pdo->prepare('SELECT * FROM images ORDER BY created DESC LIMIT '.$_SESSION['num'].',5');
   $stmt->execute(); 

   foreach($stmt as $stmt)
   {
       $file_pic = pathinfo($stmt['pic_location']);
        echo'<a href = #'.$file_pic['filename'].'>
       <div style="background-image:url('.$stmt['pic_location'].');"></div>
       <p>'.$file_pic['filename'].'</p>
       </a>';
   }
 }

?>