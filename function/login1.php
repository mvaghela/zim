<?php
if($_POST['submit']!='' && $_POST['submit']=='login') {
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$sql="SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'"; 
	$result=$obj_db->select($sql);
	if(count($result)==''){
		header("location:account_settings.php?msg=1");
		die();	
	}
	if($result[0]['status']=='inactive'){
		header("location:account_settings.php?msg=2");
		die();	
	}
	if($result[0]['status']=='block'){
		header("location:account_settings.php?msg=3");
		die();	
	}
	
	$_SESSION['firstname'] = $result[0]['firstname'];
	$_SESSION['lastname'] = $result[0]['lastname'];
	$_SESSION['email'] = $result[0]['email'];
	$_SESSION['telephone'] = $result[0]['phone'];
	$_SESSION['userid'] = $result[0]['userid'];
	
	$update_shirt_measurement="UPDATE `shirt_measurements` SET `user_id`='".$_SESSION['userid']."' WHERE `user_id`='".$_SESSION['key']."'";
	$shirt_res=$obj_db->sql_query($update_shirt_measurement);
	
	$update_blazer_measurement="UPDATE `blazer_measurements` SET `user_id`='".$_SESSION['userid']."' WHERE `user_id`='".$_SESSION['key']."'";
	$blazer_res=$obj_db->sql_query($update_blazer_measurement);
	
	$update_pant_measurement="UPDATE `pant_measurements` SET `user_id`='".$_SESSION['userid']."' WHERE `user_id`='".$_SESSION['key']."'";
	$pant_res=$obj_db->sql_query($update_pant_measurement);
	
	$update_shirt_customization="UPDATE `saveshirtcustomize` SET `userid`='".$_SESSION['userid']."' WHERE `userid`='".$_SESSION['key']."'";
	$pant_res=$obj_db->sql_query($update_shirt_customization);
	
	$update_shirt_customization="UPDATE `savepantcustomize` SET `userid`='".$_SESSION['userid']."' WHERE `userid`='".$_SESSION['key']."'";
	$pant_res=$obj_db->sql_query($update_shirt_customization);

	
	header("location:shipping.php");	
	die();
	
}
?>