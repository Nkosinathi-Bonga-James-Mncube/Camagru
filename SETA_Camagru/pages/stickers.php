<?php
function pic_insert($store)
{
    try
    {
        require "../config/database.php";
        require_once "../config/connection.php";
        
        $p_image = pathinfo($store);
        $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
        $sql3 = $pdo->prepare("INSERT INTO images (verf_code,name_img,re_name_img,webcam,pic_location) VALUES (:verf_code,:name_img,:re_name_img,:webcam,:pic_location)");
        $sql3->execute(['verf_code'=>$_SESSION['verf_no'],'name_img'=>$p_image['filename'],'re_name_img'=>$p_image['filename'],'webcam'=>'1','pic_location'=> '../images/'.$store]);
    }
    catch(PDOException $e2)
    {
        echo $sql2 . "<br>" . $e2->getMessage();
    }
}

function get_image_database_delete($image)
{
    require "../config/database.php";
    require_once "../config/connection.php";

    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'DELETE FROM images WHERE pic_location = :pic_location';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['pic_location'=>$image]);
    header("Location: http://localhost:8080/Camagru/SETA_Camagru/pages/private_gallery.php");
}

function get_mario()
{
        $d = imagecreatefromjpeg('../'.$_SESSION['image']);
        $s = imagecreatefrompng('./stickers/mario.png');
        imagealphablending($d,false);
        imagesavealpha($d,true);
        imagecopymerge($d,$s , 10 , 9, 0,0,81,86,100);
        $store = uniqid().".jpg";
        imagepng($d,'../images/'.$store);
        pic_insert($store);
        imagedestroy($d);
        imagedestroy($s);
        $location = '../'.$_SESSION['image'];
        if (file_exists($location))
        {
            unlink($location);
            get_image_database_delete($location);
        }
}

function get_pokemon()
{
        $d = imagecreatefromjpeg('../'.$_SESSION['image']);
        $s = imagecreatefrompng('./stickers/pokemon.png');
        imagealphablending($d,false);
        imagesavealpha($d,true);
        imagecopymerge($d,$s , 10 , 9, 0,0,81,86,100);
        $store = uniqid().".jpg";
        imagepng($d,'../images/'.$store);
        pic_insert($store);
        imagedestroy($d);
        imagedestroy($s);
        $location = '../'.$_SESSION['image'];
        if (file_exists($location))
        {
            get_image_database_delete($location);
            unlink($location);
        }
}
function get_smile()
{
        $d = imagecreatefromjpeg('../'.$_SESSION['image']);
        $s = imagecreatefrompng('./stickers/smile.png');
        imagealphablending($d,false);
        imagesavealpha($d,true);
        imagecopymerge($d,$s , 10 , 9, 0,0,81,86,100);
        $store = uniqid().".jpg";
        imagepng($d,'../images/'.$store);
        pic_insert($store);
        imagedestroy($d);
        imagedestroy($s);
        $location = '../'.$_SESSION['image'];
        if (file_exists($location))
        {
            get_image_database_delete($location);
            unlink($location);
        }
}
?>