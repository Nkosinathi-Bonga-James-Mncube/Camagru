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
                <li><a href="forgot_private.php" class="page_links"><i class="fa fa-address-card-o" aria-hidden="true"></i> Change details</a></li>
                <li><a href="about.php" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About Creator</a></li>
                <li><a href="logout.php"class="page_links"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
            </ul>
            <div class="row">
                <?php 
                    include "./pagenation/pagenation.php";
                    private_nav();
                    private_display_images();
                ?>
            </div>

            <div id="upload-msg1" class="d-none alert alert-danger alert" role="alert">
                Image is too big. Maximum Supported File size : 10mb
            </div>
            <div id="upload-msg2" class="d-none alert alert-danger alert" role="alert">
                Image is invalid! <br>Supported file types : .jpeg .bmp .png
            </div>
            <div id="upload-msg3" class="d-none alert alert-danger alert" role="alert">
                Filename already exist.Please rename your image
            </div>
            <div id="upload-msg4" class="d-none alert alert-success" role="alert">
                Image has been uploaded!Please wait ...
            </div>

            <form  method="POST">
                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary" name="Prev">Previous</button>
                    <button type="submit" class="btn btn-primary" name="Next">Next</button>
                </div>
            </form>
            <div id="user_upload set">
                <form method="POST" enctype = "multipart/form-data">
                    <div class="input-group" style="width: 500px;">
                        <input type="file" name="upload_image" class="form-control form-inline"/>
                        <button class="btn btn-primary mr-2 form-inline" name="image_submit" type="submit"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
                    </div>
                </form>
                <div class="text-center ">
                    <button class="btn btn-primary " onclick="alert('button clicked')"><i class="fa fa-camera" aria-hidden="true"></i> Take a photo </button>
                </div>
            <div>     
        <footer id="footer">Camagru 2019</footer>
    </div>
</div>
</body>
</html>
<?php
    include "./validation/error_input_check.php";
    $upload_results=upload_images()
?>
<script type="text/javascript">var results;</script>
<script type="text/javascript">var results = "<?= $upload_results?>";</script>
<script src="../js/private_gallery.js" type="text/javascript"></script>