<?php
  function pic_insert($store)
  {
      try
      {
          $p_image = pathinfo($store);
          require "config/database.php";
          require_once "config/connection.php";
          $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
          $sql3 = $pdo->prepare("INSERT INTO images (verf_code,name_img,webcam,pic_location) VALUES (:verf_code,:name_img,:webcam,:pic_location)");
          $sql3->execute(['verf_code'=>$_SESSION['verf_no'],'name_img'=>$p_image['filename'],'webcam'=>'1','pic_location'=> 'images/'.$store]);
      }
      catch(PDOException $e2)
      {
          echo $sql2 . "<br>" . $e2->getMessage();
      }
  }
  function get_image_database_delete($image)//delete function
{
    include "config/database.php";
    include_once "config/connection.php";
    $pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $sql = 'DELETE FROM images WHERE pic_location = :pic_location';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['pic_location'=>$image]);
    header("Location: http://localhost:8080/Camagru/grid.php");
}
  
  function get_mario()
  {
        //include "stickers.php";
        //session_start();
        $d = imagecreatefromjpeg('../Camagru/'.$_SESSION['image']);
        $s = imagecreatefrompng('../Camagru/stickers/mario.png');
        imagealphablending($d,false);
        imagesavealpha($d,true);
        imagecopymerge($d,$s , 10 , 9, 0,0,81,86,100);
        $store = uniqid().".jpg";
        imagepng($d,'../Camagru/images/'.$store);
        pic_insert($store);
      
        imagedestroy($d);
        imagedestroy($s);
        $location = $_SESSION['image'];
        if (file_exists($location))
        {
            unlink($location);
            get_image_database_delete($location);
        }
}

function get_pokemon()
{
        //include "stickers.php";   
        //session_start();
        $d = imagecreatefromjpeg('../Camagru/'.$_SESSION['image']);
        $s = imagecreatefrompng('../Camagru/stickers/pokemon.png');
        imagealphablending($d,false);
        imagesavealpha($d,true);
        imagecopymerge($d,$s , 10 , 9, 0,0,81,86,100);
        $store = uniqid().".jpg";
        imagepng($d,'../Camagru/images/'.$store);
        pic_insert($store);
        imagedestroy($d);
        imagedestroy($s);
        $location = $_SESSION['image'];
        if (file_exists($location))
        {
            get_image_database_delete($location);
            unlink($location);
        }
}
function get_smile()
{
        //include "stickers.php";   
        //session_start();
        $d = imagecreatefromjpeg('../Camagru/'.$_SESSION['image']);
        $s = imagecreatefrompng('../Camagru/stickers/smile.png');
        imagealphablending($d,false);
        imagesavealpha($d,true);
        imagecopymerge($d,$s , 10 , 9, 0,0,81,86,100);
        $store = uniqid().".jpg";
        imagepng($d,'../Camagru/images/'.$store);
        pic_insert($store);
        imagedestroy($d);
        imagedestroy($s);
        $location = $_SESSION['image'];
        if (file_exists($location))
        {
            get_image_database_delete($location);
            unlink($location);
        }
}
?>