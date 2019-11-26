<?php
session_start();
if(!isset($_SESSION['verf_no']))
{
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $vkey = NULL;
    $vkey = $_GET['vkey'];
    $sql1 = 'SELECT * FROM table1 WHERE verf = ?';
    $stmt = $pdo->prepare($sql1);
    $stmt->execute([$vkey]);
    $post = $stmt->fetchAll();
    foreach($post as $post){
        $vkey_check = $post['verf'];
        $_name_hold = $post['username'];
    }
    $_SESSION['verf_no'] = $vkey_check;
}
?>
<html>
    <head>
    <link rel = "stylesheet" type = "text/css" href="css/tabs.css">
    <link rel = "stylesheet" type = "text/css" href = "css/login.css">
    </head>

    <body>   
    <nav>
        <ul>
        
        <li><a href="new_pass.php">Change Password</a></li>
        <li><a href="new_email.php">Change Email</a></li>
        <li><a href="change_username.php">Change Username</a></li>
        <li><a href="upload.php">Upload images</a></li>
        <li><a href="grid.php">Gallery Edit page</a></li>
        <li><a href="logout.php">Log-out</a></li>
        
        </ul>
        <div >
            <h1>User profile for: <?php include "get_name.php";echo (get_name($_SESSION['verf_no']))?></h1>
            
        </div>
    </nav>
    <video width="640" height="400" id="video"></video><br>
    <canvas id="canvas" hidden></canvas><br>
    <img id="output_img"><br>
    <button id="button">capture image</button>
    <button id="save">save</button>
    
    <form action = "" method = "post">
    <button id = "mario"name= "stick_mario" type = "submit"><img src = "stickers/mario.png" alt = "mario" style = "width: 50px ;height: 50px"></button>
    <button id = "pokemon" name ="pokemon"><img src = "stickers/pokemon.png" alt = "pokemon" style = "width: 50px ;height: 50px"></button>
    <button id = "smile" name = "smile"><img src = "stickers/smile.png" alt = "smile" style = "width: 50px ;height: 50px"></button>
    </form>
    <script src="js/main.js"></script>
   
    
    </body>
</html>
<?php
    include "stickers.php";
    if (isset($_POST['stick_mario']))
    {
       get_mario();
       header("Location: http://localhost:8080/Camagru/grid.php"); 
    }

    if (isset($_POST['pokemon']))
    {
       get_pokemon();
       header("Location: http://localhost:8080/Camagru/grid.php"); 
    }

    if (isset($_POST['smile']))
    {
       get_smile();
       header("Location: http://localhost:8080/Camagru/grid.php"); 
    }
?>