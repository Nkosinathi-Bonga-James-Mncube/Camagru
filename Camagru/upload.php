<?php
session_start();
?>
<html>
<head>
    <body>
    <nav>
        <ul>
        <li><a href="logout.php">Log-out</a></li>
        <li><a href="forgot.php">Change Password</a></li>
        <li><a href="email_change.php">Change Email</a></li>
        <li><a href="change_username.php">Change Username</a></li>
        <li><a href="grid.php">Gallery Edit page</a></li>
        <li><a href="main.php">Back to main</a></li>
        </ul>
    </nav>
            <form action = "upload.php" method = "post" enctype = "multipart/form-data">
            <br>
            <label>Select Image To Upload</label>
            <input type ="file" name = image1>
            <br>
            <br>
            <input type = "submit" name = "submit" value = "Upload image"> 
            </form>
    </body>
</head>
</html>

<?php
$product_image = NULL;
if (isset($_POST['submit']))
{
    include "search_dup_img.php";
    $product_image = $_FILES['image1']['name'];
    $product_image_tmp = $_FILES['image1']['tmp_name'];
    $pic_loc = "new22/$product_image";

        include "error_input_check.php";
        if (check_image($product_image,'image1',$pic_loc) == -1)
        {
            if (move_uploaded_file($product_image_tmp, "new22/$product_image"))
            {
                echo ("Successfully uploaded");
            }
            else
            {
                echo("Please upload an image");
            }
        try
        {
            include "config/database.php";
            include_once "config/connection.php";
            $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
            $sql3 = $pdo->prepare("INSERT INTO images (verf_code,name_img,pic_location) VALUES (:verf_code,:name_img,:pic_location)");
            $sql3->execute(['verf_code'=>$_SESSION['verf_no'],'name_img'=>$_FILES['image1']['name'],'pic_location'=> $pic_loc]);
        }
        catch(PDOException $e2)
        {
            echo $sql2 . "<br>" . $e2->getMessage();
        }

        try
        {
            $p_name = pathinfo($product_image);
            include "config/database.php";
            include_once "config/connection.php";
            $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
            $sql4 = $pdo->prepare("INSERT INTO likes (verf_code,likes,name_img) VALUES (:verf_code,:likes,:name_img)");
            $sql4->execute(['verf_code'=>$_SESSION['verf_no'],'likes'=>'0','name_img'=>$p_name['filename']]);
        }
        catch(PDOException $e3)
        {
            echo $sql2 . "<br>" . $e3->getMessage();
        }
}
}

?>