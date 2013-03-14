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
<?php if($_SESSION['userid']) {
	$user = $_SESSION['userid']; }
	else {
			$user = $_SESSION['key']; 
	}

if($_REQUEST['acn']=='addtobag'){ 

$sacsql="SELECT * FROM `savesuitcustomize` WHERE `userid`='".$user."' AND `productid`='".$_SESSION['productid']."'";
$sacresult=$obj_db->select($sacsql);	
if($sacresult) {
	
		$sql_user="UPDATE `savesuitcustomize` SET piece = '".$_SESSION['pieceimage']."-".$_SESSION['piecetype']."',lapel = '".$_SESSION['suittype']."-".$_SESSION['suitstyleimage']."',vents = '".$_SESSION['suitventstype']."-".$_SESSION['suitventsimage']."',buttons   = '".$_SESSION['suitbuttontype']."-".$_SESSION['suitbuttonimage']."',pocket = '".$_SESSION['suitfrontpockettype']."-".$_SESSION['suitfrontpocketimage']."',breast_pocket = '".$_SESSION['suitbreaststype']."-".$_SESSION['suitbreastimage']."',ticket_pocket = '".$_SESSION['suittickettype']."-".$_SESSION['suittiecketimage']."',sleeve = '".$_SESSION['suitsleevebuttontype']."-".$_SESSION['suitsleevebuttonimage']."',buttonhole = '".$_SESSION['suitbuttonholetype']."-".$_SESSION['suitbuttonholeimage']."',inner_lining = '".$_SESSION['suitinnerliningtype']."-".$_SESSION['suitinnerliningimage']."',vests_button = '".$_SESSION['suitveststype']."-".$_SESSION['suitvestsbuttonimage']."',vests_back = '".$_SESSION['suitvestsbacktype']."-".$_SESSION['suitvestsbackimage']."',vests_pocket = '".$_SESSION['suitvestspockettype']."-".$_SESSION['suitvestspocketimage']."',vests_breat_pocket = '".$_SESSION['suitvestsbreasttype']."-".$_SESSION['suitvestsbreatimage']."' where `saveshirtcustomizeid` = '".$sacresult[0]['saveshirtcustomizeid']."' "; //die();
		$update=$obj_db->sql_query($sql_user); 

	
} else {

$sql="INSERT INTO `savesuitcustomize`(`productid`,`userid`,`piece`,`lapel`,`vents`,`buttons`,`pocket`,`breast_pocket`,`ticket_pocket`,`sleeve`,`buttonhole`,`inner_lining`,`vests_button`,`vests_back`,`vests_pocket`,`vests_breat_pocket`,`createdate`,`ip`) VALUES ( '".$_SESSION['productid']."','".$user."', '".$_SESSION['piecetype']."-".$_SESSION['pieceimage']."','".$_SESSION['suittype']."-".$_SESSION['suittypeimage']."','".$_SESSION['suitventstype']."-".$_SESSION['suitventsimage']."','".$_SESSION['suitbuttontype']."-".$_SESSION['suitbuttonimage']."','".$_SESSION['suitfrontpockettype']."-".$_SESSION['suitfrontpocketimage']."','".$_SESSION['suitbreaststype']."-".$_SESSION['suitbreastimage']."','".$_SESSION['suittickettype']."-".$_SESSION['suittiecketimage']."','".$_SESSION['suitsleevebuttontype']."-".$_SESSION['suitsleevebuttonimage']."','".$_SESSION['suitbuttonholetype']."-".$_SESSION['suitbuttonholeimage']."','".$_SESSION['suitinnerliningtype']."-".$_SESSION['suitinnerliningimage']."','".$_SESSION['suitveststype']."-".$_SESSION['suitvestsbuttonimage']."','".$_SESSION['suitvestsbacktype']."-".$_SESSION['suitvestsbackimage']."','".$_SESSION['suitvestspockettype']."-".$_SESSION['suitvestspocketimage']."','".$_SESSION['suitvestsbreasttype']."-".$_SESSION['suitvestsbreatimage']."',NOW(),'".$ip."')"; //die();
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

<div style="width:550px;" align="center">
	<div class="login_mainx" >

		
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
					<center><a href="<?php if($_SESSION['userid']!=''){?>savecustomizesuit.php?productid=<?php echo $_REQUEST['id'];?>&acn=savecustsuit<?php } else {?>login.php<?php }?>" id="login_link_h" class="login_link_h btn" style="padding: 6px 5px !important;">&nbsp; &nbsp; &nbsp; &nbsp; YES &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
				<td>
					<center><a href="shoppingbag.php" class="btn" style="padding: 6px 5px !important;"> &nbsp; &nbsp; &nbsp; &nbsp; NO &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
			</tr>
		</table>
	</div>
	</div>
<?php } ?>

<?php if($_REQUEST['acn']=='usedcustomizesuit'){ 
unset($_SESSION['redirecturlsavecust']);	

$_SESSION['redirecturlusedcustomize'] = 'usedcustomizesuit';

?>
<div style="width:550px;" align="center">
	<div class="login_mainx" >
	
		
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
					<center><a href="<?php if($_SESSION['userid']!=''){?>savecustomizesuit.php?productid=<?php echo $_REQUEST['id'];?>&acn=usedcustomizesuit<?php }else {?>login.php<?php }?>" id="login_link_h" class="login_link_h btn" style="padding: 6px 5px !important;">&nbsp; &nbsp; &nbsp; &nbsp; YES &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
				<td>
					<center><a href="suitcustomize.php?productid=<?php echo $_SESSION['product'];?>" class="btn" style="padding: 6px 5px !important;" > &nbsp; &nbsp; &nbsp; &nbsp; NO &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
			</tr>
		</table>
	</div>
	</div>
<?php } ?>
</body>
</html>

