<?php
	include("system/config.inc.php");
	echo $_REQUEST['removeitem'];
	$removecartsql="DELETE FROM `cart` WHERE `cartid`='".$_REQUEST['removeitem']."'";
	$removecart=$obj_db->sql_query($removecartsql);	
?>