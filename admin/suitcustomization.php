<?php
include("system/config.inc.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 
include("function/suitcustomization.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Suit Customization | <?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

</head>

<body>
<?php include("include/header.php");

$productsql = "SELECT * FROM `product` WHERE `productid`='".$productid."'"; 
$productresult = $obj_db->select($productsql);
//$productname = $productresult[0]['uniqname'];
$productname = $_REQUEST['productid'];

$sql="SELECT * FROM `suitcustomization` Where `productid` = '".$_REQUEST['productid']."' ";
$result=$obj_db->select($sql);
?>
<div class="block">
	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		<h2>Manage Suit Customization</h2>
		<ul>
								<li><a href="product.php">Back</a></li>
								<?php 
								$dir = 'upload/suit/'.$productname;
								if(is_dir($dir)) {
								?>
								<li>
									<a href="suitcustomization.php?delall=<?php echo $result[0]['suitcustomizationid']; ?>&productid=<?php echo $_REQUEST['productid']; ?>" OnClick="return confirm('Are you sure want delete this record?');">Delete All Images</a>
								</li>
								<?php } ?>
							</ul>
	</div>
	<div class="block_content">
		<?php if($_REQUEST['msg']=="added") {
						echo '<div class="message success" style="display: block;"><p>Record Added Sucssesfully.</p></div>';
					}
						if($_REQUEST['msg']=="updated") {
							echo '<div class="message success" style="display: block;"><p> Record Updated Sucssesfully. </p></div>';
						}
						if($_REQUEST['msg']=="deleted") {
							echo '<div class="message errormsg" style="display: block;"><p>Record Deleted Sucssesfully. </p></div>';
						}
						
						?>
<!-- popup start -->

<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
    $(document).ready(function() {
        $("a[rel=example_group]").fancybox({
             'transitionIn'  : 'elastic',
			'transitionOut'  : 'elastic',
        });
    });
</script>          
<!-- popup end -->
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="productid" value="<?php echo $_REQUEST['productid']; ?>" />
			<table class="adminlist" cellpadding="3" cellspacing="1" width="100%">
			
			<tr> 
					<td><strong>Suit Type</strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Lapel start ---------------------------------------------------------->						
							<tr>
								<td>Two Piece :</td>
								<td><input type="file" name="two_piece" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['two_piece']) {?>
								<td><a href="suitcustomization.php?field=two_piece&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['two_piece'];?>" title="Peak Lapel">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['two_piece'];?>" height="70px;" alt="" /></a>
								</td>	
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Three Piece  :</td>
								<td><input type="file" name="three_piece" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['three_piece']) {?>
								<td><a href="suitcustomization.php?field=three_piece&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['three_piece'];?>" title="Three Piece Lapel">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['three_piece'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- Suit Type end ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Lapel</strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Lapel start ---------------------------------------------------------->						
							<tr>
								<td>Peak Lapel :</td>
								<td><input type="file" name="type_peak_lapel" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['type_peak_lapel']) {?>
								<td><a href="suitcustomization.php?field=type_peak_lapel&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['type_peak_lapel'];?>" title="Peak Lapel">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['type_peak_lapel'];?>" height="70px;" alt="" /></a>
								</td>	
								<?php } ?>
							</tr>
							
							
							
							<tr>
								<td>Notch Lapel :</td>
								<td><input type="file" name="type_notch_lapel" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['type_notch_lapel']) {?>
								<td><a href="suitcustomization.php?field=type_notch_lapel&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['type_notch_lapel'];?>" title="Notch Lapel">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['type_notch_lapel'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							
							<tr>
								<td>Slim Notch Lapel :</td>
								<td><input type="file" name="type_slim_notch_lapel" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['type_slim_notch_lapel']) {?>
								<td><a href="suitcustomization.php?field=type_slim_notch_lapel&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['type_slim_notch_lapel'];?>" title="Slim Notch Lapel">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['type_slim_notch_lapel'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Shawl Lapel :</td>
								<td><input type="file" name="type_shawl_lapel" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['type_shawl_lapel']) {?>
								<td><a href="suitcustomization.php?field=type_shawl_lapel&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['type_shawl_lapel'];?>" title="Shawl Lapel">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['type_shawl_lapel'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Mao Lapel :</td>
								<td><input type="file" name="type_mao_lapel" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['type_mao_lapel']) {?>
								<td><a href="suitcustomization.php?field=type_mao_lapel&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['type_mao_lapel'];?>" title="Mao Lapel">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['type_mao_lapel'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							
<!-------------------------- Lapel end ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				
				
				<tr> 
					<td><strong>Vents </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Vents start ---------------------------------------------------------->						
							<tr>
								<td>Vents One :</td>
								<td><input type="file" name="vents_one" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vents_one']) {?>
								<td><a href="suitcustomization.php?field=vents_one&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vents_one'];?>" title="Vents One">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vents_one'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Vents Two :</td>
								<td><input type="file" name="vents_two" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vents_two']) {?>
								<td><a href="suitcustomization.php?field=vents_two&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vents_two'];?>" title="Vents Two">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vents_two'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Vents None :</td>
								<td><input type="file" name="vents_none" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vents_none']) {?>
								<td><a href="suitcustomization.php?field=vents_none&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vents_none'];?>" title="Vents None">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vents_none'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
					</table>
<!-------------------------- Vents end ---------------------------------------------------------->						

					</td>
				</tr>
				
				<tr> 
					<td><strong>Buttons </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Buttons start ---------------------------------------------------------->						

							<tr>
								<td>Buttons One :</td>
								<td><input type="file" name="button_one" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['button_one']) {?>
								<td><a href="suitcustomization.php?field=button_one&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['button_one'];?>" title="Buttons One">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['button_one'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Buttons Two :</td>
								<td><input type="file" name="button_two" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['button_two']) {?>
								<td><a href="suitcustomization.php?field=button_two&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['button_two'];?>" title="Buttons Two">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['button_two'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Buttons Three :</td>
								<td><input type="file" name="button_three" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['button_three']) {?>
								<td><a href="suitcustomization.php?field=button_three&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['button_three'];?>" title="Buttons Three">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['button_three'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Buttons Double Breasted  :</td>
								<td><input type="file" name="button_double_breasted" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['button_double_breasted']) {?>
								<td><a href="suitcustomization.php?field=button_double_breasted&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['button_double_breasted'];?>" title="Buttons Double Breasted">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['button_double_breasted'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
<!-------------------------- Buttons end ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Pocket Style </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Pocket Style start ---------------------------------------------------------->						

							<tr>
								<td>Straight Flap :</td>
								<td><input type="file" name="pocket_straight_flap" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pocket_straight_flap']) {?>
								<td><a href="suitcustomization.php?field=pocket_straight_flap&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['pocket_straight_flap'];?>" title="Straight Flap">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['pocket_straight_flap'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Slanted Flap :</td>
								<td><input type="file" name="pocket_slanted_flap" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pocket_slanted_flap']) {?>
								<td><a href="suitcustomization.php?field=pocket_slanted_flap&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['pocket_slanted_flap'];?>" title="Slanted Flap">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['pocket_slanted_flap'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Piped Flap :</td>
								<td><input type="file" name="pocket_piped_flap" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pocket_piped_flap']) {?>
								<td><a href="suitcustomization.php?field=pocket_piped_flap&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['pocket_piped_flap'];?>" title="Piped Flap">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['pocket_piped_flap'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Patch Flap :</td>
								<td><input type="file" name="pocket_patch_flap" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pocket_patch_flap']) {?>
								<td><a href="suitcustomization.php?field=pocket_patch_flap&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['pocket_patch_flap'];?>" title="Patch Flap">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['pocket_patch_flap'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
						</table>
<!-------------------------- Pocket Style end ---------------------------------------------------------->						

					</td>
				</tr>
				
				
				<tr> 
					<td><strong>Breast Pocket </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- pocket start ---------------------------------------------------------->						

							<tr>
								<td>Breast Pocket Yes :</td>
								<td><input type="file" name="breast_pocket_yes" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['breast_pocket_yes']) {?>
								<td><a href="suitcustomization.php?field=breast_pocket_yes&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['breast_pocket_yes'];?>" title="Breast Pocket Yes">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['breast_pocket_yes'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Breast Pocket No :</td>
								<td><input type="file" name="breast_pocket_no" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['breast_pocket_no']) {?>
								<td><a href="suitcustomization.php?field=breast_pocket_no&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['breast_pocket_no'];?>" title="Breast Pocket No">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['breast_pocket_no'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- Breast pocket end ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Ticket Pocket </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- pocket start ---------------------------------------------------------->						

							<tr>
								<td>Ticket Pocket Yes :</td>
								<td><input type="file" name="ticket_pocket_yes" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['ticket_pocket_yes']) {?>
								<td><a href="suitcustomization.php?field=ticket_pocket_yes&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['ticket_pocket_yes'];?>" title="Ticket Pocket Yes">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['ticket_pocket_yes'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Ticket Pocket No :</td>
								<td><input type="file" name="ticket_pocket_no" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['ticket_pocket_no']) {?>
								<td><a href="suitcustomization.php?field=ticket_pocket_no&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['ticket_pocket_no'];?>" title="Ticket Pocket No">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['ticket_pocket_no'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- Ticket pocket end ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Sleeve Buttons </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- placket start ---------------------------------------------------------->						
							<tr>
								<td>Working Buttons :</td>
								<td><input type="file" name="sleeve_buttons_working" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['sleeve_buttons_working']) {?>
								<td><a href="suitcustomization.php?field=sleeve_buttons_working&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['sleeve_buttons_working'];?>" title="Working Buttons">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['sleeve_buttons_working'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Overlapping Buttons :</td>
								<td><input type="file" name="sleeve_buttons_overlapping" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['sleeve_buttons_overlapping']) {?>
								<td><a href="suitcustomization.php?field=sleeve_buttons_overlapping&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['sleeve_buttons_overlapping'];?>" title="Overlapping Buttons">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['sleeve_buttons_overlapping'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
						
<!-------------------------- placket start ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Lapel Buttonhole </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Lapel Buttonhole start ---------------------------------------------------------->						

							<tr>
								<td>Lapel Buttonhole Yes :</td>
								<td><input type="file" name="lapel_buttonhole_yes" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['lapel_buttonhole_yes']) {?>
								<td><a href="suitcustomization.php?field=lapel_buttonhole_yes&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['lapel_buttonhole_yes'];?>" title="Lapel Buttonhole Yes">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['lapel_buttonhole_yes'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Lapel Buttonhole No :</td>
								<td><input type="file" name="lapel_buttonhole_no" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['lapel_buttonhole_no']) {?>
								<td><a href="suitcustomization.php?field=lapel_buttonhole_no&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['lapel_buttonhole_no'];?>" title="Lapel Buttonhole No">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['lapel_buttonhole_no'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- Lapel Buttonhole end---------------------------------------------------------->						

						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Lapel Buttonhole </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Inter Linings start ---------------------------------------------------------->						

							<tr>
								<td>Inter Linings :</td>
								<td><input type="file" name="inner_linings" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['inner_linings']) {?>
								<td><a href="suitcustomization.php?field=inner_linings&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['inner_linings'];?>" title="Inter Linings">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['inner_linings'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
<!-------------------------- Inter Linings end---------------------------------------------------------->						

						</table>
					</td>
				</tr>
				
<!----------------------------------------------------- Vests for 3 piece only end---------------------------------------------------------->						
				
				<tr> 
					<td><strong>Vests Buttons </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Vests Buttons start ---------------------------------------------------------->						

							<tr>
								<td>Vests Buttons Three :</td>
								<td><input type="file" name="vests_button_three" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_button_three']) {?>
								<td><a href="suitcustomization.php?field=vests_button_three&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_button_three'];?>" title="Vests Buttons Three">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_button_three'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Vests Buttons Four :</td>
								<td><input type="file" name="vests_button_four" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_button_four']) {?>
								<td><a href="suitcustomization.php?field=vests_button_four&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_button_four'];?>" title="Vests Buttons Four">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_button_four'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Vests Buttons Five :</td>
								<td><input type="file" name="vests_button_five" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_button_five']) {?>
								<td><a href="suitcustomization.php?field=vests_button_five&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_button_five'];?>" title="Vests Buttons Five">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_button_five'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Vests Buttons Six  :</td>
								<td><input type="file" name="vests_button_six" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_button_six']) {?>
								<td><a href="suitcustomization.php?field=vests_button_six&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_button_six'];?>" title="Vests Buttons Six">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_button_six'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Vests Buttons Seven  :</td>
								<td><input type="file" name="vests_button_seven" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_button_seven']) {?>
								<td><a href="suitcustomization.php?field=vests_button_seven&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_button_seven'];?>" title="Vests Buttons Seven">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_button_seven'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
<!--------------------------Vests Buttons end ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Vests Breast Pocket </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!--------------------------Vests Back start ---------------------------------------------------------->						

							<tr>
								<td>Vests Back Interlining :</td>
								<td><input type="file" name="vests_back_interlining" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_back_interlining']) {?>
								<td><a href="suitcustomization.php?field=vests_back_interlining&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_back_interlining'];?>" title="Vests Back Interlining">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_back_interlining'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Vests Back Normal :</td>
								<td><input type="file" name="vests_back_normal" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_back_normal']) {?>
								<td><a href="suitcustomization.php?field=vests_back_normal&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_back_normal'];?>" title="Vests Back Normal">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_back_normal'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>

<!-------------------------- Pocket Style end ---------------------------------------------------------->						
										</table>
					</td>
				</tr>

				<tr> 
					<td><strong>Vests Pocket Style </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!--------------------------Vests Pocket Style start ---------------------------------------------------------->						

							<tr>
								<td>Vests Straight Flap :</td>
								<td><input type="file" name="vests_pocket_straight" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_pocket_straight']) {?>
								<td><a href="suitcustomization.php?field=vests_pocket_straight&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_pocket_straight'];?>" title="Vests Straight Flap">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_pocket_straight'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Vests Slanted Flap :</td>
								<td><input type="file" name="vests_pocket_slanted" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_pocket_slanted']) {?>
								<td><a href="suitcustomization.php?field=vests_pocket_slanted&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_pocket_slanted'];?>" title="Vests Slanted Flap">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_pocket_slanted'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Vests Piped Flap :</td>
								<td><input type="file" name="vests_pocket_piped" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_pocket_piped']) {?>
								<td><a href="suitcustomization.php?field=vests_pocket_piped&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_pocket_piped'];?>" title="Vests Piped Flap">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_pocket_piped'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
						</table>
<!-------------------------- Pocket Style end ---------------------------------------------------------->						

					</td>
				</tr>
				
				
				<tr> 
					<td><strong>Vests Breast Pocket </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!--------------------------Vests Breast  pocket start ---------------------------------------------------------->						

							<tr>
								<td>Vests Breast Pocket Yes :</td>
								<td><input type="file" name="vests_breast_pocket_yes" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_breast_pocket_yes']) {?>
								<td><a href="suitcustomization.php?field=vests_breast_pocket_yes&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_breast_pocket_yes'];?>" title="Vests Breast Pocket Yes">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_breast_pocket_yes'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Vests Breast Pocket No :</td>
								<td><input type="file" name="vests_breast_pocket_no" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['vests_breast_pocket_no']) {?>
								<td><a href="suitcustomization.php?field=vests_breast_pocket_no&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['suitcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_breast_pocket_no'];?>" title="Vests Breast Pocket No">
									<img src="upload/suit/<?php echo $productname;?>/<?php echo $result[0]['vests_breast_pocket_no'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!--------------------------Vests Breast pocket end ---------------------------------------------------------->						
						</table>
					</td>
				</tr>		
				
				
				
				
				
				
				<tr><td>
					<hr /><input type="submit" name="submit" class="submit long" value="Add/Edit Images" />
				</td></tr>
				
			</table>
			</form>
		
	</div>
	<!-- .block_content ends -->
	<div class="bendl"></div>
	<div class="bendr"></div>
</div>
<?php include("include/footer.php");?>
</body>
</html>
