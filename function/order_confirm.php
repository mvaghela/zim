<?php 
//Select and Orders info
$sql_order="SELECT *,DATE_FORMAT(`date`,'%d %M, %Y') AS adddate FROM `orderdetail` WHERE `orderid`='".$_REQUEST['item_number']."' AND `userid`='".$_REQUEST['cm']."'"; 
$result_order=$obj_db->select($sql_order);

//Select order history
$select_orders="SELECT *,cartorder.price as cartprice FROM `cartorder`
					LEFT OUTER JOIN `product` ON
					`cartorder`.`productid`=`product`.`productid`
					WHERE `cartorder`.`orderid`='".$_REQUEST['item_number']."'";

/*$select_orders="SELECT * FROM `cartorder` 
				LEFT OUTER JOIN `product`
				ON `product`.`productid`=`cartorder`.`productid`
				WHERE `cartorder`.`orderid`='".$_REQUEST['item_number']."'";*/
$product_res=$obj_db->select($select_orders);

//Select Billing Info
$select_billing_info="SELECT * FROM `payment_details` WHERE `payment_details`.`order_id`='".$_REQUEST['item_number']."' AND `userid`='".$_REQUEST['cm']."'";
$billing_result=$obj_db->select($select_billing_info);

//Check if coupon used
$select_coupon="SELECT * FROM `coupon` WHERE `coupon_order_id`='".$_REQUEST['item_number']."' AND `coupon_user_id`='".$_REQUEST['cm']."'";
$coupon_res=$obj_db->select($select_coupon);

$delete_cart="DELETE FROM `cart` WHERE `cartsessionid`='".$_SESSION['key']."'";
$del_res=$obj_db->sql_query($delete_cart);

//unset($_SESSION['key']);
unset($_SESSION['measurementid']);
unset($_SESSION['amount']);
unset($_SESSION['discount']);

?>