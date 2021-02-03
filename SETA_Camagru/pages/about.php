<?php
include ("./validation/login_verf.php");
$is_login=session_check();
?>

<!DOCTYPE html>
<html>
<head>
    <title>About</title>
    <!-- bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap -->
    
    <!-- google fonts + bootstrap + font-awesome-->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google fonts + bootstrap + font-awesome-->
    
    <!-- my style sheet -->
    <link rel="stylesheet" href="../css/home.css">
    <!-- my style sheet -->

</head>
<body>
    
    <div id="about_page" class="background">
        <div class="overlay">
        <h1>About</h1>
        <ul id="nav">
            <li id="login_tag"><a href="../index.html" class="page_links"><i class="fa fa-sign-in" aria-hidden="true"></i> Login / Register</a></li>
            <li id="public_tag"><a href="public_gallery.php" class="page_links"><i class="fa fa-camera" aria-hidden="true"></i> Public Gallery</a></li>
            <li id="home_tag"><a href="home.php" class="page_links"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li id="private_tag"><a href="private_gallery.php" class="page_links"><i class="fa fa-camera" aria-hidden="true"></i> My Gallery</a></li>
            <li id="change_tag"><a href="change_details.php" class="page_links"><i class="fa fa-address-card-o" aria-hidden="true"></i> Change details</a></li>
            <li id="forgot_tag"><a href="forgot.php" class="page_links"><i class="fa fa-key" aria-hidden="true"></i> Forgot password</a></li>
            <li id="logout_tag"><a href="logout.php" class="page_links"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a></li>
        </ul>
        <p>Created by</p>
        <p>Nkosinathi Mncube</p>
            <img width="200px"  class="profile_img" height="200px" src="../static/profile.jpg"></img>
        <p>Contact Me</p>
        <div class="contact-details">
            <a href="https://github.com/Nkosinathi-Bonga-James-Mncube"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a>
            <a href="https://www.linkedin.com/in/nbj-mncube/"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
            <a href="mailto:nmncube@student.wethinkcode.co.za"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a>
        </div>
        <button id="back_button" class="btn btn-primary" onclick='location.href="home.php"'>Back</button>
        <footer id="footer">Camagru 2019</footer>
    </div>
</div>
</body>
</html>
<script type="text/javascript">var results = "<?= $is_login?>";</script>
<script src="../js/about.js" type="text/javascript"></script> 