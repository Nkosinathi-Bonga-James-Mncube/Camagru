<?php
include ("./validation/login_verf.php");
user_verf();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot</title>
    <!-- bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap -->

    <!-- google fonts + bootstrap +font-awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google fonts + bootstrap -->
    
     <!-- my style sheet -->
    <link rel="stylesheet" href="../css/home.css"> 
     <!-- my style sheet -->
</head>
<body>
    
    <div class="home_page">
        <div class="overlay">
        <h1>Forgot Password</h1>
        <ul id="nav">
            <li><a href="home.php" class="page_links"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a href="private_gallery.php" class="page_links"><i class="fa fa-camera" aria-hidden="true"></i> My Gallery</a></li>
            <li><a href="change_details.php" class="page_links"><i class="fa fa-address-card-o" aria-hidden="true"></i> Change details</a></li>
            <li><a href="about.html" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About Creator</a></li>
            <li><a href="logout.php"class="page_links"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
        </ul>
        <div class="alert alert-danger" role="alert">
            Email address is invalid! Please try again.
        </div>
        <div class="alert alert-success" role="alert">
            Email address has been send.Please check your inbox
          </div>
        <i class="fa fa-spinner fa-pulse"></i>
        <p>Please enter your details</p>
        Email Address :<input>
        <div id="user-input-select">
            <button class="btn btn-primary" >Send</button>
            <button class="btn btn-primary" onclick='location.href="home.php"'>Back</button>
        </div>
        <footer id="footer">Camagru 2019</footer>
    </div>
</div>
</body>
</html> 