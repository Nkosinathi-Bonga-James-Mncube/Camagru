<?php
include ("./validation/login_verf.php");
user_verf();
?>
<!DOCTYPE html>
<html>
<head>
    <title>PrivateGallery</title>
    <!-- bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap -->
    
    <!-- google fonts + bootstrap + font-awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google fonts + bootstrap + font-awesome-->

    <!-- my style sheet -->
    <link rel="stylesheet" href="../css/home.css"> 
    <!-- my style sheet -->
</head>
<body>
    
    <div class="home_page">
        <div class="overlay">
            <h1 id="page_heading">Private Gallery</h1>
            <ul id="nav">
                <li><a href="home.php" class="page_links"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li><a href="change_details.php" class="page_links"><i class="fa fa-address-card-o" aria-hidden="true"></i> Change details</a></li>
                <li><a href="about.php" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About Creator</a></li>
                <li><a href="logout.php"class="page_links"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
            </ul>
            <div class="row">
                <div class="col-md-2">
                    <div class="thumbnail">
                        <span data-msg="You have new messages">
                        <img  class="img_gallery" onclick ="location.href='image_details.html'" src="../static/test1.jpg">
                        <span class="badge">3</span>
                        </span>
                        <!-- <span class="tooltiptext">You have 3 new messages</span> -->
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="thumbnail">
                        <span data-msg="You have new messages">
                            <img  class="img_gallery" src="../static/test2.jpeg">
                            <span class="badge">3</span>
                        </span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="thumbnail">
                        <span data-msg="You have new messages">
                            <img  class="img_gallery" src="../static/test3.jpeg">
                            <span class="badge">3</span>
                        </span>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="thumbnail">
                        <span data-msg="You have new messages">
                        <img  class="img_gallery" src="../static/test1.jpg">
                        <span class="badge">3</span>
                    </span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="thumbnail">
                        <span data-msg="You have new messages">
                        <img  class="img_gallery" src="../static/test2.jpeg">
                        <span class="badge">3</span>
                    </span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="thumbnail">
                        <span data-msg="You have new messages">
                        <img  class="img_gallery" src="../static/test3.jpeg">
                        <span class="badge">3</span>
                    </span>
                    </div>
                </div>
            </div>
            
            
            <div id="upload-message" class="alert alert-success" role="alert">
                Image has been uploaded!
            </div>
            <div id="upload-message" class="alert alert-danger alert" role="alert">
                Image is invalid! <br>Supported file types : .jpeg .bmp <br> Supported resolution : 1000 x 1000
            </div>
            <div id="user-image-buttons">
                <i class="fa fa-spinner fa-pulse"></i>
                <button class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload an image</button>
                <button class="btn btn-primary"><i class="fa fa-camera" aria-hidden="true"></i> Take photo image</button>
            </div>
            
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        <footer id="footer">Camagru 2019</footer>
    </div>
</div>
</body>
</html>