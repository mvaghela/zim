<?php
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Finish!'){
	$shape=$_REQUEST['body_shape_pant'];
	$pant_fit=$_REQUEST['pant_fit'];
	$pant_waist_image=$_REQUEST['pant_waist_image'];
	$waist_level=$_REQUEST['waistlevel'];
	$pant_length=$_REQUEST['pantlength'];
	$pant_waist=$_REQUEST['pantwaist'];
	$pant_hip=$_REQUEST['panthip'];
	$pant_bottom=$_REQUEST['pantbottom'];
	$measurement_name=$_REQUEST['measurement'];
	if($_SESSION['userid']!=''){
		$user=$_SESSION['userid'];
	}else{
		$user=$_SESSION['key'];
	}
	
	$insert_pant_measurement="INSERT INTO `pant_measurements`(
							`user_id`, `measurement_name`, `waist_level`,
							`body_shape`,`pant_fit`,`pant_waist_image`, 
							`pant_length`, `pant_waist`, `pant_hip`, `pant_bottom`, `createdate`)
							 VALUES ('$user', '$measurement_name', '$waist_level', '$shape', '$pant_fit', '$pant_waist_image', '$pant_length', '$pant_waist', '$pant_hip', '$pant_bottom', NOW());";
	$insert_res=$obj_db->insert($insert_pant_measurement);
	
	header("location:shoppingbag.php");
}
?>