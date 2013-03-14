<?php include("system/config.inc.php"); 
	//include("function/addtocart.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fabric Detail |<?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
#fancybox-content {
	background:#FFF;
	padding:5px;
}
#fancybox-content div{
	overflow:inherit !important;
}
#fancybox-outer {
	-moz-border-radius:5px;
	float:left;
	min-width:710px !important;	
}
#fancybox-close{
	display:none !important;	
}
</style>

</head>
<body>
<?php 
//--------select query for display data-------//
		/*$sql = "SELECT productoption.*,optiontype.*,option.optionname,option.optionid,product.productname,product.price,
							product.productid,product.image FROM `productoption`
							 LEFT OUTER JOIN `optiontype` ON 
							 `optiontype`.`optiontypeid` = `productoption`.`optiontypeid`
							 LEFT OUTER JOIN `option` ON 
							 `option`.`optionid` = `optiontype`.`optionid`
							 LEFT OUTER JOIN `product` ON 
							 `product`.`productid` = `productoption`.`productid`
							 WHERE `productoption`.`productid`=".$_REQUEST['id']."
							 ORDER BY `optiontype`.`optionid` ASC";*/
		$sql = "SELECT productoption. * , optiontype. * , option.optionname, option.optionid, product.productname,
								product.price, product.productid, product.image
								FROM `product`
								LEFT OUTER JOIN `productoption` ON `product`.`productid` = `productoption`.`productid`
								LEFT OUTER JOIN `optiontype` ON `optiontype`.`optiontypeid` = `productoption`.`optiontypeid`
								LEFT OUTER JOIN `option` ON `option`.`optionid` = `optiontype`.`optionid`
								WHERE `product`.`productid` =".$_REQUEST['id']."
								ORDER BY `optiontype`.`optionid` ASC ";
		$result=$obj_db->select($sql);
		$optionid = "";
?>
<div style="width:710px; height:550px;" align="center">
	<div class="fabric" >

		<table class="fabric" width="100%">
			<tr>
				<td rowspan="10" width="450px" valign="top"> <img src="admin/upload/image/bigthumb/<?php echo $result[0]['image']; ?>" height="500" alt="<?php echo $result[0]['productname']?>" /> </td>
				<td height="25px">
					<table>
							<tr>
								<td><div class="fabricmaintitle"><?php echo $result[0]['productname']?></div></td>
							</tr>
						</table>
				</td>
			</tr>
			<tr>
				<td height="25px" width="200px" valign="top" style="text-align:left;">					
					<table>
						<tr>
							<td> <strong>Price</strong></td>
						</tr>
						<tr>
							<td>
								<div class="fabrictitle-inner-title">$ <?php echo $result[0]['price']?></div>
							</td>
						</tr>
						<?php for($i=0;$i<count($result);$i++){ ?>
						
						<?php if($optionid!=$result[$i]['optionid'])
									{
										$optionid = $result[$i]['optionid']; ?>
						<tr>
							<td> <strong><?php echo $result[$i]['optionname'] ?></strong></td>
						</tr>
						<?php } ?>
						<tr>
							<td>
								<div class="fabrictitle-inner-title"><?php echo $result[$i]['optiontypename'] ?></div>
							</td>
						</tr>
									
						<?php } ?>
					</table>					
				</td>
			</tr>
			<?php /*for($i=0;$i<count($result);$i++){ ?>
				<tr>
				<td height="25px">
					<div class="fabrictitle">
						<table class="fabric">
							<?php if($optionid!=$result[$i]['optionid'])
										{
											$optionid = $result[$i]['optionid']; ?>
							<tr>
								<td> <strong><?php echo $result[$i]['optionname'] ?></strong></td>
							</tr>
							<?php } ?>
							<tr>
								<td>
									<div class="fabrictitle-inner-title"><?php echo $result[$i]['optiontypename'] ?></div>
								</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
			
			<?php } */?>
			<tr><td>&nbsp;</td></tr>

		
			
		<table class="shoppingbutton">
			<tr>
				<!--<td colspan="2">
					<a href="addtocart.php?productid=<?php echo $result[0]['productid']?>" class="btn" >Add to Bag</a>
				</td>-->
				<td colspan="5" align="center">
					<a href="customize.php?productid=<?php echo $result[0]['productid']?>" class="btn" >3D Customize</a>
				</td>
			</tr>
		</table>
		</table>
	</div>
</div>
</body>
</html>