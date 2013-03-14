<?php
include("system/config.inc.php");
$productid=$_REQUEST['id'];

$select_wishlist="SELECT * FROM `wishlist` WHERE `userid`=".$_SESSION['userid']." AND `productid`=".$productid."";
$wish_result=$obj_db->select($select_wishlist);

if(count($wish_result)==0)
{
	//Insert into wishlist
	$insert="INSERT INTO `wishlist` (`productid`,`userid`) VALUES ('".$productid."','".$_SESSION['userid']."')";
	$res=$obj_db->insert($insert);
}
?>