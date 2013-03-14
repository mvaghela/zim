<?php
if(isset($_REQUEST['del'])) {
	$del_sql="DELETE FROM `user` WHERE `userid` = '".$_REQUEST['del']."'";
   $del_cat=$obj_db->sql_query($del_sql);
 /*	$filename = "upload/testimonial/".$_REQUEST['img'];
	unlink($filename);*/
   header("location:user.php?msg=deleted".$condition); 
   die();
}



if(isset($_REQUEST['submit'])) {
 
  $imagename=addslashes($_REQUEST['imagename']);
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
  $city=$_POST['city'];
  $status=$_POST['status'];
  $name=$_POST['name'];
	
	
	$checksql="SELECT * FROM `user` WHERE `email`='".$email."'";
	$checkres=$obj_db->select($checksql);
	
	if($id=='addnew') {
		
		
	if(count($checkres)>0){
		header("location:user.php?msg=2");
		die();
	
	}
		
		$sql="INSERT INTO `user` (`userid`, `password`, `email`, `phone`, `firstname`, `lastname`, `birthday`, `gender`, `postcode`, `address`, `landmark`, `state`, `city`, `registrationdate`, `status`, `notifyonactivation`) 
		VALUES (NULL, '$password', '$email', '$phone', '$firstname', '$lastname', '$birthday', '$gender', '$postcode', '$address', '$landmark', '$state', '$city', NOW(), 'active', 'pending')";
	$recordinserted=$obj_db->insert($sql);
		 
		 header("location:user.php?msg=added".$condition);
   		die();
	} else {
	 $sql_user="UPDATE `user` SET `password` = '$password', `email` = '$email', `phone` = '$phone', `firstname` = '$firstname', `lastname` = '$lastname', `birthday` = '$birthday', `gender` = '$gender', `postcode` = '$postcode', `address` = '$address', `landmark` = '$landmark', `state` = '$state', `city` = '$city', `status` = '$status' WHERE `user`.`userid` = $id LIMIT 1";
	  $update=$obj_db->sql_query($sql_user);
	  
	  

   header("location:user.php?msg=updated".$condition);
   die();
	}
}



?>