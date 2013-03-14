<?php
if($_SESSION['userid']) {
	$user = $_SESSION['userid']; }
else {
	$user = $_SESSION['key']; 
}
	
if($_POST['submit']!='') {
	
	if($_POST['textinput']) {
	 $sql_user="UPDATE `savesuitcustomize` SET customizename = '".$_POST['textinput']."',userid = '".$_SESSION['userid']."' where `productid` = '".$_SESSION['productid']."' AND `userid` = '".$user."' "; //die();
		$update=$obj_db->sql_query($sql_user); 
	} else {
		
$qty=1;
$sql="INSERT INTO `cart` ( `productid`,`saveshirtcustomizeid`, `qty`,`cartsessionid`, `date`) 
		VALUES ( '".$_SESSION['product']."','".$_POST['option']."', '".$qty."','".$_SESSION['key']."', NOW())"; //die();
$result=$obj_db->insert($sql); 

}
header("location:shoppingbag.php");
die();
	
}
?>