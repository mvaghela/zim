<?php
include("system/config.inc.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 
include("function/shirtcustomization.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Shirt Customization |<?php echo $sitename; ?></title>
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

$sql="SELECT * FROM `shirtcustomization` Where `productid` = '".$_REQUEST['productid']."' ";
$result=$obj_db->select($sql);
?>
<div class="block">
	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		<h2>Manage Shirt Customization</h2>
		<ul>
								<li><a href="product.php">Back</a></li>
								<?php 
								$dir = 'upload/shirt/'.$productname;
								if(is_dir($dir)) {
								?>
								<li>
									<a href="shirtcustomization.php?delall=<?php echo $result[0]['shirtcustomizationid']; ?>&productid=<?php echo $_REQUEST['productid']; ?>" OnClick="return confirm('Are you sure want delete this record?');">Delete All Images</a>
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
					<td><strong>Fit </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- fit start ---------------------------------------------------------->						
							<tr>
								<td>Slim Fit :</td>
								<td><input type="file" name="fit_slimfit" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_slimfit']) {?>
								<td><a href="shirtcustomization.php?field=fit_slimfit&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit'];?>" title="Slim Fit">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit'];?>" height="70px;" alt="" /></a>
								</td>	
								<?php } ?>
							</tr>
							
							
							
							<tr>
								<td>Normal Fit :</td>
								<td><input type="file" name="fit_normalfit" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_normalfit']) {?>
								<td><a href="shirtcustomization.php?field=fit_normalfit&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit'];?>" title="Normal Fit">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							
							<tr>
								<td>Loose Fit :</td>
								<td><input type="file" name="fit_loosefit" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_loosefit']) {?>
								<td><a href="shirtcustomization.php?field=fit_loosefit&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit'];?>" title="Loose Fit">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- fit end ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Style </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- style start ---------------------------------------------------------->						
							<tr>
								<td>Full Slim Sleeve :</td>
								<td><input type="file" name="style_full_fit_slimfit_sleeve" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['style_full_fit_slimfit_sleeve']) {?>
								<td><a href="shirtcustomization.php?field=style_full_fit_slimfit_sleeve&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_full_fit_slimfit_sleeve'];?>" title="Full Slim Sleeve">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_full_fit_slimfit_sleeve'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Half Slim Sleeve :</td>
								<td><input type="file" name="style_half_fit_slimfit_sleeve" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['style_half_fit_slimfit_sleeve']) {?>
								<td><a href="shirtcustomization.php?field=style_half_fit_slimfit_sleeve&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_half_fit_slimfit_sleeve'];?>" title="Half Slim Sleeve">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_half_fit_slimfit_sleeve'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Full Normal Sleeve :</td>
								<td><input type="file" name="style_full_fit_normalfit_sleeve" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['style_full_fit_normalfit_sleeve']) {?>
								<td><a href="shirtcustomization.php?field=style_fullnormalsleeve&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_full_fit_normalfit_sleeve'];?>" title="Full Normal Sleeve">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_full_fit_normalfit_sleeve'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
														
							<tr>
								<td>Half Normal Sleeve :</td>
								<td><input type="file" name="style_half_fit_normalfit_sleeve" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['style_half_fit_normalfit_sleeve']) {?>
								<td><a href="shirtcustomization.php?field=style_halfnormalsleeve&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_half_fit_normalfit_sleeve'];?>" title="Half Normal Sleeve">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_half_fit_normalfit_sleeve'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Full Loose Sleeve :</td>
								<td><input type="file" name="style_full_fit_loosefit_sleeve" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['style_full_fit_loosefit_sleeve']) {?>
								<td><a href="shirtcustomization.php?field=style_fullloosesleeve&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_full_fit_loosefit_sleeve'];?>" title="Full Loose Sleeve">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_full_fit_loosefit_sleeve'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Half Loose Sleeve :</td>
								<td><input type="file" name="style_half_fit_loosefit_sleeve" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['style_half_fit_loosefit_sleeve']) {?>
								<td><a href="shirtcustomization.php?field=style_halfloosesleeve&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_half_fit_loosefit_sleeve'];?>" title="Half Loose Sleeve">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['style_half_fit_loosefit_sleeve'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
					</table>
<!-------------------------- style end ---------------------------------------------------------->						

					</td>
				</tr>
				
				<tr> 
					<td><strong>Collar </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- collar start ---------------------------------------------------------->						

							<tr>
								<td>Straight :</td>
								<td><input type="file" name="collar_straight" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_straight']) {?>
								<td><a href="shirtcustomization.php?field=collar_straight&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_straight'];?>" title="Straight">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_straight'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Classic :</td>
								<td><input type="file" name="collar_classic" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_classic']) {?>
								<td><a href="shirtcustomization.php?field=collar_classic&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_classic'];?>" title="Classic">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_classic'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Spread :</td>
								<td><input type="file" name="collar_spread" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_spread']) {?>
								<td><a href="shirtcustomization.php?field=collar_spread&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_spread'];?>" title="Spread">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_spread'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Cutaway :</td>
								<td><input type="file" name="collar_cutaway" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_cutaway']) {?>
								<td><a href="shirtcustomization.php?field=collar_cutaway&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_cutaway'];?>" title="Cutaway">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_cutaway'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Full Cutaway :</td>
								<td><input type="file" name="collar_fullcutaway" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_fullcutaway']) {?>
								<td><a href="shirtcustomization.php?field=collar_fullcutaway&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_fullcutaway'];?>" title="Full Cutaway">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_fullcutaway'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>English Cutaway :</td>
								<td><input type="file" name="collar_englishcutaway" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_englishcutaway']) {?>
								<td><a href="shirtcustomization.php?field=collar_englishcutaway&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_englishcutaway'];?>" title="English Cutaway">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_englishcutaway'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Curved Cutaway :</td>
								<td><input type="file" name="collar_curvedcutaway" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_curvedcutaway']) {?>
								<td><a href="shirtcustomization.php?field=collar_curvedcutaway&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_curvedcutaway'];?>" title="Curved Cutaway">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_curvedcutaway'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Cutaway to button :</td>
								<td><input type="file" name="collar_cutawaybutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_cutawaybutton']) {?>
								<td><a href="shirtcustomization.php?field=collar_cutawaybutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_cutawaybutton'];?>" title="Cutaway to button">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_cutawaybutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Banded Collar :</td>
								<td><input type="file" name="collar_bandedcollar" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_bandedcollar']) {?>
								<td><a href="shirtcustomization.php?field=collar_bandedcollar&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_bandedcollar'];?>" title="Banded Collar">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_bandedcollar'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Wingup Collar :</td>
								<td><input type="file" name="collar_wingup" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_wingup']) {?>
								<td><a href="shirtcustomization.php?field=collar_wingup&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_wingup'];?>" title="Wingup Collar">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_wingup'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td> Button Down :</td>
								<td><input type="file" name="collar_buttondown" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_buttondown']) {?>
								<td><a href="shirtcustomization.php?field=collar_buttondown&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_buttondown'];?>" title=" Button Down">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_buttondown'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Rounded :</td>
								<td><input type="file" name="collar_rounded" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['collar_rounded']) {?>
								<td><a href="shirtcustomization.php?field=collar_rounded&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_rounded'];?>" title="Rounded">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['collar_rounded'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- collar end ---------------------------------------------------------->						

						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Cuff </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- cuff start ---------------------------------------------------------->						

							<tr>
								<td>Single Button Miter :</td>
								<td><input type="file" name="cuff_singlebuttonmiter" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['cuff_singlebuttonmiter']) {?>
								<td><a href="shirtcustomization.php?field=cuff_singlebuttonmiter&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_singlebuttonmiter'];?>" title="Single Button Miter">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_singlebuttonmiter'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Double Button Miter :</td>
								<td><input type="file" name="cuff_doublebuttonmiter" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['cuff_doublebuttonmiter']) {?>
								<td><a href="shirtcustomization.php?field=cuff_doublebuttonmiter&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_doublebuttonmiter'];?>" title="Double Button Miter">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_doublebuttonmiter'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>French Button Miter :</td>
								<td><input type="file" name="cuff_frenchbuttonmiter" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['cuff_frenchbuttonmiter']) {?>
								<td><a href="shirtcustomization.php?field=cuff_frenchbuttonmiter&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_frenchbuttonmiter'];?>" title="French Button Miter">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_frenchbuttonmiter'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Single Button Round :</td>
								<td><input type="file" name="cuff_singlebuttonround" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['cuff_singlebuttonround']) {?>
								<td><a href="shirtcustomization.php?field=cuff_singlebuttonround&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_singlebuttonround'];?>" title="Single Button Round">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_singlebuttonround'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Double Button Round :</td>
								<td><input type="file" name="cuff_doublebuttonround" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['cuff_doublebuttonround']) {?>
								<td><a href="shirtcustomization.php?field=cuff_doublebuttonround&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_doublebuttonround'];?>" title="Double Button Round">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_doublebuttonround'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>French Button Round :</td>
								<td><input type="file" name="cuff_frenchbuttonround" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['cuff_frenchbuttonround']) {?>
								<td><a href="shirtcustomization.php?field=cuff_frenchbuttonround&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_frenchbuttonround'];?>" title="French Button Round">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_frenchbuttonround'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Single Button Square :</td>
								<td><input type="file" name="cuff_singlebuttonsquare" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['cuff_singlebuttonsquare']) {?>
								<td><a href="shirtcustomization.php?field=cuff_singlebuttonsquare&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_singlebuttonsquare'];?>" title="Single Button Square">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_singlebuttonsquare'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Double Button Square :</td>
								<td><input type="file" name="cuff_doublebuttonsquare" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['cuff_doublebuttonsquare']) {?>
								<td><a href="shirtcustomization.php?field=cuff_doublebuttonsquare&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_doublebuttonsquare'];?>" title="Double Button Square">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_doublebuttonsquare'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>French Button Square :</td>
								<td><input type="file" name="cuff_frenchbuttonsquare" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['cuff_frenchbuttonsquare']) {?>
								<td><a href="shirtcustomization.php?field=cuff_frenchbuttonsquare&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_frenchbuttonsquare'];?>" title="French Button Square">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['cuff_frenchbuttonsquare'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							</table>
<!-------------------------- cuff end ---------------------------------------------------------->						

					</td>
				</tr>
				
				
				<tr> 
					<td><strong>Pocket </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- pocket start ---------------------------------------------------------->						

							<tr>
								<td>Pocket Miter :</td>
								<td><input type="file" name="pocket_miter" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pocket_miter']) {?>
								<td><a href="shirtcustomization.php?field=pocket_miter&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['pocket_miter'];?>" title="Pocket Miter">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['pocket_miter'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Pocket Round :</td>
								<td><input type="file" name="pocket_round" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pocket_round']) {?>
								<td><a href="shirtcustomization.php?field=pocket_round&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['pocket_round'];?>" title="Pocket Round">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['pocket_round'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Pocket Square :</td>
								<td><input type="file" name="pocket_square" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pocket_square']) {?>
								<td><a href="shirtcustomization.php?field=pocket_square&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['pocket_square'];?>" title="Pocket Square">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['pocket_square'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Pocket V-shape :</td>
								<td><input type="file" name="pocket_vshape" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pocket_vshape']) {?>
								<td><a href="shirtcustomization.php?field=pocket_vshape&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['pocket_vshape'];?>" title="Pocket V-shape">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['pocket_vshape'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<!--<tr>
								<td>No Pocket :</td>
								<td><input type="file" name="pocket_nopocket" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pocket_nopocket']) {?>
								<td><a href="shirtcustomization.php?field=pocket_nopocket&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['pocket_nopocket'];?>" title="No Pocket">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['pocket_nopocket'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>-->
<!-------------------------- pocket end ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Front </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- placket start ---------------------------------------------------------->						
							<tr>
								<td>Placket :</td>
								<td><input type="file" name="front_placket" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['front_placket']) {?>
								<td><a href="shirtcustomization.php?field=front_placket&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['front_placket'];?>" title="Front Placket">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['front_placket'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Covered Placket:</td>
								<td><input type="file" name="front_covered" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['front_covered']) {?>
								<td><a href="shirtcustomization.php?field=front_covered&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['front_covered'];?>" title="Covered Placket">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['front_covered'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>No Placket :</td>
								<td><input type="file" name="front_noplacket" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['front_noplacket']) {?>
								<td><a href="shirtcustomization.php?field=front_noplacket&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['front_noplacket'];?>" title="No Placket">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['front_noplacket'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- placket start ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Back </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- back start ---------------------------------------------------------->						

							<tr>
								<td>Side Pleats :</td>
								<td><input type="file" name="back_sidepleats" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['back_sidepleats']) {?>
								<td><a href="shirtcustomization.php?field=back_sidepleats&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['back_sidepleats'];?>" title="Side Pleats">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['back_sidepleats'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Box Pleats :</td>
								<td><input type="file" name="back_boxpleats" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['back_boxpleats']) {?>
								<td><a href="shirtcustomization.php?field=back_boxpleats&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['back_boxpleats'];?>" title="Box Pleats">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['back_boxpleats'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>No Pleats :</td>
								<td><input type="file" name="back_nopleats" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['back_nopleats']) {?>
								<td><a href="shirtcustomization.php?field=back_nopleats&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['shirtcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['back_nopleats'];?>" title="No Pleats">
									<img src="upload/shirt/<?php echo $productname;?>/<?php echo $result[0]['back_nopleats'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
<!-------------------------- back end---------------------------------------------------------->						

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
