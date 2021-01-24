<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        <h1>Login</h1>
        <ul id="nav">
            <li><a href="public_gallery.html" class="page_links"><i class="fa fa-camera" aria-hidden="true"></i> Public Gallery</a></li>
            <li><a href="about.html" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About Creator</a></li>
        </ul>
        <div id="login-msg1" class="d-none alert alert-danger" role="alert">
                Email address is not found
        </div>
        <div id="login-msg2" class="d-none alert alert-danger" role="alert">
            Login details are incorrect! Please try again.
        </div>
        <div id="valid-msg1" class="d-none alert alert-primary" role="alert">
            Validation email has been sent. Please check your inbox.
        </div>
        <div id="valid-msg2" class="d-none alert alert-success" role="alert">
            Your account has been verified.You can now log-in.
        </div>
        <div id="valid-msg3" class=" d-none alert alert-danger" role="alert">
            Error with your verification.Please try to re-register.
        </div>   
        <form  method="POST">
            <div class="form-group">
            Email address<input type="text" name="login_email" class="form-inline" placeholder="Please enter email">
            </div>
            <div class="form-group">
            Password<input type="password" name="login_pass" class="form-inline" placeholder="Please enter password">
            </div>
            <div class="form-group text-center">
                <button name="login_submit" type="submit" class="btn btn-primary">Enter</button>
                <button type="button" onclick='location.href="../index.html"' class="btn btn-primary">Back</button>
            </div>
        </form>
        <footer id="footer">Camagru 2019</footer>
    </div>
</div>
</body>
</html>
<?
if (isset($_POST['login_submit']))
{
    include "./validation/login_verf.php";
    $login_results=login($_POST['login_email'],$_POST['login_pass']);
}
?>
<script type="text/javascript">var results = "<?= $login_results?>";</script>
<script src="../js/login.js" type="text/javascript"></script>