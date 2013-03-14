<?php
if($_SESSION['orderid']=='' || $_SESSION['userid']==''){
	header("location:index.php");
	die();	
}


if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Checkout'){
	
	$update_order_detail="UPDATE `orderdetail` SET 
								`payment_method`='paypal' WHERE `orderid`='".$_SESSION['orderid']."' AND `userid`='".$_SESSION['userid']."'";
	$update_res=$obj_db->sql_query($update_order_detail);
	
	header("location:paypal.php");
	die();

}
	
?>