<?php
if($_POST['submit']!='') {
 
  $id=$_REQUEST['id'];
  $acn=$_REQUEST['acn'];
 
  $password=$_POST['password'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $birthday=$_POST['birthday'];
  $gender=$_POST['gender'];
  $postcode=$_POST['postcode'];
  $address=$_POST['address'];
  $landmark=$_POST['landmark'];
  $state=$_POST['state'];
  $country=$_POST['country'];
  $status=$_POST['status'];
  $name=$_POST['name'];
	
	$checksql="SELECT * FROM `user` WHERE `email`='".$email."'";
	$checkres=$obj_db->select($checksql);
	
	if($_SESSION['userid']=='') {
		
		if(count($checkres)>0){
			
	
		$_SESSION['fname'] = $_POST['firstname'];
		$_SESSION['lname'] = $_POST['lastname'];
		$_SESSION['birthday'] = $_POST['birthday'];
		$_SESSION['postcode'] = $_POST['postcode'];
		$_SESSION['adress'] = $_POST['address'];
		$_SESSION['state'] = $_POST['state'];
		$_SESSION['country'] = $_POST['country'];
		$_SESSION['telephone'] = $_POST['phone'];
		$_SESSION['gender'] = $_POST['gender'];



			header("location:index.php?msg=4");
			die();
		
		}
		
	  $sql="INSERT INTO `user` ( `password`, `email`, `phone`, `firstname`, `lastname`, `birthday`, `gender`, `postcode`, `address`,  `state`, `country`, `registrationdate`, `status`) VALUES ( '$password', '$email', '$phone', '$firstname', '$lastname', '$birthday', '$gender', '$postcode', '$address', '$state', '$country', NOW(), 'active')"; 
		$recordinserted=$obj_db->insert($sql);
		$useid=mysql_insert_id();
	
		$sql="SELECT * FROM `user` WHERE `userid`='$useid'"; 
		$result=$obj_db->select($sql);
	
		$_SESSION['email'] = $result[0]['email'];
		$_SESSION['userid'] = $result[0]['userid'];
		$_SESSION['firstname'] = $_POST['firstname'];
		$_SESSION['lastname'] = $_POST['lastname'];
		$_SESSION['birthday'] = $_POST['birthday'];
		$_SESSION['postcode'] = $_POST['postcode'];
		$_SESSION['adress'] = $_POST['address'];
		$_SESSION['state'] = $_POST['state'];
		$_SESSION['country'] = $_POST['country'];
		$_SESSION['telephone'] = $_POST['phone'];
		$_SESSION['gender'] = $_POST['gender'];
		

	
	$lastpage = $_SERVER['HTTP_REFERER'];
		
	if($_SESSION['redirecturlsavecust']){
		header("location:".$lastpage."&acn=savecust");
		die();	
	}

		header("location:index.php");
		die();
	
	} else {
	 $sql_user="UPDATE `user` SET `password` = '$password', `email` = '$email', `phone` = '$phone', `firstname` = '$firstname', `lastname` = '$lastname', `birthday` = '$birthday', `gender` = '$gender', `postcode` = '$postcode', `address` = '$address', `state` = '$state', `country` = '$country', `status` = '$status' WHERE `user`.`userid` = ".$_SESSION['userid']." LIMIT 1";
	  $update=$obj_db->sql_query($sql_user);
	  
	  
	  	$_SESSION['email'] = $result[0]['email'];
		$_SESSION['userid'] = $result[0]['userid'];
		$_SESSION['firstname'] = $_POST['firstname'];
		$_SESSION['lastname'] = $_POST['lastname'];
		$_SESSION['birthday'] = $_POST['birthday'];
		$_SESSION['postcode'] = $_POST['postcode'];
		$_SESSION['adress'] = $_POST['address'];
		$_SESSION['state'] = $_POST['state'];
		$_SESSION['country'] = $_POST['country'];
		$_SESSION['telephone'] = $_POST['phone'];
		$_SESSION['gender'] = $_POST['gender'];



   header("location:index.php?msg=5");
   die();
	}



	
}
?>