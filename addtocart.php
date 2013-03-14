<?php include("system/config.inc.php"); 
//if($_POST['submit']=='ADD TO CART') {
//$id=$_REQUEST['id'];
$lastpage = $_SERVER['HTTP_REFERER'];

//chk gor allredy ther or not----
$galsql="SELECT * FROM `cart` WHERE `cartsessionid`='".$_SESSION['key']."' AND `productid`='".$_REQUEST['productid']."'";
$galresult=$obj_db->select($galsql);	
	if($galresult) {
			$qty=$galresult[0]['qty']+1;
// if allredy inserted then update*---------		
$tsql="UPDATE `cart` SET `qty` = '".$qty."' WHERE `cartid` ='".$galresult[0]['cartid']."'"; 
$tresult=$obj_db->sql_query($tsql); 
header("location:".$lastpage."");
die();
} else { 
// if not then inserted*---------		
$qty=1;
$sql="INSERT INTO `cart` ( `productid`, `qty`,`cartsessionid`, `date`) 
		VALUES ( '".$_REQUEST['productid']."', '".$qty."','".$_SESSION['key']."', NOW())"; //die();
$result=$obj_db->insert($sql); 
header("location:".$lastpage."");
die();
}
?>