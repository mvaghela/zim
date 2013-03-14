<?php
// Set the content-type
header('Content-Type: image/png');

// Create the image
$im = imagecreatetruecolor(400, 30);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $white);

// The text to draw
$text = 'testing';
// Replace path by your own font path
$font = 'avenir-book.ttf';

// Add some shadow to the text
imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

// Add the text
imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);
?>

<?php
header("Content-type: image/png");

$string = "This is my test string.";

$font  = "20px";
$width  = imagefontwidth($font) * strlen($string);
$height = imagefontheight($font);

$image = imagecreatetruecolor ($width,$height);
$white = imagecolorallocate ($image,255,255,255);
$black = imagecolorallocate ($image,0,0,0);
imagefill($image,0,0,$white);

imagestring ($image,$font,0,0,$string,$black);

imagepng ($image);
imagedestroy($image);
?>



<?php
header('Content-Type: image/png');

$title = "test text";

$im = imagecreatetruecolor(87, 80);
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);
imagefill($im, 87, 80, $black);
imagecolortransparent($im, $black);

$white = imagecolorallocate($im, 255, 255, 255);
$font = 'avenir-book.ttf';

$bbox = imagettfbbox(12,-40,"avenir-book.ttf", $title);
$width = $bbox[2]-$bbox[0];
$height = ceil(($bbox[6]-$bbox[0])/2);

$pos = ceil((87-$width)/2);
$posx = $pos-$height;
$posy = $pos+$height;

imagettftext($im, 12, -45, $posx, $posy, $white, $font, $title);

imagepng($im);
imagedestroy($im);
?>



<?php
header('Content-Type: image/png');

$title = "test123";

$im = imagecreatetruecolor(87, 80);
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);
imagefill($im, 87, 80, $black);
imagecolortransparent($im, $black);

$white = imagecolorallocate($im, 255, 255, 255);
$font = 'avenir-book.ttf';

$bbox = imagettfbbox(8,-40,"avenir-book.ttf", $title);
$width = $bbox[2]-$bbox[0];
$height = ceil(($bbox[6]-$bbox[0])/2);

$pos = ceil((87-$width)/2);
$posx = $pos-$height;
$posy = $pos+$height;

imagettftext($im, 8, -45, $posx, $posy, $white, $font, $title);

imagepng($im);
imagedestroy($im);
?>

<?php
header('Content-Type: image/png');

$title = "testtext";

$im = imagecreatetruecolor(87, 80);
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);
imagefill($im, 87, 80, $black);
imagecolortransparent($im, $black);

$white = imagecolorallocate($im, 255, 255, 255);
$font = 'avenir-book.ttf';

$bbox = imagettfbbox(12,0,"avenir-book.ttf", $title);
$width = $bbox[2]-$bbox[0];
$height = ceil(($bbox[6]-$bbox[0])/2);

$pos = ceil((87-$width)/2);
$posx = $pos-$height;
$posy = $pos+$height;

imagettftext($im, 12, 0, $posx, $posy, $white, $font, $title);

imagepng($im);
imagedestroy($im);
?>


<?php
header('Content-Type: image/png');

$title = $_REQUEST['name'];
$angle1 = $_REQUEST['angle1'];
$angle2 = $_REQUEST['angle2'];

$im = imagecreatetruecolor(87, 80);
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);
imagefill($im, 87, 80, $black);
imagecolortransparent($im, $black);

$white = imagecolorallocate($im, 255, 255, 255);
$font = 'css/font/avenir-book.ttf';

$bbox = imagettfbbox(8,$angle1,"css/font/avenir-book.ttf", $title);
$width = $bbox[2]-$bbox[0];
$height = ceil(($bbox[6]-$bbox[0])/2);

$pos = ceil((87-$width)/2);
$posx = $pos-$height;
$posy = $pos+$height;

imagettftext($im, 8, $angle2, $posx, $posy, $white, $font, $title);

imagepng($im);
imagedestroy($im);
?>



