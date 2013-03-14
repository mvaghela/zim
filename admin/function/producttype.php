<?php
if(!isset($_SESSION['adsadmin'])) {
	header("location:login.php");
	die();
}
if(isset($_REQUEST['change'])) {
 
   if($_REQUEST['status']=='active')
   {
  $del_status="UPDATE `producttype` SET `status` = 'inactive'  WHERE `producttypeid` = '".$_REQUEST['change']."'"; 
  
   $status_cat=$obj_db->sql_query($del_status);
   } else {
$del_status="UPDATE `producttype` SET `status` = 'active'  WHERE `producttypeid` = '".$_REQUEST['change']."'";
   $status_cat=$obj_db->sql_query($del_status);
   }
   header("location:producttype.php?msg=updated&page=".$_REQUEST['page']); 
   die();
 
} 

if(isset($_REQUEST['changedo']))
	{
		$totalrow=$_REQUEST['totalrow'];
		for($i=0;$i<$totalrow;$i++)
		{
			$sqlstatus="UPDATE `producttype` SET `dispalyorder`='".$_POST['category'.$i]."' WHERE `producttypeid` = ".$_POST['id'.$i].""; 
			$status=$obj_db->sql_query($sqlstatus);
		}
		$_SESSION['msg']="Display Order Updated Successfully.";

		header("location:producttype.php?msg=updated&page=".$_REQUEST['page']); 
		die();
}

if(isset($_REQUEST['del'])) {
   $del_sql="DELETE FROM `producttype` WHERE `producttypeid` = '".$_REQUEST['del']."'";
   $del_cat=$obj_db->sql_query($del_sql);
   
   header("location:producttype.php?msg=deleted&page=".$_REQUEST['page']); 
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
  $v_id=$_REQUEST['producttypeid'];
					                  
						if($v_id=="addnew") {
							$sql_insert="INSERT INTO `producttype` (`producttypename`,`uniqname`,`status`,`date`)
							 VALUES ('$cname','$uniqname','".$_POST['status']."', NOW())"; 
						   $insert_faq=$obj_db->insert($sql_insert);
						   header("location:producttype.php?msg=added"); 

						   die();
						} else {
							 $sql_faq="UPDATE `producttype` SET `producttypename` = '".$_REQUEST['cname']."',`uniqname` = '$uniqname',`status` = '".$_POST['status']."' WHERE `producttypeid` = ".$_REQUEST['producttypeid']."";  //die();
							$update_faq=$obj_db->sql_query($sql_faq);
					 		header("location:producttype.php?msg=updated&page=$page"); 
						   die();
						}
}
?>