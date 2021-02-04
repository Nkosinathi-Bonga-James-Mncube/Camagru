<?php
include ("./validation/login_verf.php");
include "./validation/error_input_check.php";
user_verf();
include ("./likes/likes.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Images Details</title>
    <!-- bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap -->


    <!-- google fonts + bootstrap + font-awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google fonts + bootstrap + font-awesome -->

<!-- my style sheet -->
    <link rel="stylesheet" href="../css/home.css">
<!-- my style sheet -->
</head>

<body>

    <div class="home_page">
        <div class="overlay">
            <h1 id="image-heading">Image details</h1>
            <ul id="nav">
                <li><a href="home.php" class="page_links"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li><a href="private_gallery.php" class="page_links"><i class="fa fa-camera" aria-hidden="true"></i>
                        Public Gallery</a></li>
                <li><a href="change_details.php" class="page_links"><i class="fa fa-address-card-o"
                            aria-hidden="true"></i> Change details</a></li>
                <li><a href="about.php" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About
                        Creator</a></li>
                <li><a href="logout.php" class="page_links"><i class="fa fa-sign-out"
                            aria-hidden="true"></i>Logout</a></li>
            </ul>
            <?php 
                include "./pagenation/pagenation.php";
                $re_name_img=display_image();
                delete_button($re_name_img);
            ?>  

        <div id="flex1" class="d-flex flex-column bd-highlight mb-3">
        <p>
            <?php get_likes();?>
        <p>
        <h2>Comments</h2>
        <form id="comment_div" method="POST" style="position: abolute;top: 800px;">
                    <div class="form-group">
                    <textarea   id="comment_div" name="text_value"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" name="comment_submit">Submit</button>
                    </div>
                </form>
                <form  action="<?php echo $_SERVER['REQUEST_URI']?>" method ="POST">
                    <div class="form-group">
                    <button type = "submit" id = "likes" class="btn btn-primary" name = "likes"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><?php echo(" likes")?></button>
                    <button type = "submit" id = "likes" class="btn btn-primary" name = "unlikes"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i><?php echo(" unlike")?></button>
                    </div>
                </form>

        <?php 
            
            comment_input();
            like_pressed();
            // get_delete_image($_GET['i']);
            
            ?>
        </div>  
        </div>
    </div>  
</body>

