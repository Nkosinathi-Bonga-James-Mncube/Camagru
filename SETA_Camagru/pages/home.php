<?php
    include ("./validation/login_verf.php");
    include ("./notification/notification.php");
    $username=user_verf();
    $notifications=get_all_likes();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <!-- bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap -->

    <!-- google fonts + bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google fonts + bootstrap -->

<!-- my style sheet -->
    <!-- <link rel="stylesheet" href="../css/home.css">  -->
<!-- my style sheet -->
</head>
<body>
    
    <div class="home_page">
        <div class="overlay">
        <h1>Welcome back! <h1 id="user_name"></h1></h1>
        <ul id="nav">
            <button id="notfication_home" type="button" onclick='location.href="private_gallery.php"' class="d-none btn btn-outline-secondary">
                Notifications <span class="badge badge-light">New</span>
            </button>
            <li><a href="private_gallery.php" class="page_links"><i class="fa fa-camera" aria-hidden="true"></i> My Gallery</a></li>
            <li><a href="forgot_private.php" class="page_links"><i class="fa fa-address-card-o" aria-hidden="true"></i> Change details</a></li>
            <li><a href="about.php" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About Creator</a></li>
            <li><a href="logout.php"class="page_links"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
        </ul>
        <img width="200px"  class="profile_img" height="200px" src="../static/default_image.png"></img>
        
        <div id="home-msg1" class="d-none alert alert-success" role="alert">
            Password has been updated!
        </div>
        <div id="home-msg2" class="d-none alert alert-success" role="alert">
            Personal details have been updated!
        </div>
        <footer id="footer">Camagru 2019</footer>
    </div>
</div>
</body>
</html>
<script type="text/javascript">var result2 = "<?= $notifications?>";</script>
<script type="text/javascript">var results = "<?= $username?>";</script>
<script src="../js/home.js" type="text/javascript"></script>

<?php 
// include ("./notification/notification.php");
// get_note_flag();
// note_flag(get_all_likes());
// get_images();
?>

