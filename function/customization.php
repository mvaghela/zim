<?php
if(!$_SESSION['userid'])
{
	header("location:index.php");
	die();
}

if(isset($_REQUEST['id']) && $_REQUEST['id']!='')
{
	
	//Delete Customization
	$delete_customization="DELETE FROM `save".$_GET['type']."customize` WHERE `save".$_GET['type']."customizeid`='".$_REQUEST['id']."' AND `userid`='".$_SESSION['userid']."'";
	$del_res=$obj_db->sql_query($delete_customization);
	header("location:customization.php");
	die();
}

//Select all the customizations
$select_customization="SELECT * FROM `saveshirtcustomize` WHERE `userid`='".$_SESSION['userid']."'";
$shirt_customization=$obj_db->select($select_customization);

$select_blazer_customization="SELECT * FROM `savesuitcustomize` WHERE `userid`='".$_SESSION['userid']."'";
$blazer_customization=$obj_db->select($select_blazer_customization);

$select_pant_customization="SELECT * FROM `savepantcustomize` WHERE `userid`='".$_SESSION['userid']."'";
$pant_costomization=$obj_db->select($select_pant_customization);

?>