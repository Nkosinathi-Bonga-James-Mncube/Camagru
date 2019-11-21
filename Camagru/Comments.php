<?php
session_start();
include "likes.php";
$pic_value = $_GET['p'];
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<nav>
        <ul>
        <li><a href="logout.php">Log-out</a></li>
        <li><a href="forgot.php">Change Password</a></li>
        <li><a href="email_change.php">Change Email</a></li>
        <li><a href="change_username.php">Change Username</a></li>
        <li><a href="upload.php">Upload images</a></li>
        <li><a href="grid.php">Gallery page</a></li>
        <li><a href="index.php">Back to main</a></li>
        </ul>
</nav>

    <h1>Comments for <?php echo($pic_value)?></h1>
    
    <form action="" method="post">  
    Comments: <br><textarea readonly="readonly" rows = "10" cols = "40" name = "comment"> <?php get_comments()?></textarea> <br/>
    </form>
    <form action="" method="post">  
    Enter you comment here : <br><textarea style = "resize:none" rows = "1" cols = "40"  name = "comment"></textarea> <br/>
    <br>
    <form action = "" method="post">
    
    
    
    <button type = "submit" name = "Comment_section">Add comment</button>
    <form action = "" method ="post">
    <button type = "submit" id = "likes" name = "likes"><?php echo(get_likes(). " likes")?></button>
    <button type = "submit" name= "Delete">Delete image</button>
    <script src= "js/hide_note.js"><scritp>
    
    </form>

    </form>
    
</body>
</html>
<?php


if (isset($_POST['likes']))
{
    get_update();
}

if (isset($_POST['Comment_section']))
{
    get_insert();
}

if (isset($_POST['Delete']))
{
    get_delete();
}
?>