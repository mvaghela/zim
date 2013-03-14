<?php
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Modify Measurement')
{
	$type=$_REQUEST['type'];
	$col=$_REQUEST['col'];
	$id=$_REQUEST['id'];
	$val=$_REQUEST['length'];

	if($type=='shirt')
	{
		$update_measurement="UPDATE `shirt_measurements` SET `".$col."`='".$val."', `createdate`=NOW() WHERE `measurement_id`=".$id.""; //die();	
	}
	if($type=='pant')
	{
		$update_measurement="UPDATE `pant_measurements` SET `".$col."`='".$val."', `createdate`=NOW() WHERE `measurement_id`=".$id.""; //die();			
	}
	if($type=='blazer')
	{
		$update_measurement="UPDATE `blazer_measurements` SET `".$col."`='".$val."', `createdate`=NOW() WHERE `measurement_id`=".$id."";		
	}
	$update_res=$obj_db->sql_query($update_measurement);
	header("location:measurement.php");
}
?>