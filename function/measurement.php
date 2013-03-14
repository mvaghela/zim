<?php
if(!$_SESSION['userid'])
{
	header("location:index.php");
	die();
}

if(isset($_REQUEST['id']) && $_REQUEST['id']!='')
{
	//Delete measurement
	$delete_measurement="DELETE FROM `".$_REQUEST['type']."_measurements` WHERE `measurement_id`='".$_REQUEST['id']."' AND `user_id`='".$_SESSION['userid']."'";
	$del_res=$obj_db->sql_query($delete_measurement);
	header("location:measurement.php");
	die();
}

//Select all the measurements
$select_shirt_measurement="SELECT * FROM `shirt_measurements` WHERE `user_id`='".$_SESSION['userid']."'";
$shirt_measurement=$obj_db->select($select_shirt_measurement);

$select_blazer_measurement="SELECT * FROM `blazer_measurements` WHERE `user_id`='".$_SESSION['userid']."'";
$blazer_measurement=$obj_db->select($select_blazer_measurement);

$select_pant_measurement="SELECT * FROM `pant_measurements` WHERE `user_id`='".$_SESSION['userid']."'";
$pant_measurement=$obj_db->select($select_pant_measurement);
?>