<?php include("system/config.inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Bag |<?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
#fancybox-content {
	border:7px solid #024E89 !important;
	background:#FFF;
	padding:30px;
}
#fancybox-outer {
	-moz-border-radius:5px;
	float:left;
	width:auto !important;
}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$(".login_link_h").fancybox();
	});
	$(document).ready(function() {
		$(".register_link_h").fancybox();
	});
	$(document).ready(function() {
			$("#register").fancybox();
		});
</script>
</head>
<body>
<?php if($_SESSION['userid']) {
	$user = $_SESSION['userid']; }
	else {
			$user = $_SESSION['key']; 
	}



if($_REQUEST['acn']=='addtobag'){ 

$sacsql="SELECT * FROM `savepantcustomize` WHERE `userid`='".$user."' AND `productid`='".$_SESSION['productid']."'";
$sacresult=$obj_db->select($sacsql);	
if($sacresult) {
	
		$sql_user="UPDATE `savepantcustomize` SET fit = '".$_SESSION['pantfittype']."-".$_SESSION['pantfitimage']."',style = '".$_SESSION['pantstyletype']."-".$_SESSION['pantstyleimage']."',waist = '".$_SESSION['pantwaisttype']."-".$_SESSION['pantwaistimage']."',front_pocket = '".$_SESSION['pantfrontpockettype']."-".$_SESSION['pantfrontpocketimage']."',pleats = '".$_SESSION['pantpleatstype']."-".$_SESSION['pantpleatsimage']."',back_pocket = '".$_SESSION['pantbackpockettype']."-".$_SESSION['pantbackpocketimage']."',back_pocket_style = '".$_SESSION['pantbackpocketstyletype']."-".$_SESSION['pantbackpocketstyleimage']."',fly = '".$_SESSION['pantflytype']."-".$_SESSION['pantflyimage']."',belt_style = '".$_SESSION['pantbelttype']."-".$_SESSION['pantbeltimage']."' where `productid` = '".$_SESSION['productid']."' AND `userid` = '".$user."' "; //die();
		$update=$obj_db->sql_query($sql_user); 

	
} else {

$sql="INSERT INTO `savepantcustomize`(`productid`,`userid`,`fit`,`style`,`waist`,`front_pocket`,`pleats`,`back_pocket`,`back_pocket_style`,`fly`,`belt_style`,`createdate`,`ip`) VALUES ( '".$_SESSION['productid']."','".$user."', '".$_SESSION['pantfittype']."-".$_SESSION['pantfitimage']."','".$_SESSION['pantstyletype']."-".$_SESSION['pantstyleimage']."','".$_SESSION['pantwaisttype']."-".$_SESSION['pantwaistimage']."','".$_SESSION['pantfrontpockettype']."-".$_SESSION['pantfrontpocketimage']."','".$_SESSION['pantpleatstype']."-".$_SESSION['pantpleatsimage']."','".$_SESSION['pantbackpockettype']."-".$_SESSION['pantbackpocketimage']."','".$_SESSION['pantbackpocketstyletype']."-".$_SESSION['pantbackpocketstyleimage']."','".$_SESSION['pantflytype']."-".$_SESSION['pantflyimage']."','".$_SESSION['pantbelttype']."-".$_SESSION['pantbeltimage']."',NOW(),'".$ip."')"; //die();
$result=$obj_db->insert($sql); 
$lastid=mysql_insert_id();
}
unset($_SESSION['redirecturlusedcustomize']);	
$_SESSION['redirecturlsavecust'] = 'redirecturlsavecust';


$galsql="SELECT * FROM `cart` WHERE `cartsessionid`='".$_SESSION['key']."' AND `productid`='".$_SESSION['productid']."'";
$galresult=$obj_db->select($galsql);	
if($galresult) { } else {
$qty=1;
$sql="INSERT INTO `cart` ( `productid`,`saveshirtcustomizeid`, `qty`,`cartsessionid`, `date`) 
		VALUES ( '".$_SESSION['productid']."','".$lastid."', '".$qty."','".$_SESSION['key']."', NOW())"; //die();
$result=$obj_db->insert($sql); 
} //die();
?>

<div style="width:430px;" align="center">
	<div class="login_mainx" >
<!--		<table>
			<tr>
				<td colspan="3">
					<div class="login_title">
						<h1>SHOPPING BAG</h1>
					</div>
				</td>
			</tr>
		</table>
-->		
		
			<table>
			<tr>
				<td colspan="3">
					<div class="login_title">
						<h2>DO YOU WANT TO SAVE THE CUSTOMIZE OPTION??</h2>
					</div>
				</td>
				
			</tr>
			<tr>
				<td colspan="2">
					<center><a href="<?php if($_SESSION['userid']!=''){?>savecustomizepants.php?acn=savecust<?php } else {?>login.php<?php }?>" id="login_link_h" class="login_link_h btn">&nbsp; &nbsp; &nbsp; &nbsp; YES &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
				<td>
					<center><a href="shoppingbag.php" class="btn" > &nbsp; &nbsp; &nbsp; &nbsp; NO &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
			</tr>
		</table>
	</div>
	</div>
<?php } ?>

<?php if($_REQUEST['acn']=='usedcustomize'){ 
unset($_SESSION['redirecturlsavecust']);	

$_SESSION['redirecturlusedcustomize'] = 'redirecturlusedcustomize';

?>
<div style="width:430px;" align="center">
	<div class="login_mainx" >
<!--		<table>
			<tr>
				<td colspan="3">
					<div class="login_title">
						<h1>SHOPPING BAG</h1>
					</div>
				</td>
			</tr>
		</table>-->		
		
			<table>
			<tr>
				<td colspan="3">
					<div class="login_title">
						<h2>DO YOU WANT TO USE YOUR SAVED THE CUSTOMIZE OPTION??</h2>
					</div>
				</td>
				
			</tr>
			<tr>
				<td colspan="2">
					<center><a href="<?php if($_SESSION['userid']!=''){?>savecustomizepants.php?acn=usedcustomize<?php }else {?>login.php<?php }?>" id="login_link_h" class="login_link_h btn">&nbsp; &nbsp; &nbsp; &nbsp; YES &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
				<td>
					<center><a href="pantscustomize.php?productid=<?php echo $_SESSION['product'];?>" class="btn" > &nbsp; &nbsp; &nbsp; &nbsp; NO &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
			</tr>
		</table>
	</div>
	</div>
<?php } ?>
</body>
</html>

