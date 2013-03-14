<?php 
//Select Orders
$sql_order="SELECT * FROM `orderdetail` WHERE `orderid`='".$_REQUEST['id']."'"; 
$result_order=$obj_db->select($sql_order);

//Select order history
$select_orders="SELECT * FROM `cartorder` 
				LEFT OUTER JOIN `product`
				ON `product`.`productid`=`cartorder`.`productid`
				WHERE `cartorder`.`orderid`='".$_REQUEST['id']."'";
$product_res=$obj_db->select($select_orders);

//Check if coupon used
$select_coupon="SELECT * FROM `coupon` WHERE `coupon_order_id`='".$_REQUEST['id']."'";
$coupon_res=$obj_db->select($select_coupon);

?>