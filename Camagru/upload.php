<html>
<head>
    <body>
            <form action = "upload.php" method = "post" enctype = "multipart/form-data">
            <br>
            <label>Select Image To Upload</label>
            <input type ="file" name = image1>
            <input type = "submit" name = "submit" value = "Upload image"> 
            </form>
    </body>
</head>
</html>

<?php
if (isset($_POST['submit']))
{
    //include "config/database.php";
    //include "config/setup.php";
    
    //$target = "new22/image1");
    //$file_path = "Camagur/new/".$
    $product_image = $_FILES['image1']['name'];
    $product_image_tmp = $_FILES['image1']['tmp_name'];
    $location = $_FILES['images1'][''];
    if (move_uploaded_file($product_image_tmp, "new22/$product_image"))
    {   
        echo ("Successfully uploaded");
    }
    else   
    {
        echo("Not successful");
    }
    // $product_image = $_FILES['product_image']['name'];
    // $product_image_tmp = $_FILES['product_image']['tmp_name'];
    // move_uploaded_file($product_image_tmp, "product_images/$product_image");


    if (file_exists($target))
    {
        echo ("file present");
    }
    else
    {
        echo("doesnt exist");
    }
}
/*try
{
    include "config/database.php";
    include "config/setup.php";
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $sql3 = $pdo->prepare("INSERT INTO table2 (userID,pic_location) VALUES (:userID,:pic_location)");
    $sql3->execute(['userID'=>'9','pic_location'=>$file_path]);

}
catch(PDOException $e2)
{
    echo $sql2 . "<br>" . $e2->getMessage();
    $pdo =  NULL;
}
}*/
?>