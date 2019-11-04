<html>
<head>
    <body>
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
session_start();
$product_image = NULL;
$_SESSION['email'] = "nmncube@student.wethinkcode.co.za";
$here = $_SESSION['email'];
if (isset($_POST['submit']))
{
    $product_image = $_FILES['image1']['name'];
    $product_image_tmp = $_FILES['image1']['tmp_name'];
    if (move_uploaded_file($product_image_tmp, "new22/$product_image"))
    {   
        echo ("Successfully uploaded");
    }
    else   
    {
        echo("Please upload an image");
    }
}

try{
    include "config/database.php";
    include "config/setup.php";
    $sql2 = "CREATE TABLE IF NOT EXISTS table2(
        userID INT NOT NULL AUTO_INCREMENT,email VARCHAR(64),pic_location VARCHAR(64),PRIMARY KEY(userID)
        );";
    $pdo->exec($sql2);
    $pdo =  NULL;
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
    $sql3->execute(['email'=>$here,'pic_location'=>"new22/$product_image"]);
}
catch(PDOException $e2)
{
    echo $sql2 . "<br>" . $e2->getMessage();
    $pdo =  NULL;
}

?>