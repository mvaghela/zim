<?php
include("system/config.inc.php");
 $sql="UPDATE `cart` SET `qty` = '".$_POST['qty']."' WHERE `cartid` ='".$_POST['cartid']."'";
$result=$obj_db->sql_query($sql);
//header("location:viewcart.php");

?>