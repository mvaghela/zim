<?php
if($_SESSION['userid']) {
	$user = $_SESSION['userid']; }
else {
	$user = $_SESSION['key']; 
}
	
if($_POST['submit']!='') {
	
	if($_POST['textinput']) {
	 $sql_user="UPDATE `savepantcustomize` SET customizename = '".$_POST['textinput']."',userid = '".$_SESSION['userid']."' where `productid` = '".$_SESSION['productid']."' AND `userid` = '".$user."' "; //die();
		$update=$obj_db->sql_query($sql_user); 
	} else {
		
$category_sql="select * from `savepantcustomize` where `savepantcustomizeid` = '".$_POST['option']."'"; //die();
$category=$obj_db->select($category_sql);
		
$qty=1;
$sql="INSERT INTO `cart` ( `productid`,`price`,`saveshirtcustomizeid`, `qty`,`cartsessionid`, `date`) 
		VALUES ( '".$category[0]['productid']."','".$category[0]['monogramprice']."','".$category[0]['savepantcustomizeid']."','".$qty."','".$_SESSION['key']."', NOW())"; //die();
$result=$obj_db->insert($sql); 


}
header("location:shoppingbag.php");
die();
	
}
?>