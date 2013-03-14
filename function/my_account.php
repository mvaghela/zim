<?php
if($_SESSION['userid']=='')
{
	header("location:index.php");
	die();	
}
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Save')
{
	$fname=addslashes($_REQUEST['fname']);	
	$lname=addslashes($_REQUEST['lname']);	
	$email=addslashes($_REQUEST['email']);
	$pass=addslashes($_REQUEST['password']);
	$address=addslashes($_REQUEST['address']);
	$phone=addslashes($_REQUEST['phone']);
	$bday=addslashes($_REQUEST['bday']);
	$gender=addslashes($_REQUEST['gender']);
	$zip=addslashes($_REQUEST['zip']);
	$state=addslashes($_REQUEST['state']);
	$country=addslashes($_REQUEST['country']);
	
	$select_user="SELECT * FROM `user` WHERE `email`='".$email."' AND `userid`<>'".$_SESSION['userid']."'";
	$exist_user=$obj_db->select($select_user);
	
	/*if(count($exist_user)>0)
	{
		header("location:my_account.php?msg=user_exist");
		die();	
	}*/
	
	//Update User record
	$update_user="UPDATE `user` SET 
				`firstname`='$fname',`lastname`='$lname',
				`email`='$email',`password`='$pass',
				`phone`='$phone',`birthday`='$bday',
				`gender`='$gender',`postcode`='$zip',
				`address`='$address',`state`='$state',`country`='$country' WHERE `userid`='".$_SESSION['userid']."'";
	$update_user_res=$obj_db->sql_query($update_user);
	
	$_SESSION['firstname']=$_REQUEST['fname'];
	
	header("location:my_account.php");
	die();
}
//Select Current user
$select_user="SELECT * FROM `user` WHERE `userid`='".$_SESSION['userid']."'";
$user_res=$obj_db->select($select_user);
?>