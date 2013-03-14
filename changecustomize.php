<?php
include("system/config.inc.php"); 
if(isset($_GET['pid']))
{
	if($_GET['type']=='shirt')
	{
		$data = $_GET['image'];
		if($_GET['image']=='full' || $_GET['image']=='half')
		{
			$sql1 = "select * from `saveshirtcustomize` where `productid` = '".$_GET['pid']."' AND `userid` = '".$_SESSION['userid']."'";
			$result1=$obj_db->select($sql1);
			$shirtdata = $result1[0]['fit'];
			$sleevetype= explode('-',$shirtdata);
			$left = "style_".$_GET['image']."_".$sleevetype[0]."_"."sleeve";
			
			
			$sql = "select * from `shirtcustomization` where productid = ".$_GET['pid']."";
			$result=$obj_db->select($sql);
			$shirtdata1 = $result[0][$left];
			$data = $left.'-'.$shirtdata1;
			
		}
		
		 	$sql_user="UPDATE `saveshirtcustomize` SET `".$_GET['id']."` = '".$data."', `createdate`=NOW() where `productid` = '".$_GET['pid']."' AND `userid` = '".$_SESSION['userid']."' "; //die();
			$update=$obj_db->sql_query($sql_user);
	}
	if($_GET['type']=='pant')
	{
		
		$data = $_GET['image'];
		if($_GET['image']=='narrow' || $_GET['image']=='stright' || $_GET['image']=='bellbottom')
		{
			$sql1 = "select * from `savepantcustomize` where `productid` = '".$_GET['pid']."' AND `userid` = '".$_SESSION['userid']."'";
			$result1=$obj_db->select($sql1);
			$shirtdata = $result1[0]['fit'];//narrow--fit_loosefit_bellbottom_front-
			$sleevetype= explode('-',$shirtdata);
			$data = $sleevetype[0]."_".$_GET['image']."_front-";
			
			
			
		}
		
		if($_GET['image']=='cross_pocket_front' || $_GET['image']=='round_pocket_front' || $_GET['image']=='stright_pocket_front' || $_GET['image']=='lshape_pocket_front' || $_GET['image']=='no_pocket_front' )
		{
			$sql1 = "select * from `savepantcustomize` where `productid` = '".$_GET['pid']."' AND `userid` = '".$_SESSION['userid']."'";
			$result1=$obj_db->select($sql1);
			$shirtdata = $result1[0]['waist'];//waist_low_lshape_pocket_front,belt_cut_buttoned_fron
			$sleevetype= explode('-',$shirtdata);
			$left = $sleevetype[0]."_".$_GET['image'];
			
			
			$sql = "select * from `pantcustomizationnew` where productid = ".$_GET['pid']."";
			$result=$obj_db->select($sql);
			$shirtdata1 = $result[0][$left];
			$data = $left.'-'.$shirtdata1;
			
		}
		
		if($_GET['image']=='belt_cut_buttoned_front' || $_GET['image']=='belt_cut_hock_front' || $_GET['image']=='belt_long_buttoned_front' || $_GET['image']=='belt_long_hook_front' || $_GET['image']=='belt_long_hook_buttoned_front' )
		{
			$sql1 = "select * from `savepantcustomize` where `productid` = '".$_GET['pid']."' AND `userid` = '".$_SESSION['userid']."'";
			$result1=$obj_db->select($sql1);
			$shirtdata = $result1[0]['waist'];//waist_low_belt_long_buttoned_front
			$sleevetype= explode('-',$shirtdata);
			$left = $sleevetype[0]."_".$_GET['image'];
			
			
			$sql = "select * from `pantcustomizationnew` where productid = ".$_GET['pid']."";
			$result=$obj_db->select($sql);
			$shirtdata1 = $result[0][$left];
			$data = $left.'-'.$shirtdata1;
			
		}
		
		
		if($_GET['image']=='back_pocket_left' || $_GET['image']=='back_pocket_right' || $_GET['image']=='back_pocket_both' || $_GET['image']=='back_pocket_none' )
		{
			$sql1 = "select * from `savepantcustomize` where `productid` = '".$_GET['pid']."' AND `userid` = '".$_SESSION['userid']."'";
			$result1=$obj_db->select($sql1);
			$shirtdata = $result1[0]['waist'];//waist_low_back_pocket_right_singlewelthook-
			$sleevetype= explode('-',$shirtdata);
			
			$shirtdata1 = $result1[0]['back_pocket_style'];//waist_low_back_pocket_right_singlewelthook-
			$sleevetype1= explode('_',$shirtdata1);
			$sleevetype2= explode('-',$sleevetype1[5]);
			
			$left = $sleevetype[0]."_".$_GET['image']."_".$sleevetype2[0];
			
			
			$sql = "select * from `pantcustomizationnew` where productid = ".$_GET['pid']."";
			$result=$obj_db->select($sql);
			$shirtdata11 = $result[0][$left];
			$data = $left.'-'.$shirtdata11;
			
		}
		
		if($_GET['image']=='singlewelthook' || $_GET['image']=='doublewelthook' || $_GET['image']=='singleweltbutton' || $_GET['image']=='doubleweltbutton' )
		{
			$sql1 = "select * from `savepantcustomize` where `productid` = '".$_GET['pid']."' AND `userid` = '".$_SESSION['userid']."'";
			$result1=$obj_db->select($sql1);
			$shirtdata = $result1[0]['back_pocket'];//waist_low_back_pocket_right_singlewelthook
			$sleevetype= explode('-',$shirtdata);
			
			//$shirtdata1 = $result1[0]['back_pocket_style'];//waist_low_back_pocket_right_singlewelthook-
			$sleevetype1= explode('_',$sleevetype[0]);
			$sleevetype2= $sleevetype1[0]."_".$sleevetype1[1]."_".$sleevetype1[2]."_".$sleevetype1[3]."_".$sleevetype1[4];
			
			$left = $sleevetype2."_".$_GET['image'];
			
			
			$sql = "select * from `pantcustomizationnew` where productid = ".$_GET['pid']."";
			$result=$obj_db->select($sql);
			$shirtdata11 = $result[0][$left];
			$data = $left.'-'.$shirtdata11;
			
		}
		
		
		
		
		
			$sql_user="UPDATE `savepantcustomize` SET `".$_GET['id']."` = '".$data."', `createdate`=NOW() where `productid` = '".$_GET['pid']."' AND `userid` = '".$_SESSION['userid']."' "; //die();
			$update=$obj_db->sql_query($sql_user);
	}
	if($_GET['type']=='suit')
	{
			 $sql_user="UPDATE `savesuitcustomize` SET `".$_GET['id']."` = '".$_GET['image']."', `createdate`=NOW() where `productid` = '".$_GET['pid']."' AND `userid` = '".$_SESSION['userid']."' "; //die();
			$update=$obj_db->sql_query($sql_user);
	}
}
?>