<?php
header('Content-Type: image/png');

$title = $_REQUEST['name'];
$angle1 = $_REQUEST['angle1'];
$angle2 = $_REQUEST['angle2'];
$for = $_REQUEST['for'];
if($for=='placket')
{
	$result_title = "";
		for($i=0;$i<strlen($title);$i++)
		{
			$result_title .= $title[$i]."\n";
		}
	$title = $result_title;
}

$im = imagecreatetruecolor(87, 120);
$white = imagecolorallocate($im, $_REQUEST['red'], $_REQUEST['green'], $_REQUEST['blue']);
$black = imagecolorallocate($im, 0, 0, 0);
imagefill($im, 87, 120, $black);
imagecolortransparent($im, $black);

$white = imagecolorallocate($im, $_REQUEST['red'], $_REQUEST['green'], $_REQUEST['blue']);
$font = 'admin/upload/font/'.$_REQUEST['fonttype'].'';

$bbox = imagettfbbox(5,$angle1,"admin/upload/font/".$_REQUEST['fonttype']."", $title);
$width = $bbox[2]-$bbox[0];
$height = ceil(($bbox[6]-$bbox[0])/2);

$pos = ceil((87-$width)/2);
$posx = $pos-$height;
$posy = $pos+$height;

imagettftext($im, 5, $angle2, $posx, $posy, $white, $font, $title);

imagepng($im);
imagedestroy($im);
/*

$result_title = "";
for($i=0;$i<strlen($title);$i++)
{
	$result_title .= $title[$i]."\n";
}

$title = $result_title;

*/
?>
