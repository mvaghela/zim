<?php
if(!isset($_SESSION['adsadmin'])) {
	header("location:login.php");
	die();
}
if(isset($_REQUEST['change'])) {
 
   if($_REQUEST['status']=='active')
   {
  $del_status="UPDATE `option` SET `status` = 'inactive'  WHERE `optionid` = '".$_REQUEST['change']."'"; 
  
   $status_cat=$obj_db->sql_query($del_status);
   } else {
$del_status="UPDATE `option` SET `status` = 'active'  WHERE `optionid` = '".$_REQUEST['change']."'";
   $status_cat=$obj_db->sql_query($del_status);
   }
   header("location:option.php?msg=updated&page=".$_REQUEST['page']); 
   die();
 
} 

if(isset($_REQUEST['changedo']))
	{
		$totalrow=$_REQUEST['totalrow'];
		for($i=0;$i<$totalrow;$i++)
		{
			$sqlstatus="UPDATE `option` SET `dispalyorder`='".$_POST['category'.$i]."' WHERE `optionid` = ".$_POST['id'.$i].""; 
			$status=$obj_db->sql_query($sqlstatus);
		}
		$_SESSION['msg']="Display Order Updated Successfully.";

		header("location:option.php?msg=updated&page=".$_REQUEST['page']); 
		die();
}

if(isset($_REQUEST['del'])) {
   $del_sql="DELETE FROM `option` WHERE `optionid` = '".$_REQUEST['del']."'";
   $del_cat=$obj_db->sql_query($del_sql);
   
   header("location:option.php?msg=deleted&page=".$_REQUEST['page']); 
  
   die();
     
}
$urltitle=strtolower($_REQUEST['uname']);
$urltitle=addslashes($urltitle);
$for=$_POST['for'];
$cname=$_POST['cname'];
$page=$_POST['page'];



$newtitle=preg_replace('/[^a-z0-9]/i',' ', $urltitle);
$uniqname=str_replace(" ","-",$newtitle);

if(isset($_REQUEST['submit']) AND $_REQUEST['submit']=='Submit') {
  $v_id=$_REQUEST['optionid'];
					                  
						if($v_id=="addnew") {
							$sql_insert="INSERT INTO `option` (`optionname`,`uniqname`,`status`,`date`)
							 VALUES ('$cname','$uniqname','".$_POST['status']."', NOW())";
						   $insert_faq=$obj_db->insert($sql_insert);
						   header("location:option.php?msg=added"); 

						   die();
						} else {
							 $sql_faq="UPDATE `option` SET `optionname` = '".$_REQUEST['cname']."',`uniqname` = '$uniqname',`status` = '".$_POST['status']."' WHERE `optionid` = ".$_REQUEST['optionid']."";  
							$update_faq=$obj_db->sql_query($sql_faq);
					 		header("location:option.php?msg=updated&page=$page"); 

						   die();
						}

	
}
?>