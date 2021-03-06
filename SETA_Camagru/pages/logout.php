<?php
    include ("./validation/login_verf.php");
    logout();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <!-- bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap -->

    <!-- google fonts + bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!-- google fonts + bootstrap -->

    <!-- my style sheet -->
    <link rel="stylesheet" href="../css/home.css">
    <!-- my style sheet --> 
</head>
<body>
    
    <div class="home_page">
        <div class="overlay">
        <h1>Logout</h1>
        <p>Sorry to see you go, but we will catch up next time :)</p>
        <button class="btn btn-primary" onclick="location.href='../'">Go back to home page</button>
        <footer id="footer">Camagru 2019</footer>
    </div>
</div>
</body>
</html> 