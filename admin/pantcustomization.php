<?php
include("system/config.inc.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 
include("function/pantscustomization.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Pant Customization |<?php echo $sitename; ?></title>
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

$sql="SELECT * FROM `pantcustomization` Where `productid` = '".$_REQUEST['productid']."' ";
$result=$obj_db->select($sql);
?>
<div class="block">
	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		<h2>Manage Pant Customization</h2>
		<ul>
								<li><a href="product.php">Back</a></li>
								<?php 
								$dir = 'upload/Pant/'.$productname;
								if(is_dir($dir)) {
								?>
								<li>
									<a href="pantcustomization.php?delall=<?php echo $result[0]['pantcustomizationid']; ?>&productid=<?php echo $_REQUEST['productid']; ?>" OnClick="return confirm('Are you sure want delete this record?');">Delete All Images</a>
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
					<td><strong>Slim Fit With Style For Front and Back </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- fit start ---------------------------------------------------------->						
							<tr>
								<td>Slim Narrow Front Fit :</td>
								<td><input type="file" name="fit_slimfit_narrow_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_slimfit_narrow_front']) {?>
								<td><a href="pantcustomization.php?field=fit_slimfit_narrow_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_narrow_front'];?>" title="Slim Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_narrow_front'];?>" height="70px;" alt="" /></a>
								</td>	
								<?php } ?>
							</tr>
							
							<tr>
								<td>Slim Straight Front Fit :</td>
								<td><input type="file" name="fit_slimfit_stright_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_slimfit_stright_front']) {?>
								<td><a href="pantcustomization.php?field=fit_slimfit_stright_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_stright_front'];?>" title="Slim Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_stright_front'];?>" height="70px;" alt="" /></a>
								</td>	
								<?php } ?>
							</tr>
							<tr>
								<td>Slim Bellbottom Front Fit :</td>
								<td><input type="file" name="fit_slimfit_bellbottom_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_slimfit_bellbottom_front']) {?>
								<td><a href="pantcustomization.php?field=fit_slimfit_bellbottom_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_bellbottom_front'];?>" title="Slim Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_bellbottom_front'];?>" height="70px;" alt="" /></a>
								</td>	
								<?php } ?>
							</tr>
							
							<tr>
								<td>Slim Narrow Back Fit :</td>
								<td><input type="file" name="fit_slimfit_narrow_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_slimfit_narrow_back']) {?>
								<td><a href="pantcustomization.php?field=fit_slimfit_narrow_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_narrow_back'];?>" title="Slim Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_narrow_back'];?>" height="70px;" alt="" /></a>
								</td>	
								<?php } ?>
							</tr>
							
							<tr>
								<td>Slim Straight Back Fit :</td>
								<td><input type="file" name="fit_slimfit_stright_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_slimfit_stright_back']) {?>
								<td><a href="pantcustomization.php?field=fit_slimfit_stright_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_stright_back'];?>" title="Slim Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_stright_back'];?>" height="70px;" alt="" /></a>
								</td>	
								<?php } ?>
							</tr>
							<tr>
								<td>Slim Bellbottom Back Fit :</td>
								<td><input type="file" name="fit_slimfit_bellbottom_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_slimfit_bellbottom_back']) {?>
								<td><a href="pantcustomization.php?field=fit_slimfit_bellbottom_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_bellbottom_back'];?>" title="Slim Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_slimfit_bellbottom_back'];?>" height="70px;" alt="" /></a>
								</td>	
								<?php } ?>
							</tr>
							
							
							
							
							<tr>
								<td>Normal Narrow Front Fit :</td>
								<td><input type="file" name="fit_normalfit_narrow_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_normalfit_narrow_front']) {?>
								<td><a href="pantcustomization.php?field=fit_normalfit_narrow_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_narrow_front'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_narrow_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							<tr>
								<td>Normal Straight Front Fit :</td>
								<td><input type="file" name="fit_normalfit_stright_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_normalfit_stright_front']) {?>
								<td><a href="pantcustomization.php?field=fit_normalfit_stright_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_stright_front'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_stright_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							<tr>
								<td>Normal Bellbottom Front Fit :</td>
								<td><input type="file" name="fit_normalfit_bellbottom_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_normalfit_bellbottom_front']) {?>
								<td><a href="pantcustomization.php?field=fit_normalfit_bellbottom_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_bellbottom_front'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_bellbottom_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							<tr>
								<td>Normal Narrow Back Fit :</td>
								<td><input type="file" name="fit_normalfit_narrow_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_normalfit_narrow_back']) {?>
								<td><a href="pantcustomization.php?field=fit_normalfit_narrow_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_narrow_back'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_narrow_back'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							<tr>
								<td>Normal Straight Back Fit :</td>
								<td><input type="file" name="fit_normalfit_stright_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_normalfit_stright_back']) {?>
								<td><a href="pantcustomization.php?field=fit_normalfit_stright_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_stright_back'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_stright_back'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							<tr>
								<td>Normal Bellbottom Back Fit :</td>
								<td><input type="file" name="fit_normalfit_bellbottom_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_normalfit_bellbottom_back']) {?>
								<td><a href="pantcustomization.php?field=fit_normalfit_bellbottom_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_bellbottom_back'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_normalfit_bellbottom_back'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							<tr>
								<td>Loose Narrow Front Fit :</td>
								<td><input type="file" name="fit_loosefit_narrow_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_loosefit_narrow_front']) {?>
								<td><a href="pantcustomization.php?field=fit_loosefit_narrow_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_narrow_front'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_narrow_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							<tr>
								<td>Loose Straight Front Fit :</td>
								<td><input type="file" name="fit_loosefit_stright_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_loosefit_stright_front']) {?>
								<td><a href="pantcustomization.php?field=fit_loosefit_stright_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_stright_front'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_stright_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							<tr>
								<td>Loose Bellbottom Front Fit :</td>
								<td><input type="file" name="fit_loosefit_bellbottom_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_loosefit_bellbottom_front']) {?>
								<td><a href="pantcustomization.php?field=fit_loosefit_bellbottom_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_bellbottom_front'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_bellbottom_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							<tr>
								<td>Loose Narrow Back Fit :</td>
								<td><input type="file" name="fit_loosefit_narrow_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_loosefit_narrow_back']) {?>
								<td><a href="pantcustomization.php?field=fit_loosefit_narrow_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_narrow_back'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_narrow_back'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							<tr>
								<td>Loose Straight Back Fit :</td>
								<td><input type="file" name="fit_loosefit_stright_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_loosefit_stright_back']) {?>
								<td><a href="pantcustomization.php?field=fit_loosefit_stright_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_stright_back'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_stright_back'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							<tr>
								<td>Loose Bellbottom Back Fit :</td>
								<td><input type="file" name="fit_loosefit_bellbottom_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fit_loosefit_bellbottom_back']) {?>
								<td><a href="pantcustomization.php?field=fit_loosefit_bellbottom_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_bellbottom_back'];?>" title="Normal Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fit_loosefit_bellbottom_back'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
								
							</tr>
							
							
							
							
<!-------------------------- fit end ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Waist With Pocket </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- style start ---------------------------------------------------------->						
							<tr>
								<td>Waist High Cross Pocket Front :</td>
								<td><input type="file" name="waist_high_cross_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_cross_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_high_cross_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_cross_pocket_front'];?>" title="Narrow Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_cross_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist High Straight Pocket Front :</td>
								<td><input type="file" name="waist_high_stright_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_stright_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_high_stright_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_stright_pocket_front'];?>" title="Straight Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_stright_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist High Round Pocket Front :</td>
								<td><input type="file" name="waist_high_round_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_round_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_high_round_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_round_pocket_front'];?>" title="Bell Bottom Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_round_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist High L-shape Pocket Front :</td>
								<td><input type="file" name="waist_high_lshape_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_lshape_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_high_lshape_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_lshape_pocket_front'];?>" title="Bell Bottom Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_lshape_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist High No Pocket Front :</td>
								<td><input type="file" name="waist_high_no_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_no_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_high_no_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_no_pocket_front'];?>" title="Bell Bottom Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_no_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>



							<tr>
								<td>Waist Normal Cross Pocket Front :</td>
								<td><input type="file" name="waist_medium_cross_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_cross_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_cross_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_cross_pocket_front'];?>" title="Narrow Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_cross_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist Normal Straight Pocket Front :</td>
								<td><input type="file" name="waist_medium_stright_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_stright_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_stright_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_stright_pocket_front'];?>" title="Straight Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_stright_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist Normal Round Pocket Front :</td>
								<td><input type="file" name="waist_medium_round_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_round_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_round_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_round_pocket_front'];?>" title="Bell Bottom Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_round_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Normal L-shape Pocket Front :</td>
								<td><input type="file" name="waist_medium_lshape_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_lshape_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_lshape_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_lshape_pocket_front'];?>" title="Bell Bottom Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_lshape_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Normal No Pocket Front :</td>
								<td><input type="file" name="waist_medium_no_pocket_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_no_pocket_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_no_pocket_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_no_pocket_pocket_front'];?>" title="Bell Bottom Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_no_pocket_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							


							<tr>
								<td>Waist Low Cross Pocket Front :</td>
								<td><input type="file" name="waist_low_cross_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_cross_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_low_cross_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_cross_pocket_front'];?>" title="Narrow Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_cross_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist Low Straight Pocket Front :</td>
								<td><input type="file" name="waist_low_stright_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_stright_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_low_stright_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_stright_pocket_front'];?>" title="Straight Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_stright_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist Low Round Pocket Front :</td>
								<td><input type="file" name="waist_low_round_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_round_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_low_round_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_round_pocket_front'];?>" title="Bell Bottom Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_round_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Low L-shape Pocket Front :</td>
								<td><input type="file" name="style_bellbottom_fit" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['style_bellbottom_fit']) {?>
								<td><a href="pantcustomization.php?field=style_bellbottom_fit&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['style_bellbottom_fit'];?>" title="Bell Bottom Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['style_bellbottom_fit'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Low No Pocket Front :</td>
								<td><input type="file" name="waist_low_lshape_pocket_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_lshape_pocket_front']) {?>
								<td><a href="pantcustomization.php?field=waist_low_lshape_pocket_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_lshape_pocket_front'];?>" title="Bell Bottom Fit">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_lshape_pocket_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
																					
							
					</table>
<!-------------------------- style end ---------------------------------------------------------->						

					</td>
				</tr>
				
				
				<tr> 
					<td><strong>Pleats </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- pleats start ---------------------------------------------------------->						

							<tr>
								<td>Single Pleats :</td>
								<td><input type="file" name="pleats_single" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pleats_single']) {?>
								<td><a href="pantcustomization.php?field=pleats_single&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_single'];?>" title="Single Pleats">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_single'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Double Pleats :</td>
								<td><input type="file" name="pleats_double" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pleats_double']) {?>
								<td><a href="pantcustomization.php?field=pleats_double&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_double'];?>" title="Double Pleats">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_double'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Single Reserved Pleats :</td>
								<td><input type="file" name="pleats_single_reserved" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pleats_single_reserved']) {?>
								<td><a href="pantcustomization.php?field=pleats_single_reserved&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_single_reserved'];?>" title="Single Reserved Pleats">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_single_reserved'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Double Reserved Pleats :</td>
								<td><input type="file" name="pleats_double_reserved" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pleats_double_reserved']) {?>
								<td><a href="pantcustomization.php?field=pleats_double_reserved&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_double_reserved'];?>" title="Double Reserved Pleats">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_double_reserved'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Box Pleats :</td>
								<td><input type="file" name="pleats_box" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pleats_box']) {?>
								<td><a href="pantcustomization.php?field=pleats_box&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_box'];?>" title="Box Pleats">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_box'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>With Out Box Pleats :</td>
								<td><input type="file" name="pleats_without_box" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['pleats_without_box']) {?>
								<td><a href="pantcustomization.php?field=pleats_without_box&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_without_box'];?>" title="Box Pleats">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['pleats_without_box'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- Pleats end ---------------------------------------------------------->						
						</table>
					</td>
				</tr>
				
				<tr> 
					<td><strong>Belt Style With Waist type Front</strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Belt Style start ---------------------------------------------------------->						

							<tr>
								<td>Waist High Cut belt buttoned Front:</td>
								<td><input type="file" name="waist_high_belt_cut_buttoned_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_belt_cut_buttoned_front']) {?>
								<td><a href="pantcustomization.php?field=waist_high_belt_cut_buttoned_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_cut_buttoned_front'];?>" title="Cut belt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_cut_buttoned_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist High Cut belt Hook Front:</td>
								<td><input type="file" name="waist_high_belt_cut_hock_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_belt_cut_hock_front']) {?>
								<td><a href="pantcustomization.php?field=waist_high_belt_cut_hock_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_cut_hock_front'];?>" title="Cut belt Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_cut_hock_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist High Long belt buttoned Front:</td>
								<td><input type="file" name="waist_high_belt_long_buttoned_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_belt_long_buttoned_front']) {?>
								<td><a href="pantcustomization.php?field=waist_high_belt_long_buttoned_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_long_buttoned_front'];?>" title="Long belt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_long_buttoned_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist High Long belt Hook Front:</td>
								<td><input type="file" name="waist_high_belt_long_hook_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_belt_long_hook_front']) {?>
								<td><a href="pantcustomization.php?field=waist_high_belt_long_hook_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_long_hook_front'];?>" title="Long belt Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_long_hook_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist High Long belt hook buttoned Front:</td>
								<td><input type="file" name="waist_high_belt_long_hook_buttoned_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_belt_long_hook_buttoned_front']) {?>
								<td><a href="pantcustomization.php?field=waist_high_belt_long_hook_buttoned_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_long_hook_buttoned_front'];?>" title="Long belt hook buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_long_hook_buttoned_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist Medium Cut belt buttoned Front:</td>
								<td><input type="file" name="waist_medium_belt_cut_buttoned_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_belt_cut_buttoned_front']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_belt_cut_buttoned_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_cut_buttoned_front'];?>" title="Cut belt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_cut_buttoned_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Medium Cut belt Hook Front:</td>
								<td><input type="file" name="waist_medium_belt_cut_hock_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_belt_cut_hock_front']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_belt_cut_hock_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_cut_hock_front'];?>" title="Cut belt Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_cut_hock_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Medium Long belt buttoned Front:</td>
								<td><input type="file" name="waist_medium_belt_long_buttoned_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_belt_long_buttoned_front']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_belt_long_buttoned_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_long_buttoned_front'];?>" title="Long belt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_long_buttoned_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Medium Long belt Hook Front:</td>
								<td><input type="file" name="waist_medium_belt_long_hook_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_belt_long_hook_front']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_belt_long_hook_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_long_hook_front'];?>" title="Long belt Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_long_hook_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Medium Long belt hook buttoned Front:</td>
								<td><input type="file" name="waist_medium_belt_long_hook_buttoned_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_belt_long_hook_buttoned_front']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_belt_long_hook_buttoned_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_long_hook_buttoned_front'];?>" title="Long belt hook buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_long_hook_buttoned_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist Low Cut belt buttoned Front:</td>
								<td><input type="file" name="waist_low_belt_cut_buttoned_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_belt_cut_buttoned_front']) {?>
								<td><a href="pantcustomization.php?field=waist_low_belt_cut_buttoned_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_cut_buttoned_front'];?>" title="Cut belt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_cut_buttoned_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Low Cut belt Hook Front:</td>
								<td><input type="file" name="waist_low_belt_cut_hock_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_belt_cut_hock_front']) {?>
								<td><a href="pantcustomization.php?field=waist_low_belt_cut_hock_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_cut_hock_front'];?>" title="Cut belt Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_cut_hock_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Low Long belt buttoned Front:</td>
								<td><input type="file" name="waist_low_belt_long_buttoned_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_belt_long_buttoned_front']) {?>
								<td><a href="pantcustomization.php?field=waist_low_belt_long_buttoned_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_long_buttoned_front'];?>" title="Long belt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_long_buttoned_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Low Long belt Hook Front:</td>
								<td><input type="file" name="waist_low_belt_long_hook_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_belt_long_hook_front']) {?>
								<td><a href="pantcustomization.php?field=waist_low_belt_long_hook_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_long_hook_front'];?>" title="Long belt Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_long_hook_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Low Long belt hook buttoned Front:</td>
								<td><input type="file" name="waist_low_belt_long_hook_buttoned_front" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_belt_long_hook_buttoned_front']) {?>
								<td><a href="pantcustomization.php?field=waist_low_belt_long_hook_buttoned_front&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_long_hook_buttoned_front'];?>" title="Long belt hook buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_long_hook_buttoned_front'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- Belt Style end---------------------------------------------------------->						

						</table>
					</td>
				</tr>
				
<tr> 
					<td><strong>Fly </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Fly start ---------------------------------------------------------->						

							<tr>
								<td>Buttoned Fly :</td>
								<td><input type="file" name="fly_buttoned" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fly_buttoned']) {?>
								<td><a href="pantcustomization.php?field=fly_buttoned&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fly_buttoned'];?>" title="Buttoned Fly">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fly_buttoned'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Zipper Fly :</td>
								<td><input type="file" name="fly_zipper" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['fly_zipper']) {?>
								<td><a href="pantcustomization.php?field=fly_zipper&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fly_zipper'];?>" title="Zipper Fly">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['fly_zipper'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- Fly end---------------------------------------------------------->						

						</table>
					</td>
				</tr>						
				
				<tr> 
					<td><strong>Back Pocket Style With Waist </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Back Pocket Style start ---------------------------------------------------------->						

							<tr>
								<td>Waist high for back left Single Welt With Hook  :</td>
								<td><input type="file" name="waist_high_back_pocket_left_singlewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_left_singlewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_left_singlewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_left_singlewelthook'];?>" title="Single Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_left_singlewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist high for back left Double Welt With Hook :</td>
								<td><input type="file" name="waist_high_back_pocket_left_doublewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_left_doublewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_left_doublewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_left_doublewelthook'];?>" title="Double Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_left_doublewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist high for back left Single Welt buttoned :</td>
								<td><input type="file" name="waist_high_back_pocket_left_singleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_left_singleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_left_singleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_left_singleweltbutton'];?>" title="Single Welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_left_singleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist high for back left Double welt buttoned :</td>
								<td><input type="file" name="waist_high_back_pocket_left_doubleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_left_doubleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_left_doubleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_left_doubleweltbutton'];?>" title="Double welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_left_doubleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist high for back Right Single Welt With Hook  :</td>
								<td><input type="file" name="waist_high_back_pocket_right_singlewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_right_singlewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_right_singlewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_right_singlewelthook'];?>" title="Single Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_right_singlewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist high for back Right Double Welt With Hook :</td>
								<td><input type="file" name="waist_high_back_pocket_right_doublewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_right_doublewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_right_doublewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_right_doublewelthook'];?>" title="Double Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_right_doublewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist high for back Right Single Welt buttoned :</td>
								<td><input type="file" name="waist_high_back_pocket_right_singleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_right_singleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_right_singleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_right_singleweltbutton'];?>" title="Single Welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_right_singleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist high for back Right Double welt buttoned :</td>
								<td><input type="file" name="waist_high_back_pocket_right_doubleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_right_doubleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_right_doubleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_right_doubleweltbutton'];?>" title="Double welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_right_doubleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist high for back Both Single Welt With Hook  :</td>
								<td><input type="file" name="waist_high_back_pocket_both_singlewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_both_singlewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_both_singlewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_both_singlewelthook'];?>" title="Single Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_both_singlewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist high for back Both Double Welt With Hook :</td>
								<td><input type="file" name="waist_high_back_pocket_both_doublewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_both_doublewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_both_doublewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_both_doublewelthook'];?>" title="Double Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_both_doublewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist high for back Both Single Welt buttoned :</td>
								<td><input type="file" name="waist_high_back_pocket_both_singleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_both_singleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_both_singleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_both_singleweltbutton'];?>" title="Single Welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_both_singleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist high for back Both Double welt buttoned :</td>
								<td><input type="file" name="waist_high_back_pocket_both_doubleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_back_pocket_both_doubleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_high_back_pocket_both_doubleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_both_doubleweltbutton'];?>" title="Double welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_back_pocket_both_doubleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist Medium for back Left Single Welt With Hook  :</td>
								<td><input type="file" name="waist_medium_back_pocket_left_singlewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_left_singlewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_left_singlewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_left_singlewelthook'];?>" title="Single Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_left_singlewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Medium for back Left Double Welt With Hook :</td>
								<td><input type="file" name="waist_medium_back_pocket_left_doublewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_left_doublewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_left_doublewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_left_doublewelthook'];?>" title="Double Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_left_doublewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Medium for back Left Single Welt buttoned :</td>
								<td><input type="file" name="waist_medium_back_pocket_left_singleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_left_singleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_left_singleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_left_singleweltbutton'];?>" title="Single Welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_left_singleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Medium for back Left Double welt buttoned :</td>
								<td><input type="file" name="waist_medium_back_pocket_left_doubleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_left_doubleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_left_doubleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_left_doubleweltbutton'];?>" title="Double welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_left_doubleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist Medium for back Right Single Welt With Hook  :</td>
								<td><input type="file" name="waist_medium_back_pocket_right_singlewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_right_singlewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_right_singlewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_right_singlewelthook'];?>" title="Single Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_right_singlewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Medium for back Right Double Welt With Hook :</td>
								<td><input type="file" name="waist_medium_back_pocket_right_doublewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_right_doublewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_right_doublewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_right_doublewelthook'];?>" title="Double Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_right_doublewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Medium for back Right Single Welt buttoned :</td>
								<td><input type="file" name="waist_medium_back_pocket_right_singleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_right_singleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_right_singleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_right_singleweltbutton'];?>" title="Single Welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_right_singleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Medium for back Right Double welt buttoned :</td>
								<td><input type="file" name="waist_medium_back_pocket_right_doubleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_right_doubleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_right_doubleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_right_doubleweltbutton'];?>" title="Double welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_right_doubleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Medium for back Both Single Welt With Hook  :</td>
								<td><input type="file" name="waist_medium_back_pocket_both_singlewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_both_singlewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_both_singlewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_both_singlewelthook'];?>" title="Single Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_both_singlewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Medium for back Both Double Welt With Hook :</td>
								<td><input type="file" name="waist_medium_back_pocket_both_doublewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_both_doublewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_both_doublewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_both_doublewelthook'];?>" title="Double Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_both_doublewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Medium for back Both Single Welt buttoned :</td>
								<td><input type="file" name="waist_medium_back_pocket_both_singleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_both_singleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_both_singleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_both_singleweltbutton'];?>" title="Single Welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_both_singleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Medium for back Both Double welt buttoned :</td>
								<td><input type="file" name="waist_medium_back_pocket_both_doubleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_back_pocket_both_doubleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_back_pocket_both_doubleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_both_doubleweltbutton'];?>" title="Double welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_back_pocket_both_doubleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist Low for back left Single Welt With Hook  :</td>
								<td><input type="file" name="waist_low_back_pocket_left_singlewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_left_singlewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_left_singlewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_left_singlewelthook'];?>" title="Single Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_left_singlewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Low for back left Double Welt With Hook :</td>
								<td><input type="file" name="waist_low_back_pocket_left_doublewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_left_doublewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_left_doublewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_left_doublewelthook'];?>" title="Double Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_left_doublewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Low for back left Single Welt buttoned :</td>
								<td><input type="file" name="waist_low_back_pocket_left_singleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_left_singleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_left_singleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_left_singleweltbutton'];?>" title="Single Welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_left_singleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Low for back left Double welt buttoned :</td>
								<td><input type="file" name="waist_low_back_pocket_left_doubleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_left_doubleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_left_doubleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_left_doubleweltbutton'];?>" title="Double welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_left_doubleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							
							<tr>
								<td>Waist Low for back Right Single Welt With Hook  :</td>
								<td><input type="file" name="waist_low_back_pocket_right_singlewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_right_singlewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_right_singlewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_right_singlewelthook'];?>" title="Single Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_right_singlewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Low for back Right Double Welt With Hook :</td>
								<td><input type="file" name="waist_low_back_pocket_right_doublewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_right_doublewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_right_doublewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_right_doublewelthook'];?>" title="Double Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_right_doublewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Low for back Right Single Welt buttoned :</td>
								<td><input type="file" name="waist_low_back_pocket_right_singleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_right_singleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_right_singleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_right_singleweltbutton'];?>" title="Single Welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_right_singleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Low for back Right Double welt buttoned :</td>
								<td><input type="file" name="waist_low_back_pocket_right_doubleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_right_doubleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_right_doubleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_right_doubleweltbutton'];?>" title="Double welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_right_doubleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Low for back Both Single Welt With Hook  :</td>
								<td><input type="file" name="waist_low_back_pocket_both_singlewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_both_singlewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_both_singlewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_both_singlewelthook'];?>" title="Single Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_both_singlewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Low for back Both Double Welt With Hook :</td>
								<td><input type="file" name="waist_low_back_pocket_both_doublewelthook" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_both_doublewelthook']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_both_doublewelthook&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_both_doublewelthook'];?>" title="Double Welt With Hook">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_both_doublewelthook'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Low for back Both Single Welt buttoned :</td>
								<td><input type="file" name="waist_low_back_pocket_both_singleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_both_singleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_both_singleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_both_singleweltbutton'];?>" title="Single Welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_both_singleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Low for back Both Double welt buttoned :</td>
								<td><input type="file" name="waist_low_back_pocket_both_doubleweltbutton" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_back_pocket_both_doubleweltbutton']) {?>
								<td><a href="pantcustomization.php?field=waist_low_back_pocket_both_doubleweltbutton&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_both_doubleweltbutton'];?>" title="Double welt buttoned">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_back_pocket_both_doubleweltbutton'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- Back Pocket Style end---------------------------------------------------------->						

						</table>
					</td>
				</tr>
				
				
				<tr> 
					<td><strong>Fly </strong></td>
				</tr>
				<tr><td>	
 						<table>
<!-------------------------- Back Belt start ---------------------------------------------------------->						

							<tr>
								<td>Waist High Back Belt :</td>
								<td><input type="file" name="waist_high_belt_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_high_belt_back']) {?>
								<td><a href="pantcustomization.php?field=waist_high_belt_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_back'];?>" title="Buttoned Fly">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_high_belt_back'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Waist Medium Back Belt :</td>
								<td><input type="file" name="waist_medium_belt_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_medium_belt_back']) {?>
								<td><a href="pantcustomization.php?field=waist_medium_belt_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_back'];?>" title="Zipper Fly">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_medium_belt_back'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
							<tr>
								<td>Waist Low Back Belt :</td>
								<td><input type="file" name="waist_low_belt_back" value="" /></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </td>
								<?php if($result[0]['waist_low_belt_back']) {?>
								<td><a href="pantcustomization.php?field=waist_low_belt_back&productid=<?php echo $_REQUEST['productid'];?>&del=<?php echo $result[0]['pantcustomizationid'] ?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
								<td>
								<a rel="example_group" href="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_back'];?>" title="Zipper Fly">
									<img src="upload/Pant/<?php echo $productname;?>/<?php echo $result[0]['waist_low_belt_back'];?>" height="70px;" alt="" /></a>
								</td>
								<?php } ?>
							</tr>
							
<!-------------------------- Fly end---------------------------------------------------------->						

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
