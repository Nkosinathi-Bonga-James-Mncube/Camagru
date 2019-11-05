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
//session_start();
$product_image = NULL;
if (isset($_POST['submit']))
{
    include "search_dup_img.php";
    $product_image = $_FILES['image1']['name'];
    $product_image_tmp = $_FILES['image1']['tmp_name'];
    $pic_loc = "new22/$product_image";
    /**if ($_FILES['image1']['size'] > 10485760)
    {
        echo ("Image is too big");
    }else if(!(pathinfo($product_image,PATHINFO_EXTENSION) == 'jpg'|| pathinfo($product_image,PATHINFO_EXTENSION) == 'png'|| pathinfo($product_image,PATHINFO_EXTENSION) == 'bmp' || pathinfo($product_image,PATHINFO_EXTENSION) == 'jpeg'))
    {
        echo ("Not a valid filetype. Please uplaod '.jpg','.jpeg', '.bmp' or '.bmp'");
    }else if (get_image($pic_loc) != NULL)
    {
        echo("Filename already exist.Please rename your image");
    }
    else
    {**/
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

    try{
        include "config/database.php";
        include "config/setup.php";
        $sql2 = "CREATE TABLE IF NOT EXISTS table2(
            userID INT NOT NULL AUTO_INCREMENT,email VARCHAR(64),pic_location VARCHAR(64),PRIMARY KEY(userID)
            );";
        $pdo->exec($sql2);
        //$pdo =  NULL;
    }
    catch(PDOException $e1)
    {
        echo $sql2 . "<br>" . $e1->getMessage();
        $pdo =  NULL;
    } 
    
    try
    {
        include "config/setup.php";
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $sql3 = $pdo->prepare("INSERT INTO table2 (email,pic_location) VALUES (:email,:pic_location)");
        $sql3->execute(['email'=>$_SESSION['verf_no'],'pic_location'=> $pic_loc]);
    }
    catch(PDOException $e2)
    {
        echo $sql2 . "<br>" . $e2->getMessage();
        //$pdo =  NULL;
    }



}

}

?>