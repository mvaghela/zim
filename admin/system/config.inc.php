<?php
ob_start();
session_start();

############################################
#	Database Server
############################################

if($_SERVER['HTTP_HOST']=="localhost")
{
$editerlink="http://localhost/Zymba/admin/";

define("DB_NAME","zymba");
define("SERVER_NAME","localhost");
define("USER_NAME","root");
define("PASSWORD","");
$path="http://localhost/Zymba/";
} else {
$editerlink="http://www.zimba-customtailor.com/development/admin/";
	
	
define("DB_NAME","zimbacus_zymba");
define("SERVER_NAME","localhost");
define("USER_NAME","zimbacus_zymba");
define("PASSWORD","mt-Df8x.s1l7");
$path="http://www.zimba-customtailor.com/development/";
}



include("system/classmysql.inc.php");
include("system/commonfunc.php");
include("system/sitefunction.php");


define("UPLOAD_DIR",'images/diagram/');
define("UPLOAD_DIR_ICON",'images/icon/');
############################################
#		Global Varibles
############################################

// for the row per pages
define('ROW_PER_PAGE',10);

//For the inc folders
define("INC","inc/");



//For the Function File of the pages folders
define("FUNC","func/");

//For the path of the system folder
define("SYSTEM","system/");

//Path of Photo
define("PHOTOBIG","upload/photo/big/");
define("PHOTOTHUM","upload/photo/thum/");

//Global veriable
define("audio_photo_thumb_height",90);
define("audio_photo_thumb_width",120);

################################################################
#		Database Class
################################################################
$obj_db = new dbclass();


##  GET MASTER ADMIN DATA  ##
//Comrnted by me
/*$sql_madmin="SELECT *  FROM `auc_admin`  WHERE enumtype = 'Master'";
$res_madmin=$obj_db->select($sql_madmin);
$admin_emailid = $res_madmin[0]['varemailid'];*/



$sitename="Zymba";

if($_SERVER['HTTP_HOST']=="localhost")
{
$siteurl="http://localhost/Zymba/";
} else {
$siteurl="http://www.zimba-customtailor.com/development/";
}




$curl = curPageURL();

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

$ip = $_SERVER['REMOTE_ADDR']; 

function checkdb($value) {
	$value=addslashes($value);
	$value=utf8_encode($value);
	return $value;
}
function revercecheckdb($value) {
	$value=stripslashes($value);
	$value=utf8_decode($value);
	return $value;
}

?>
