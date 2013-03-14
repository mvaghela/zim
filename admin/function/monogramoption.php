<?php
if(!isset($_SESSION['adsadmin'])) {
	header("location:login.php");
	die();
}


if(isset($_REQUEST['del'])) {
   $del_sql="DELETE FROM `monogramoption` WHERE `id` = '".$_REQUEST['del']."'"; //die();
   $del_cat=$obj_db->sql_query($del_sql);
   
   header("location:monogramoption.php?msg=deleted&page=".$_REQUEST['page']); 
  
   die();
     
}
$cname=$_POST['cname'];
$urltitle=$_POST['uname'];
$page=$_POST['page'];


if(isset($_REQUEST['submit']) AND $_REQUEST['submit']=='Submit') {
  $v_id=$_REQUEST['optionid'];

					                  
						if($v_id=="addnew") {
							$sql_insert="INSERT INTO `monogramoption` (`name`,`price`,`date`)
							 VALUES ('$cname','$urltitle', NOW())"; //die();
						   $insert_faq=$obj_db->insert($sql_insert);
						   header("location:monogramoption.php?msg=added"); 

						   die();
						} else {
							 $sql_faq="UPDATE `monogramoption` SET `name` = '".$_REQUEST['cname']."',`price` = '$urltitle' WHERE `id` = ".$_REQUEST['optionid']."";  //die();
							$update_faq=$obj_db->sql_query($sql_faq);
					 		header("location:monogramoption.php?msg=updated&page=$page"); 
						   die();
						}

	
}
?>