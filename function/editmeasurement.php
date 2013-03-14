<?php
if(!$_SESSION['userid'])
{
	header("location:index.php");
	die();
}
if(isset($_REQUEST['submit']))
{
	if($_REQUEST['type']=='shirt')
	{
		$update_measurement="UPDATE `shirt_measurements` SET
									`shirt_length`='".$_REQUEST['shirtlength']."',`shirt_shoulder`='".$_REQUEST['shoulder']."',
									`shirt_sleeve_length`='".$_REQUEST['sleeve']."',`chest`='".$_REQUEST['chest']."',
									`stomach`='".$_REQUEST['stomach']."',`hip`='".$_REQUEST['hip']."',
									`shirt_neck`='".$_REQUEST['neck']."',`shirt_knee`='".$_REQUEST['knee']."',
									`wrist`='".$_REQUEST['wrist']."'									
									WHERE `measurement_id`='".$_REQUEST['id']."' AND `user_id`=".$_SESSION['userid']."";
		$measurement_result=$obj_db->select($update_measurement);
		header("location: measurement.php");
		die();
	}
	if($_REQUEST['type']=='pant')
	{
		$update_measurement="UPDATE `pant_measurements` SET
									`waist_level`='".$_REQUEST['waistlevel']."',`pant_length`='".$_REQUEST['pantlength']."',
									`pant_waist`='".$_REQUEST['pantwaist']."',`pant_hip`='".$_REQUEST['panthip']."',
									`pant_bottom`='".$_REQUEST['pantbottom']."' 									
									WHERE `measurement_id`='".$_REQUEST['id']."' AND `user_id`=".$_SESSION['userid']."";
		$measurement_result=$obj_db->select($update_measurement);
		header("location: measurement.php");
		die();
	}
	if($_REQUEST['type']=='blazer')
	{
		$update_measurement="UPDATE `blazer_measurements` SET
									`suit_length`='".$_REQUEST['suitlength']."',`suit_shoulder`='".$_REQUEST['suitshoulder']."',
									`suit_sleeve_length`='".$_REQUEST['suitsleeve']."' 									
									WHERE `measurement_id`='".$_REQUEST['id']."' AND `user_id`=".$_SESSION['userid']."";
		$measurement_result=$obj_db->select($update_measurement);
		header("location: measurement.php");
		die();
	}
}
?>