<?php
if(!$_SESSION['userid']){
	header("location:index.php");
	die();
}
//Select items from wishlist
$select_items="SELECT * FROM `wishlist` 
				LEFT OUTER JOIN `product` 
				ON `wishlist`.`productid`=`product`.`productid` 
				WHERE `wishlist`.`userid`=".$_SESSION['userid']."";
$wishlist_result=$obj_db->select($select_items);
?>