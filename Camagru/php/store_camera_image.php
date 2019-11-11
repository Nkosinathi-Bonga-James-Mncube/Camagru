<?php



$data = file_get_contents("php://input");
$data = json_decode($data, true);

$array = explode(',', $data["data_url"]);
$image_string = base64_decode($array[1]);
$final = imagecreatefromstring($image_string);

$image_name = uniqid().".jpg";
imagejpeg($final, "../images/$image_name");
imagedestroy($final);


/*$sticker = "cat.png";
$sticker = "../images/stickers/$sticker";
$image_name = "../images/$image_name";

$sticker_size = getimagesize($sticker);
$image_size = getimagesize($image_name);

$image_width = $image_size[0];
$image_height = $image_size[1];

$sticker_width = $sticker_size[0];
$sticker_height = $sticker_size[1];
$sticker_ratio = $image_height / $image_width;

$src = imagecreatefrompng($sticker);
$dest = imagecreatefromjpeg($image_name);

imagecopy($dest, $src, $image_width / 5, 0, 0, 0, 500, 300);

//echo $image_name;*/
?>