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
        <h1>Camagru</h1>
        <ul id="nav">
            <li><a href="public_gallery.html" class="page_links"><i class="fa fa-camera" aria-hidden="true"></i> Public Gallery</a></li>
            <li><a href="about.html" class="page_links"><i class="fa fa-info-circle" aria-hidden="true"></i> About Creator</a></li>
        </ul>

        <div id="login-msg1" class="d-none alert alert-danger" role="alert">
            Login details are incorrect! Please try again.
        </div>
        <div id="valid-msg1" class="d-none alert alert-success" role="alert">
            Validation email has been sent. Please check your inbox.
        </div>

        <p>Enter login details</p>
        Email address<input type="text" placeholder="Please enter email">
        Password<input type="password" placeholder="Please enter password">
        <div id="user-input-select">
            <button type="button" class="btn btn-primary">Enter</button>
            <button type="button" onclick='location.href="../index.html"' class="btn btn-primary">Back</button>
        </div>
        <footer id="footer">Camagru 2019</footer>
    </div>
</div>
</body>
</html>
<script src="../js/home.js" type="text/javascript"></script>