<?php
if(!isset($_SESSION['adsadmin'])) {
	header("location:login.php");
	die();
}
if(isset($_REQUEST['change'])) {
 
   if($_REQUEST['status']=='active')
   {
  $del_status="UPDATE `optiontype` SET `status` = 'inactive'  WHERE `optiontypeid` = '".$_REQUEST['change']."'"; 
  
   $status_cat=$obj_db->sql_query($del_status);
   } else {
$del_status="UPDATE `optiontype` SET `status` = 'active'  WHERE `optiontypeid` = '".$_REQUEST['change']."'";
   $status_cat=$obj_db->sql_query($del_status);
  
   }
 
   header("location:optiontype.php?msg=updated&optionid=".$_REQUEST['optionid'].""); 
   die();
   
} 


if(isset($_REQUEST['del'])) {
	$del_sql="DELETE FROM `optiontype` WHERE `optiontypeid` = '".$_REQUEST['del']."'";
   $del_cat=$obj_db->sql_query($del_sql);
  
  
   header("location:optiontype.php?msg=deleted&optionid=".$_REQUEST['optionid'].""); 
   die();
     
}
$urltitle=strtolower($_REQUEST['uname']);
$urltitle=addslashes($urltitle);
$newtitle=preg_replace('/[^a-z0-9]/i',' ', $urltitle);
$uniqname=str_replace(" ","-",$newtitle);

if(isset($_REQUEST['submit'])) {
  $v_id=$_REQUEST['optiontypeid'];
					                  
						if($v_id=="addnew") {
							$sql_insert="INSERT INTO `optiontype` (`optionid`,`optiontypename`,`uniqname`,`status`,`date`)
							 VALUES ('".$_REQUEST['optionid']."','".$_REQUEST['scname']."','$uniqname','".$_POST['status']."', NOW())"; 
						   $insert_faq=$obj_db->insert($sql_insert);
						   header("location:optiontype.php?msg=added&optionid=".$_REQUEST['optionid'].""); 
						   die();
						} else {
							$sql_faq="UPDATE `optiontype` SET `optiontypename` = '".$_REQUEST['scname']."',`uniqname` = '$uniqname',`status` = '".$_POST['status']."' WHERE `optiontypeid` = ".$_REQUEST['optiontypeid']."";  
							$update_faq=$obj_db->sql_query($sql_faq);
							 header("location:optiontype.php?msg=updated&optionid=".$_REQUEST['optionid'].""); 
						   die();
						}

	
}

?>