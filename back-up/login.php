<?php
if($_POST['submit']!='') {
	$email=$_POST['email'];
	$password=$_POST['password'];
	$lastpage = $_SERVER['HTTP_REFERER'];

	
	$sql="SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'"; 
	$result=$obj_db->select($sql);
	if(count($result)==''){
		header("location:index.php?msg=1");
		die();	
	}
	if($result[0]['status']=='inactive'){
		header("location:index.php?msg=2");
		die();	
	}
	if($result[0]['status']=='block'){
		header("location:index.php?msg=3");
		die();	
	}
	
	$_SESSION['firstname'] = $result[0]['firstname'];
	$_SESSION['lastname'] = $result[0]['lastname'];
	$_SESSION['email'] = $result[0]['email'];
	$_SESSION['telephone'] = $result[0]['phone'];
	$_SESSION['userid'] = $result[0]['userid'];
	
	if($_SESSION['redirecturlsavecust']){
		header("location:".$lastpage."&acn=savecust");
		die();	
	}
	
	if($_SESSION['redirecturlusedcustomize']){
		header("location:".$lastpage."?id=".$_SESSION['product']."&acn=usedcustomize");
		die();	
	}
	
header("location:".$lastpage."");
die();
	
}
?>