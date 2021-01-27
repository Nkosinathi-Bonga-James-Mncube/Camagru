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

    <link rel="stylesheet" href="../css/home.css">
</head>

<body onload="get_date();">

    <div class="home_page">
        <div class="overlay">
            <h1 id="image-heading">Image details</h1>
            <!-- <p id="date_output"></p> -->
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
            <img id="comment-image" src="../static/test1.jpg">    
            <button id="image-detail-button"class="btn btn-primary" onclick='location.href="private_gallery.php"'>Back</button>
            <div id="upload-message" class="alert alert-success" role="alert">
                Message posted!
            </div>
            <div id="upload-message" class="alert alert-success" role="alert">
                Message edited!
            </div>
            <div id="upload-message" class="alert alert-success" role="alert">
                Message deleted!
            </div>
            <div id="flex1" class="d-flex flex-column bd-highlight mb-3">
                <h2>Comments</h2>
                <div class="p-2 bd-highlight">
                    <u>User1</u><br><br>
                    <img width=50px height="50px" style="border-radius: 25px;" src="../static/test1.jpg">
                    <div class="user-comment-post">
                        dadasdasdsadasdadasdasdasdasdasdasdasd
                        dadadasdasdadadadadadasdasdadadasdsadasd
                        adasdsadasdsadasaaaaaaaaaaasssssssssssssssssssssssssssssssssssssssssssssss
                    </div>
                    <p id="date_output" style="font-size: 15px;"></p>   
                    <div id="user-comment-buttons">
                        <br><br><button class="btn btn-outline-success">Edit post</button>
                        <button class="btn btn-outline-danger">Delete post</button><br><br>
                        <a href="#" onclick="alert('Liked picture example')"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Likes this picture</a><br>
                        <a href="#" onclick="alert('Dislike picture example')"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Dislike this picture</a>     
                    </div>
                    
            
                    <hr style="background-color: white;">
                    
                </div>
                <div class="p-2 bd-highlight">Flex item 2</div>
                <div class="p-2 bd-highlight">Flex item 3</div>
                <div class="p-2 bd-highlight">Flex item 1</div>
                <div class="p-2 bd-highlight">Flex item 2</div>
                <div class="p-2 bd-highlight">Flex item 3</div>
                <div class="p-2 bd-highlight">Flex item 1</div>
                <div class="p-2 bd-highlight">Flex item 2</div>
                <div class="p-2 bd-highlight">Flex item 3</div>
                
            </div>

            <!-- <div id="comment-row" class="container"> -->
                <!-- <div class="row"> -->
                    <!-- <div class="w-100"></div> -->
                    <!-- <div class="col">Icon</div> -->
                    <!-- <div class="col">Text</div> -->
                    <!-- <div class="col">Like</div> -->
                    <!-- <div class="col">Dislike</div> -->
                    <!-- <div class="w-100"></div> -->
                    <!-- <div class="col">Icon</div> -->
                    <!-- <div class="col">Text</div> -->
                    <!-- <div class="col">Like</div> -->
                    <!-- <div class="col">Dislike</div> -->
                    <!-- <div class="w-100"></div> -->
                    <!-- <div class="col">Icon</div> -->
                    <!-- <div class="col">Text</div> -->
                    <!-- <div class="col">Like</div> -->
                    <!-- <div class="col">Dislike</div> -->
                    <!-- <div class="w-100"></div> -->
                    <!-- <div class="col">Icon</div> -->
                    <!-- <div class="col">Text</div> -->
                    <!-- <div class="col">Like</div> -->
                    <!-- <div class="col">Dislike</div> -->
                    <!-- <div class="w-100"></div> -->
                    <!-- <div class="col">Icon</div> -->
                    <!-- <div class="col">Text</div> -->
                    <!-- <div class="col">Like</div> -->
                    <!-- <div class="col">Dislike</div> -->
                    <!-- <div class="w-100"></div> -->
                    <!-- <div class="col">Icon</div> -->
                    <!-- <div class="col">Text</div> -->
                    <!-- <div class="col">Like</div> -->
                    <!-- <div class="col">Dislike</div> -->
                <!-- </div> -->
            <!-- </div> -->

            
            
            
            
            

            <footer id="footer">Camagru 2019</footer>
        </div>
    </div>
    <script>
        function get_date() {
            // alert('Helllo World!')
            ouput = document.getElementById('date_output').innerHTML = "Uploaded on : " + "[enter date]"
            ouput=document.getElementById('date_output').innerHTML= "Posted on : " + new Date().toDateString()
        }
    </script>
</body>

</html>