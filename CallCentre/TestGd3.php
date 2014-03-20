<?php
// File and new size
$filename = 'portsea.jpg';
$percent = 0.3;

// Content type
header('Content-Type: image/jpeg');

// Get new sizes
list($width, $height) = getimagesize($filename);
$newwidth = $width * $percent;
$newheight = $height * $percent;

// Load
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($filename);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

$yellow_x = 100;
$yellow_y = 95;
$red_x    = 120;
$red_y    = 185;
$blue_x   = 187;
$blue_y   = 145;
$radius   = 150;

// allocate colors with alpha values
$yellow = imagecolorallocatealpha($thumb, 255, 255, 0, 100);
$red    = imagecolorallocatealpha($thumb, 255, 0, 0, 50);
$blue   = imagecolorallocatealpha($thumb, 0, 0, 255, 75);

// drawing 3 overlapped circle
imagefilledellipse($thumb, $yellow_x, $yellow_y, $radius, $radius, $yellow);
imagefilledellipse($thumb, $red_x, $red_y, $radius, $radius, $red);
imagefilledellipse($thumb, $blue_x, $blue_y, $radius, $radius, $blue);

$font_file = 'arial.ttf';
imagefttext($thumb, 13, 0, $yellow_x - 50, $yellow_y, $black, $font_file, 'Point Nepean');

// Output
imagejpeg($thumb);
?>