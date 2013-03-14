<?php
include("system/config.inc.php");
	$type=$_POST['type'];
	$id=$_POST['id'];	
	$product=$_POST['productid'];
	
	$select_measurement="SELECT * FROM `".$type."_measurements` WHERE `measurement_id`='$id'";
	$result=$obj_db->select($select_measurement);
	$_SESSION['measurementid'][$type][$product]=$result[0]['measurement_id'];
	
	$update_cart="UPDATE `cart` SET `cart`.`measurement_id`='".$id."',`cart`.`measurement_type`='".$type."' WHERE `cart`.`productid`='".$product."' AND `cartsessionid`='".$_SESSION['key']."'";
	$cart_res=$obj_db->sql_query($update_cart);
 //header("location:viewcart.php");
?> 