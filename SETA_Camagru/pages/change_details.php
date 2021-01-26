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
        <h1 id="page_heading">Change details</h1>
        <ul id="nav">
            <li><a href="home.php" class="page_links"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a href="private_gallery.php" class="page_links"><i class="fa fa-camera" aria-hidden="true"></i> My Gallery</a></li>
            <li><a href="about.php" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About Creator</a></li>
            <li><a href="logout.php"class="page_links"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
        </ul>
        <!-- <h2>Remember: Email first then re-direct to this page</h2> -->
        <div id="flex2"class="d-flex flex-column">
            <div class="t1">
                <div class="d-none alert alert-success px-2 py-1" role="alert">
                    Profile picture successfully uploaded !
                </div>
            </div>
            <div class="t1">
                <div class="d-none alert alert-danger alert px-2 py-1" role="alert">
                    Username is invalid! Please try again.
                </div>
            </div>
            <div class="t1">
                <div id="change-msg1"class="d-none alert alert-danger alert px-2 py-1" role="alert">
                    Password do not match! Please try again.
                </div>
            </div>
            <div class="t1">
                <div id="change-msg2"class="d-none alert alert-danger alert px-2 py-1" role="alert">
                Password must be 8 characters(with no spaces) or greater! Please try again.
                </div>
            </div>
            <div class="t1">
                <div id="change-msg3" class="d-none alert alert-danger alert px-2 py-1" role="alert">
                    Weak password. <br> Please make sure passsword has: <br>
                    - At least one uppercase<br>
                    - At least one lowercase<br>
                    - At least one special character<br>
                </div>
            </div>
            <div class="t1">
                <div id="change-msg4" class="d-none alert alert-danger alert px-2 py-1" role="alert">
                    There are space in password! Please remove them.
                </div>
            </div>
            <div class="t1">
                <div id="change-msg5" class="d-none alert alert-danger alert px-2 py-1" role="alert">
                    Email address is not found!Please check email is correct.
                </div>
            </div>
            <div class="t1">
                <div class="d-none alert alert-danger alert px-2 py-1" role="alert">
                    Profile picture is not valid.<br>Supported formats : .jpeg .bmp .<br>Supported resolution : 1000 x 1000 <br>Please try again.
                </div>
            </div>
        </div>
        <p>Please enter details to change</p>
        <!-- <div id="upload-dialog" class="input-group mb-3 w-25 p-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02">Please add profile picture</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
            </div>
        </div> -->
        <form method="POST">
        <div class="form-group">
            Email address:<input name="email1" class="form-inline" placeholder="Please enter email address">
        </div>
        <div class="form-group">
            Password:<input type="password" name="pass1" class="form-inline" placeholder="Please enter Password">
        </div>
        <div class="form-group">
            Re-enter password:<input type="password" name="pass2" class="form-inline" placeholder="Re-enter Password">
        </div>
        <div class="form-group text-center">
                <button name="change_submit"type="submit" class="btn btn-primary" >Send</button>
                <button type="button" class="btn btn-primary" onclick='location.href="home.php"'>Back</button>
        </div>
        </form>
        <footer id="footer">Camagru 2019</footer>
    </div>
</div>
</body>
</html>
<?php 
    include "./validation/error_input_check.php";
    // $new_pass_result=NULL;
    $new_pass_result=new_password();
?>
<script type="text/javascript">var results;</script>
<script type="text/javascript">var results = "<?= $new_pass_result?>";</script>
<script src="../js/change_details.js" type="text/javascript"></script>