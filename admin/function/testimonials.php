<?php
if(!isset($_SESSION['adsadmin'])) {
	header("location:login.php");
	die();
}
if(isset($_REQUEST['del'])) {
   $del_sql="DELETE FROM `thoughts` WHERE `thought_id` = '".$_REQUEST['del']."'";
   $del_cat=$obj_db->sql_query($del_sql);
   
   header("location:testimonials.php?msg=deleted&page=".$_REQUEST['page']); 
   die();
     
}
$text=addslashes($_POST['text']);
$page=$_POST['page'];

if(isset($_REQUEST['submit']) AND $_REQUEST['submit']=='Submit') {
    $v_id=$_REQUEST['id'];
					                  
	if($v_id=="addnew") {
		$sql_insert="INSERT INTO `thoughts` (`thought_text`,`createddate`)
		 VALUES ('$text', NOW())"; 
	   $insert_faq=$obj_db->insert($sql_insert);
	   header("location:testimonials.php?msg=added"); 

	   die();
	} else {
		$sql_faq="UPDATE `thoughts` SET `thought_text` = '$text' WHERE `thought_id` = ".$_REQUEST['id']."";
		$update_faq=$obj_db->sql_query($sql_faq);
		header("location:testimonials.php?msg=updated&page=$page");
	   die();
	}
}
?>