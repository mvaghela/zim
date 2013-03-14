<?php include("system/config.inc.php"); 
//if($_POST['submit']=='ADD TO CART') {
//$id=$_REQUEST['id'];
$qty=$_POST['qty'];
		
$lastpage = $_SERVER['HTTP_REFERER'];
echo $sql="INSERT INTO `cart` ( `productid`, `qty`,`cartsessionid`, `date`) 
		VALUES ( '".$_REQUEST['productid']."', '".$qty."','".$_SESSION['key']."', NOW())"; die();
$result=$obj_db->insert($sql); 
header("location:'".$lastpage."'");

//}
?>