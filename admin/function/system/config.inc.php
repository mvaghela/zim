<?php
ob_start();
session_start();
$_SESSION['key'] = session_id();
############################################
#	Database Server
############################################

if($_SERVER['HTTP_HOST']=="localhost")
{
define("DB_NAME","zymba");
define("SERVER_NAME","localhost");
define("USER_NAME","root");
define("PASSWORD","");
$path="http://localhost/Zymba/";

} else {
	/*
define("DB_NAME","newblackgoldgolf");
define("SERVER_NAME","newblackgoldgolf.db.8775995.hostedresource.com");
define("USER_NAME","newblackgoldgolf");
define("PASSWORD","do#mi)nG12o");
$path="http://www.manektech.net/blackgoldgolf/";
*/

define("DB_NAME","web76-zymba");
define("SERVER_NAME","localhost");
define("USER_NAME","web76-zymba");
define("PASSWORD","zymba");
$path="http://www.manektech.net/Zymba/";


}

include("system/classmysql.inc.php");
include("system/commonfunc.php");
include("system/sitefunction.php");


define("UPLOAD_DIR",'images/diagram/');
define("UPLOAD_DIR_ICON",'images/icon/');
############################################
#		Global Varibles
############################################
//payment info
//define('REGKEY',"86nkc6MgAL35C93P");
//define('MERCHANTID',"55xWN5jS");
define('REGKEY',"37Lbb4f8R42ef2TZ");
define('MERCHANTID',"3942BL3syR");


define("SITENAME","Zymba");
################################################################
#		Database Class
################################################################
$obj_db = new dbclass();


// is Subcategory name specified in URL than get his id

$sitename="Zymba";


if($_SERVER['HTTP_HOST']=="localhost")
{
$siteurl="http://localhost/Zymba/";
} else {
$siteurl="http://www.Zymba.com/";
}

if($_SESSION['admindata']=='') {
$sql="SELECT * FROM `admin`";
$res=$obj_db->select($sql);
$_SESSION['email']=$res[0]['varemailid'];
$_SESSION['phone']=$res[0]['varphoneno'];
$_SESSION['address']=$res[0]['address'];
$_SESSION['locationname']=$res[0]['locationname'];
$_SESSION['admindata']="yes";
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
$pagenamefirst=basename(curPageURL());
$pagenamearr=explode("?",$pagenamefirst);
$pagename=explode(".",$pagenamearr[0]);
if(strtolower($pagename[1])=='asp') {
 header("HTTP/1.1 301 Moved Permanently");
 header("Location:http://www.Zymba.com/");
}
$ip = $_SERVER['REMOTE_ADDR']; 

if($_SERVER["HTTPS"] == "on" AND $http!="on") {
	
 $pageURL = "Location: http://";
 $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

 header($pageURL);
 exit();
}

?>
