<?php

session_start();
$session = $_SESSION['verf_no'];
$data = file_get_contents("php://input");
$data = json_decode($data, true);

$array = explode(',', $data["data_url"]);
$image_string = base64_decode($array[1]);
$final = imagecreatefromstring($image_string);

$image_name = uniqid().".jpg";
//$here = $image_name;
imagejpeg($final, "../images/$image_name");
insert($image_name, $session);
imagedestroy($final);


function insert($image_name, $session)
{

    try
    {
        $p_image = pathinfo($image_name);
        require "./../config/database.php";
        require_once "./../config/connection.php";
        $_SESSION['image'] = "images/$image_name";
        $_SESSION['name_image'] = $p_image['filename'];
        $p_name = pathinfo($product_image);
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        $sql3 = $pdo->prepare("INSERT INTO images (verf_code,name_img,webcam,pic_location) VALUES (:verf_code,:name_img,:webcam,:pic_location)");
        $sql3->execute(['verf_code'=>$session,'name_img'=>$p_image['filename'],'webcam'=>'1','pic_location'=> "images/$image_name"]);
    }
    catch(PDOException $e2)
    {
        echo $sql2 . "<br>" . $e2->getMessage();
    }

}
?>