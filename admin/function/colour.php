<?php
if(!isset($_SESSION['adsadmin'])) {
	header("location:login.php");
	die();
}


if(isset($_REQUEST['del'])) {
   $del_sql="DELETE FROM `monogramcolor` WHERE `id` = '".$_REQUEST['del']."'"; //die();
   $del_cat=$obj_db->sql_query($del_sql);
   
   header("location:colour.php?msg=deleted&page=".$_REQUEST['page']); 
  
   die();
     
}
$cname=$_POST['cname'];
$urltitle=$_POST['uname'];
//echo $urltitle;
$s1= explode('rgba(',$urltitle);

$s2= explode(',',$s1[1]);
/*print_r($s2);
echo $s2[0];
echo $s2[1];
echo $s2[2];*/
$page=$_POST['page'];


if(isset($_REQUEST['submit']) AND $_REQUEST['submit']=='Submit') {
  $v_id=$_REQUEST['optionid'];

					                  
						if($v_id=="addnew") {
							$sql_insert="INSERT INTO `monogramcolor` (`name`,`colorcode`,`rgb_r`,`rgb_g`,`rgb_b`,`date`)
							 VALUES ('$cname','$urltitle','".$s2[0]."','".$s2[1]."','".$s2[2]."', NOW())"; //die();
						   $insert_faq=$obj_db->insert($sql_insert);
						   header("location:colour.php?msg=added"); 

						   die();
						} else {
							 $sql_faq="UPDATE `monogramcolor` SET `name` = '".$_REQUEST['cname']."',`colorcode` = '$urltitle',`rgb_r` = '".$s2[0]."',`rgb_g` = '".$s2[1]."',`rgb_b` = '".$s2[2]."' WHERE `id` = ".$_REQUEST['optionid']."";  //die();
							$update_faq=$obj_db->sql_query($sql_faq);
					 		header("location:colour.php?msg=updated&page=$page"); 

						   die();
						}

	
}
?>