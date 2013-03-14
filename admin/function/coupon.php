<?php
if(!isset($_SESSION['adsadmin'])) {
	header("location:login.php");
	die();
}
if(isset($_REQUEST['del'])) {
   $del_sql="DELETE FROM `coupon` WHERE `coupon_id` = '".$_REQUEST['del']."'";
   $del_cat=$obj_db->sql_query($del_sql);
   
   header("location:coupon.php?msg=deleted&page=".$_REQUEST['page']);
   die();
     
}
$cname=addslashes($_REQUEST['cname']);
$code=addslashes($_REQUEST['code']);
$value=addslashes($_REQUEST['value']);
$page=$_POST['page'];

if(isset($_REQUEST['submit']) AND $_REQUEST['submit']=='Submit') {
  	$id=$_REQUEST['id'];
	//Check coupon
	$select_coupon="SELECT * FROM `coupon` WHERE `coupon_code`='".$code."'";
	$code_res=$obj_db->select($select_coupon);
	
	if(count($code_res)>0){
		header("location:coupon.php?msg=1");	
	}
	
	if($id=="addnew") {
		$sql_insert="INSERT INTO `coupon` (`coupon_name`,`coupon_code`,`coupon_value`,`coupon_created_date`)
		 			VALUES ('".$cname."','".$code."','".$value."', NOW())";
	   	$insert_faq=$obj_db->insert($sql_insert);
	   	header("location:coupon.php?msg=added"); 
	
	   	die();
	} else {
		$sql_faq="UPDATE `coupon` SET `coupon_name` = '".$cname."',`coupon_code` = '".$code."',`coupon_value` = '".$value."' WHERE `coupon_id` = ".$_REQUEST['id']."";  
		$update_faq=$obj_db->sql_query($sql_faq);
		header("location:coupon.php?msg=updated&page=$page");
	   	die();
	}

	
}
?>