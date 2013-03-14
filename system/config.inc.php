<?php
ob_start();
 session_start();

  if( isset( $_GET['logout'] ) )
  {
    session_destroy();
   
  }

  if( !isset( $_SESSION['login'] ) )
  {
    if( !isset( $_SERVER['PHP_AUTH_USER'] ) || !isset( $_SERVER['PHP_AUTH_PW'] ) )
    {
      header("HTTP/1.0 401 Unauthorized");
      header("WWW-authenticate: Basic realm=\"Enter User Name and Password\"");
      header("Content-type: text/html");
      // Print HTML that a password is required
      exit;
    }
    else
    {
      // Validate the $_SERVER['PHP_AUTH_USER'] & $_SERVER['PHP_AUTH_PW']
      if( $_SERVER['PHP_AUTH_USER']!='admin'
          || $_SERVER['PHP_AUTH_PW']!='admin' )
      {
        // Invalid: 401 Error & Exit
        header("HTTP/1.0 401 Unauthorized");
        header("WWW-authenticate: Basic realm=\"Tets\"");
        header("Content-type: text/html");
        // Print HTML that a username or password is not valid
        exit;
      }
      else
      {
        // Valid
        $_SESSION['login']=true;
      }
    }
  }
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


define("DB_NAME","web76-zymba");
define("SERVER_NAME","localhost");
define("USER_NAME","web76-zymba");
define("PASSWORD","zymba");
$path="http://www.manektech.net/Zymba/";*/

define("DB_NAME","zimbacus_development");
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
$siteurl="http://www.zimba-customtailor.com/development/";
}


if(!isset($_SESSION['admin'])){
	$adminsql="SELECT * FROM `admin`";
	$adminres=$obj_db->select($adminsql);
	//$_SESSION['admin']=$adminres;
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
 header("Location:http://www.zimba-customtailor.com/development/");
}
$ip = $_SERVER['REMOTE_ADDR']; 

if($_SERVER["HTTPS"] == "on" AND $http!="on") {
	
 $pageURL = "Location: http://";
 $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

 header($pageURL);
 exit();
}

?>
