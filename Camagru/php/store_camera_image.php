<?php


/****Reference work from mnchabeleng-jhb-c5r9s10 
$data = file_get_contents("php://input");
$data = json_decode($data, true);

$array = explode(',', $data["data_url"]);
$image_string = base64_decode($array[1]);
$final = imagecreatefromstring($image_string);

$image_name = uniqid().".jpg";
imagejpeg($final, "../images/$image_name");
imagedestroy($final);

$image_name = "../images/$image_name";

echo $image_name;
Reference work from mnchabeleng-jhb-c5r9s10 ***/
?>