<?php
//Select Cart items
$select_cart_item="SELECT *,cart.price as cartprice FROM `cart`
					LEFT OUTER JOIN `product` ON
					`cart`.`productid`=`product`.`productid`
					WHERE `cartsessionid`='".$_SESSION['key']."'";
$cart_item_res=$obj_db->select($select_cart_item);

//Select Shipping page info
$page="SELECT * FROM `cms_pages` WHERE `id`=8";
$page_res=$obj_db->select($page);

if(isset($_POST['checkout']) && $_POST['checkout']=='checkout'){
	$title=$_REQUEST['title'];
	$name=addslashes($_POST['name']);
	$lname=addslashes($_REQUEST['lname']);
	$address=addslashes($_POST['address']);
	$address2=addslashes($_POST['address2']);
	$city=addslashes($_POST['city']);
	$zip=addslashes($_POST['zip']);
	$state=addslashes($_POST['state']);
	$telephone=addslashes($_POST['telephone']);
	$country=addslashes($_POST['country']);	
	$email=addslashes($_POST['email']);
	$billingdetail=addslashes($_POST['billingdetail']);
	if($email==''){
		$email=$_SESSION['email'];	
	}
	$pass=addslashes($_POST['password']);
	//Insert user if not logged in.
	if($_SESSION['userid']==''){
		
		//check user if exists
		$select_user="SELECT * FROM `user` WHERE `email`='".$email."'";
		$exist_user=$obj_db->select($select_user);
		
		if(count($exist_user)>0)
		{
			header("location:shipping.php?msg=user_exist");
			die();	
		}
		else{			
			$insert_user="INSERT INTO `user` 
							(`firstname`,`lastname`,`address`,`state`,`country`,`postcode`,`phone`,`registrationdate`,`email`,`password`)
						  VALUES 
							('".$name."','".$lname."','".$address."','".$state."','".$country."','".$zip."','".$telephone."',NOW(),'".$email."','".$pass."')";	
			$insert_user_res=$obj_db->insert($insert_user);
			
			$_SESSION['userid']=mysql_insert_id();
			$_SESSION['firstname']=$_REQUEST['name'];
		}
	}
	
	//Insert orderdetails
	if(isset($_SESSION['discount'])){
		$value=$_SESSION['discount']+$_SESSION['shipping'];	
	}
	else
	{
		$value=$_SESSION['amount']+$_SESSION['shipping'];
	}
	$insert_order="INSERT INTO `orderdetail` 
					(`shippingfirstname`,`shippinglastname`,`address`,`address2`,`email`,`shippingcity`,`shippingstate`,`postcode`,`shippingcountry`,`shtelephone`,`userid`,`date`,`paidamount`,`billingdetail`) 
					VALUES 
					('".$title." ".$name."','".$lname."','".$address."','".$address2."','".$email."','".$city."','".$state."','".$zip."','".$country."','".$telephone."','".$_SESSION['userid']."',NOW(),'".$value."','".$billingdetail."')";
	$insert_res=$obj_db->insert($insert_order);
	
	$_SESSION['orderid']=mysql_insert_id();
	
	//Update user id in measurements tables 
	$update_shirt_measurement="UPDATE `shirt_measurements` SET `user_id`='".$_SESSION['userid']."' WHERE `user_id`='".$_SESSION['key']."'";
	$shirt_res=$obj_db->sql_query($update_shirt_measurement);
	
	$update_blazer_measurement="UPDATE `blazer_measurements` SET `user_id`='".$_SESSION['userid']."' WHERE `user_id`='".$_SESSION['key']."'";
	$blazer_res=$obj_db->sql_query($update_blazer_measurement);
	
	$update_pant_measurement="UPDATE `pant_measurements` SET `user_id`='".$_SESSION['userid']."' WHERE `user_id`='".$_SESSION['key']."'";
	$pant_res=$obj_db->sql_query($update_pant_measurement);
	
	$update_shirt_customization="UPDATE `saveshirtcustomize` SET `userid`='".$_SESSION['userid']."' WHERE `userid`='".$_SESSION['key']."'";
	$shirt_cust_res=$obj_db->sql_query($update_shirt_customization);
	
	$update_pant_customization="UPDATE `savepantcustomize` SET `userid`='".$_SESSION['userid']."' WHERE `userid`='".$_SESSION['key']."'";
	$pant_cust_res=$obj_db->sql_query($update_pant_customization);
	
	$update_blazer_customization="UPDATE `savesuitcustomize` SET `userid`='".$_SESSION['userid']."' WHERE `userid`='".$_SESSION['key']."'";
	$blazer_cust_res=$obj_db->sql_query($update_blazer_customization);
	
	if($_SESSION['coupon']['coupon_status']='used')
	{
		$update_coupon="UPDATE `coupon` SET 
						`coupon_user_id`=".$_SESSION['userid'].", 
						`coupon_order_id`=".$_SESSION['orderid'].",
						`coupon_status`='used', 
						`coupon_used_date`=NOW()
						WHERE `coupon_code`='".$_SESSION['coupon']['coupon_code']."'";
		$coupon_res=$obj_db->sql_query($update_coupon);		
		unset($_SESSION['coupon']);
	}
	//Copy data from cart to cartorder.
	$insert_cart_order="INSERT INTO `cartorder`
							(`saveshirtcustomizeid`,`productid`,`price`,`qty`,`cartsessionid`,`measurement_id`,`measurement_type`,`date`,`userid`,`orderid`)
							(SELECT `saveshirtcustomizeid`,`productid`,`price`,`qty`,`cartsessionid`,`measurement_id`,`measurement_type`,`date`,concat('".$_SESSION['userid']."'),concat('".$_SESSION['orderid']."') FROM `cart` WHERE `cart`.`cartsessionid`='".$_SESSION['key']."')";
	$cart_order_res=$obj_db->insert($insert_cart_order);
	
	//Delete bought data from cart.
	/*$delete_cart="DELETE FROM `cart` WHERE `cartsessionid`='".$_SESSION['key']."'";
	$del_res=$obj_db->sql_query($delete_cart);
	
	unset($_SESSION['key']);
	unset($_SESSION['measurementid']);*/
	header("location:orderreview.php");
	die();
}
?>