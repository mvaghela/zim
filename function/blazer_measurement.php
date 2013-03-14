<?php
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Finish!'){
	$suit_length=$_REQUEST['suitlength'];
	$suit_shoulder=$_REQUEST['suitshoulder'];
	$suit_sleeve_length=$_REQUEST['suitsleevelength'];
	$measurement_name=$_REQUEST['measurement'];
	if($_SESSION['userid']!=''){
		$user=$_SESSION['userid'];
	}else{
		$user=$_SESSION['key'];
	}
	
	$insert_suit_measurement="INSERT INTO `blazer_measurements`(
							`user_id`, `measurement_name`, `suit_length`, 
							`suit_shoulder`, `suit_sleeve_length`, `createdate`)
							 VALUES ('$user', '$measurement_name', '$suit_length', '$suit_shoulder', '$suit_sleeve_length',  NOW());";
	$insert_res=$obj_db->insert($insert_suit_measurement);
	
	header("location:shoppingbag.php");
}
?>