<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Public Gallery</title>
    <!-- bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap -->

    <!-- google fonts + bootstrap + font-awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google fonts + bootstrap + font-awesome -->

     <!-- my style sheet -->
    <link rel="stylesheet" href="../css/home.css">
     <!-- my style sheet --> 
</head>
<body>
    
    <div class="background">
        <div class="overlay">
        <h1>Public Gallery</h1>
        <ul id="nav">
            <li><a href="../index.html" class="page_links"><i class="fa fa-sign-in" aria-hidden="true"></i> Login / Register</a></li>
            <li><a href="forgot.php" class="page_links"><i class="fa fa-key" aria-hidden="true"></i> Forgot password</a></li>
            <li><a href="about.php" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About Creator</a></li>
        </ul>
        <div class="row">
            <?php 
                include "./pagenation/pagenation.php";
                public_nav();
                public_display_images();
            ?>
        </div>
        <form  method="POST">
                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary" name="Prev">Previous</button>
                    <button type="submit" class="btn btn-primary" name="Next">Next</button>
                </div>
            </form>
        <button class="btn btn-primary" onclick='location.href="../index.html"'>Back</button>
        <footer id="footer">Camagru 2019</footer>
    </div>
</div>
</body>
</html>