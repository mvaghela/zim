<?php
if(isset($_REQUEST['coupon']) && $_REQUEST['coupon']=='Use')
{
	$code=addslashes($_REQUEST['coupon_code']);
	
	//Selec Code
	$select_code="SELECT * FROM `coupon` WHERE `coupon_code`='".$code."'";
	$result=$obj_db->select($select_code);
	
	if(count($result)==0){		
		header("location:shoppingbag.php?msg=notexist");
		die();	
	}
	if($result[0]['coupon_status']=='used'){	
		header("location:shoppingbag.php?msg=used");
		die();
	}
	else{
		$_SESSION['coupon']['coupon_status']="used";
		$_SESSION['coupon']['coupon_value']=$result[0]['coupon_value'];
		$_SESSION['coupon']['coupon_code']=$result[0]['coupon_code'];
		header("location:shoppingbag.php");	
		die();
	}
}
unset($_SESSION['redirecturlusedcustomize']);	
unset($_SESSION['redirecturlsavecust']);	

?>