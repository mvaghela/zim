<?php
include("system/config.inc.php");
	$type=$_POST['type'];
	$id=$_POST['id'];	
	$product=$_POST['productid'];
	
	$select_measurement="SELECT * FROM `shirt_measurements` WHERE `measurement_id`='$id'";
	$result=$obj_db->select($select_measurement);
	echo $_SESSION['measurementid'][$product]=$result[0]['measurement_id'];
	
 //header("location:viewcart.php");

?>