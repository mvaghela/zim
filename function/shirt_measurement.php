<?php
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Finish!'){
	$shape=$_REQUEST['body_shape_shirt'];
	$fit=$_REQUEST['shirt_fit'];
	$shirt_length=$_REQUEST['shirtlength'];
	$stomach=$_REQUEST['stomach'];
	$shirt_shoulder=$_REQUEST['shirtshoulder'];
	$shirt_sleeve_length=$_REQUEST['shirtsleevelength'];
	$chest=$_REQUEST['chest'];
	$hip=$_REQUEST['hip'];
	$shirt_neck=$_REQUEST['shirtneck'];
	$shirt_knee=$_REQUEST['shirtknee'];
	$wrist=$_REQUEST['wrist'];
	$measurement_name=$_REQUEST['measurement'];
	if($_SESSION['userid']!=''){
		$user=$_SESSION['userid'];
	}else{
		$user=$_SESSION['key'];
	}	
	$insert_shirt_measurement="INSERT INTO `shirt_measurements`(
							`body_shape`,`shirt_fit`,
							`user_id`, `measurement_name`, `shirt_length`, 
							`shirt_shoulder`, `shirt_sleeve_length`, `chest`, `stomach`, 
							`hip`, `shirt_neck`, `shirt_knee`, `wrist`, `createdate`)
							 VALUES ('$shape', '$fit', '$user', '$measurement_name', '$shirt_length', '$shirt_shoulder', '$shirt_sleeve_length', '$chest', '$stomach',
							  '$hip', '$shirt_neck', '$shirt_knee', '$wrist', NOW());";
	$insert_res=$obj_db->insert($insert_shirt_measurement);
	
	header("location:shoppingbag.php");
}
?>