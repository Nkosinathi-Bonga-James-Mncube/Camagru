
<!DOCTYPE html>
<html>
<head>
    <title>Changing Details</title>
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
    
<div class="background">
    <div class="overlay">
        <h1>Forgot Password</h1>
        <ul id="nav">
        <li id="login_tag"><a href="../index.html" class="page_links"><i class="fa fa-sign-in" aria-hidden="true"></i> Login / Register</a></li>
        <li id="public_tag"><a href="public_gallery.html" class="page_links"><i class="fa fa-camera" aria-hidden="true"></i> Public Gallery</a></li>
        <li><a href="about.php" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About Creator</a></li>
        </ul>
        <div id="forgot msg1" class="d-none alert alert-success" role="alert">
            Password reset email has been sent.Please check your inbox
        </div>
        <div id="forgot msg2" class="d-none alert alert-danger" role="alert">
            Email address does not exist! Please try again.
        </div>
        <div id="forgot msg3" class="d-none alert alert-danger" role="alert">
            Issue with sending email! Please try again.
        </div>
        <form method="POST">
            <div class="form-group">
                Email Address<input class="form-inline" type="text" name="email_address">
            </div>
            <div class="form-group text-center">
                <button type="submit" name="forgot_submit" class="btn btn-primary">Send</button>
                <button type="button" class="btn btn-primary" onclick='location.href="home.php"'>Back</button>
            </div>
        </form>
    <footer id="footer">Camagru 2019</footer>
    </div>
</div>
</body>
</html>
<?php
include "./validation/login_verf.php";
$result="not found";
$result=search_user_forgot_pass();
?>
<script>
    var valid_email_status = '<?= $result?>'
    if (valid_email_status == "sent")
    {
        document.getElementById('forgot msg1').className = "alert alert-success";
    }
    if (valid_email_status == "not found")
    {
        document.getElementById('forgot msg2').className = "alert alert-danger";
    }
    if(valid_email_status == "failed")
    {
        document.getElementById('forgot msg3').className = "alert alert-danger";
    }
</script>
