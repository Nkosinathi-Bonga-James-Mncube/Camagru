<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <!-- bootstrap -->
    <!-- <meta charset="utf-8"> -->
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
        <h1>Register</h1>
        <ul id="nav">
            <li><a href="public_gallery.html" class="page_links"><i class="fa fa-camera" aria-hidden="true"></i> Public Gallery</a></li>
            <li><a href="forgot.php" class="page_links"><i class="fa fa-key" aria-hidden="true"></i> Forgot password</a></li>
            <li><a href="about.html" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About Creator</a></li>
        </ul>
        <div class="t1">
            <div id="error_msg1" class="d-none alert alert-danger alert px-2 py-1" role="alert">
            Please check username, email, and password fields are entered
            </div>
        </div>
        <div class="t1">
            <div id="error_msg2" class="d-none alert alert-danger alert px-2 py-1" role="alert">
                Password do not match! Please try again.
            </div>
        </div>
        <div class="t1">
            <div id="error_msg3" class="d-none alert alert-danger alert px-2 py-1" role="alert">
                Password must be 8 characters long.
            </div>
        </div>
        <div class="t1">
            <div id="error_msg4" class="d-none alert alert-danger alert px-2 py-1" role="alert">
                There are space in username, email or password
            </div>
        </div>
        <div class="t1">
            <div id="error_msg5" class="d-none alert alert-danger alert px-2 py-1" role="alert">
                Weak password. <br> Please make sure passsword has: <br>
                - At least one uppercase<br>
                - At least one lowercase<br>
                - At least one special character<br>
            </div>
        </div>                                        
        <div class="t1">
            <div id="error_msg6" class="d-none alert alert-danger alert px-2 py-1" role="alert">
                Please enter valid email address
            </div>
        </div> 
        <div class="t1">
            <div id="error_msg7" class="d-none alert alert-danger alert text-center px-2 py-1 " role="alert">
                Username or email already exist
            </div>
        </div>
        <div class="t1">
            <div id="error_msg8" class="d-none alert alert-danger alert text-center px-2 py-1 " role="alert">
                Error sending email. Please try again
            </div>
        </div>                                                              
        <form  method="POST">
            <div class="form-group">
                Username<input class="form-inline" name="create_user" type="text"  placeholder="Username">
            </div>
            <div class="form-group">
                Email<input class="form-inline" type="text"  name="create_email" placeholder="Email">
            </div>
            <div class="form-group">
                Password<input class="form-inline" name="create_pass1" type="password" placeholder="password" >
            </div>
            <div class="form-group">
                Re-enter password<input class="form-inline"name="create_pass2" type="password" placeholder="Re-enter password">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" name="create_button">Enter</button>
                <button type="button" onclick='location.href="../"' class="btn btn-primary">Back</button>
            </div>
        </form>
        <footer id="footer">Camagru 2019</footer>
    </div>
</div>

</body>
</html> 
<?php
include "./validation/register_verf.php";
?>
<script>
    var error_msg_value = '<?= $value1?>'
    if (error_msg_value == 1)
    {
        document.getElementById('error_msg1').className = "alert alert-danger alert px-2 py-1";
    }
    
    if (error_msg_value == 2)
    {
        document.getElementById('error_msg2').className = "alert alert-danger alert px-2 py-1";
    }
    if (error_msg_value == 3)
    {
        document.getElementById('error_msg3').className = "alert alert-danger alert px-2 py-1";
    }
    if (error_msg_value == 4)
    {
        document.getElementById('error_msg4').className = "alert alert-danger alert px-2 py-1";
    }
    if (error_msg_value == 5)
    {
        document.getElementById('error_msg5').className = "alert alert-danger alert px-2 py-1";
    }
    if (error_msg_value == 6)
    {
        document.getElementById('error_msg6').className = "alert alert-danger alert px-2 py-1";
    }
</script>