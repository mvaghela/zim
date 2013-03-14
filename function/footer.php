<?php 
if(isset($_REQUEST['submit']) AND $_REQUEST['submit']=='GO'){
	$email=$_REQUEST['your_email'];
	
	$insert_email="INSERT INTO `email_contact` (`emails`,`adddate`) VALUES ('$email',NOW())";
	$insert_res=$obj_db->insert($insert_email);
	
	$url=$_REQUEST['uri'];
	header("location:".$url);
}
?>