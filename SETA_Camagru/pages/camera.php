<?php
include ("./validation/login_verf.php");

user_verf();
?>
<html>
<head>
    <!-- google fonts + bootstrap + font-awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google fonts + bootstrap + font-awesome-->

    <!-- <link rel="stylesheet" href="../css/home.css">  -->
</head>
<body>
<div class="home_page">
<div class="overlay">
<h1 id="page_heading">Camara</h1>
<ul id="nav">
            <button type="button" class="btn btn-outline-secondary">
                Notifications <span class="badge badge-light">4</span>
            </button>
            <li><a href="private_gallery.php" class="page_links"><i class="fa fa-camera" aria-hidden="true"></i> My Gallery</a></li>
            <li><a href="forgot_private.php" class="page_links"><i class="fa fa-address-card-o" aria-hidden="true"></i> Change details</a></li>
            <li><a href="about.php" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About Creator</a></li>
            <li><a href="logout.php"class="page_links"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
        </ul>
<video  width="640" height="400" id="video" style="border: 3px solid #EEE;position: absolute;" ></video><br>
    <canvas id="canvas" hidden></canvas><br>
    <img id="output_img" style="position: relative; top:600px;border: 3px solid #EEE;"><br>
    <div id="move pair" style="position: absolute;top:700px">
    <button id="button" type="submit" class="btn btn-primary text-center">capture image</button>
    <button id="save" type="submit" class="btn btn-primary text-center">add stickers</button>
    <button id="save1" type="submit" class="btn btn-primary text-center" onclick="location.href='camera.php'">Refresh</button>
    </div>
    
    <form id="sticker_div" action = "" method = "post" style="position: absolute;top: 750px">
        <button class="btn btn-primary" id = "mario"name= "stick_mario" type = "submit"><img src = "stickers/mario.png" alt = "mario" style = "width: 50px ;height: 50px"></button>
        <button class="btn btn-primary" id = "pokemon" name ="pokemon"><img src = "stickers/pokemon.png" alt = "pokemon" style = "width: 50px ;height: 50px"></button>
        <button class="btn btn-primary" id = "smile" name = "smile"><img src = "stickers/smile.png" alt = "smile" style = "width: 50px ;height: 50px"></button>
    </form>
</div>
</div>  
<script src="../js/main.js"></script>
</body>
</html>
<?php
    include "stickers.php";
    if (isset($_POST['stick_mario']))
    {
        get_mario();
    // header("Location: http://localhost:8080/Camagru/SETA_Camagru/pages/private_gallery.php");
    }

    if (isset($_POST['pokemon']))
    {
        get_pokemon();
        // header("Location: http://localhost:8080/Camagru/SETA_Camagru/pages/private_gallery.php"); 
    }

    if (isset($_POST['smile']))
    {
        get_smile();
    //    header("Location: http://localhost:8080/Camagru/SETA_Camagru/pages/private_gallery.php"); 
    }
?>