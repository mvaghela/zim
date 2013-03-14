<?php include("system/config.inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Bag |<?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
#fancybox-content {
	background:#FFF;
	padding:30px;
}
#fancybox-outer {
	-moz-border-radius:5px;
	float:left;
	width:auto !important;
}
#fancybox-close{
	display:none !important;	
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
<?php 
if($_SESSION['userid']) {
	$user = $_SESSION['userid']; }
	else {
			$user = $_SESSION['key']; 
}
	
if($_REQUEST['acn']=='addtobag'){ 

$sacsql="SELECT * FROM `saveshirtcustomize` WHERE `userid`='".$user."' AND `productid`='".$_SESSION['productid']."'";
$sacresult=$obj_db->select($sacsql);	
if($sacresult) {
	
		//$sql_user="UPDATE `saveshirtcustomize` SET fit = '".$_SESSION['fittype']."-".$_SESSION['fitimage']."',style = '".$_SESSION['styletype']."-".$_SESSION['styleimage']."',collar = '".$_SESSION['collartype']."-".$_SESSION['collarimage']."',cuff = '".$_SESSION['cufftype']."-".$_SESSION['cuffimage']."',pocket = '".$_SESSION['pockettype']."-".$_SESSION['pocketimage']."',front = '".$_SESSION['fronttype']."-".$_SESSION['frontimageplacket']."',back = '".$_SESSION['backtype']."-".$_SESSION['backimage']."' where `productid` = '".$_SESSION['productid']."' AND `userid` = '".$user."' "; //die();
		$sql_user="UPDATE `saveshirtcustomize` SET contrastfabric = '".$_SESSION['contrastfabric']."',contrastfabriccollar = '".$_SESSION['contrastfabriccollar']."',contrastfabriccuff = '".$_SESSION['contrastfabriccuff']."',contrastfabricplacket = '".$_SESSION['contrastfabricplacket']."' ,fit = '".$_SESSION['fittype']."-".$_SESSION['fitimage']."',style = '".$_SESSION['styletype']."-".$_SESSION['styleimage']."',collar = '".$_SESSION['collartype']."-".$_SESSION['collarimage']."',cuff = '".$_SESSION['cufftype']."-".$_SESSION['cuffimage']."',pocket = '".$_SESSION['pockettype']."-".$_SESSION['pocketimage']."',front = '".$_SESSION['fronttype']."-".$_SESSION['frontimageplacket']."',back = '".$_SESSION['backtype']."-".$_SESSION['backimage']."',monogramoption = '".$_SESSION['monogramoption']."',monogramcolour = '".$_SESSION['monogramcolour']."',monogramfont = '".$_SESSION['monogramfont']."',monogramtext = '".$_SESSION['monogramtext']."',monogramprice = '".$_SESSION['monogrampricenew']."' where `saveshirtcustomizeid` = '".$sacresult[0]['saveshirtcustomizeid']."' "; 

		$update=$obj_db->sql_query($sql_user); 

	
} else {

//$sql="INSERT INTO `saveshirtcustomize`(`productid`,`userid`,`fit`,`style`,`collar`,`cuff`,`pocket`,`front`,`back`,`createdate`,`ip`) VALUES ( '".$_SESSION['productid']."','".$user."', '".$_SESSION['fittype']."-".$_SESSION['fitimage']."','".$_SESSION['styletype']."-".$_SESSION['styleimage']."','".$_SESSION['collartype']."-".$_SESSION['collarimage']."','".$_SESSION['cufftype']."-".$_SESSION['cuffimage']."','".$_SESSION['pockettype']."-".$_SESSION['pocketimage']."','".$_SESSION['fronttype']."-".$_SESSION['frontimageplacket']."','".$_SESSION['backtype']."-".$_SESSION['backimage']."',NOW(),'".$ip."')"; //die();
$sql="INSERT INTO `saveshirtcustomize`(`productid`,`userid`,`contrastfabric`,`contrastfabriccollar`,`contrastfabriccuff`,`contrastfabricplacket`,`fit`,`style`,`collar`,`cuff`,`pocket`,`front`,`back`,`monogramoption`,`monogramcolour`,`monogramfont`,`monogramtext`,`monogramprice`,`createdate`,`ip`) VALUES ( '".$_SESSION['productid']."','".$user."','".$_SESSION['contrastfabric']."','".$_SESSION['contrastfabriccollar']."','".$_SESSION['contrastfabriccuff']."','".$_SESSION['contrastfabricplacket']."', '".$_SESSION['fittype']."-".$_SESSION['fitimage']."','".$_SESSION['styletype']."-".$_SESSION['styleimage']."','".$_SESSION['collartype']."-".$_SESSION['collarimage']."','".$_SESSION['cufftype']."-".$_SESSION['cuffimage']."','".$_SESSION['pockettype']."-".$_SESSION['pocketimage']."','".$_SESSION['fronttype']."-".$_SESSION['frontimageplacket']."','".$_SESSION['backtype']."-".$_SESSION['backimage']."','".$_SESSION['monogramoption']."','".$_SESSION['monogramcolour']."','".$_SESSION['monogramfont']."','".$_SESSION['monogramtext']."','".$_SESSION['monogrampricenew']."',NOW(),'".$ip."')"; //die();
$result=$obj_db->insert($sql); 
$lastid=mysql_insert_id();
}
unset($_SESSION['redirecturlusedcustomize']);	
$_SESSION['redirecturlsavecust'] = 'redirecturlsavecust';


$galsql="SELECT * FROM `cart` WHERE `cartsessionid`='".$_SESSION['key']."' AND `productid`='".$_SESSION['productid']."'";
$galresult=$obj_db->select($galsql);	
if($galresult) { } else {
$qty=1;
$sql="INSERT INTO `cart` ( `productid`,`price`,`saveshirtcustomizeid`, `qty`,`cartsessionid`, `date`) 
		VALUES ( '".$_SESSION['productid']."','".$_SESSION['monogrampricenew']."','".$lastid."', '".$qty."','".$_SESSION['key']."', NOW())"; //die();
$result=$obj_db->insert($sql); 
} //die();
?>

<div style="width:550px;" align="center">
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
					<center><a href="<?php if($_SESSION['userid']!=''){?>savecustomize.php?productid=<?php echo $_REQUEST['id'];?>&acn=savecust<?php } else {?>login.php<?php }?>" id="login_link_h" class="login_link_h btn" style="padding: 6px 5px !important;">&nbsp; &nbsp; &nbsp; &nbsp; YES &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
				<td>
					<center><a href="shoppingbag.php" class="btn" style="padding: 6px 5px !important;" > &nbsp; &nbsp; &nbsp; &nbsp; NO &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
			</tr>
		</table>
	</div>
	</div>
<?php } ?>

<?php if($_REQUEST['acn']=='usedcustomize'){ 
unset($_SESSION['redirecturlsavecust']);	

$_SESSION['redirecturlusedcustomize'] = 'usedcustomize';

?>
<div style="width:550px;" align="center">
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
					<center><a href="<?php if($_SESSION['userid']!=''){?>savecustomize.php?productid=<?php echo $_REQUEST['id'];?>&acn=usedcustomize<?php }else {?>login.php<?php }?>" id="login_link_h" class="login_link_h btn" style="padding: 6px 5px !important;">&nbsp; &nbsp; &nbsp; &nbsp; YES &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
				<td>
					<center><a href="customize.php?productid=<?php echo $_SESSION['product'];?>" class="btn" style="padding: 6px 5px !important;" > &nbsp; &nbsp; &nbsp; &nbsp; NO &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
			</tr>
		</table>
	</div>
	</div>
<?php } ?>
</body>
</html>