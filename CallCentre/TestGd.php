<?php
$filename = 'portsea.jpg';
$size = 300;
$image=imagecreatefromjpeg($filename);

// something to get a white background with black border
$back = imagecolorallocate($image, 255, 255, 255);
$border = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 0, 0, $size - 1, $size - 1, $back);
imagerectangle($image, 0, 0, $size - 1, $size - 1, $border);

$yellow_x = 100;
$yellow_y = 95;
$red_x    = 120;
$red_y    = 185;
$blue_x   = 187;
$blue_y   = 145;
$radius   = 150;

// allocate colors with alpha values
$yellow = imagecolorallocatealpha($image, 255, 255, 0, 100);
$red    = imagecolorallocatealpha($image, 255, 0, 0, 50);
$blue   = imagecolorallocatealpha($image, 0, 0, 255, 75);

// drawing 3 overlapped circle
imagefilledellipse($image, $yellow_x, $yellow_y, $radius, $radius, $yellow);
imagefilledellipse($image, $red_x, $red_y, $radius, $radius, $red);
imagefilledellipse($image, $blue_x, $blue_y, $radius, $radius, $blue);

// don't forget to output a correct header!
header('Content-Type: image/png');

// and finally, output the result
imagepng($image);
imagedestroy($image);


?>