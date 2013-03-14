<?php include("system/config.inc.php");
$productsql = "select * from `product` where productid = ".$_GET['id']."";
$productresult=$obj_db->select($productsql);
 ?>

<div class="Products-title">
	<h1><?php echo $productresult[0]['productname']?></h1>
</div>
<div class="Products-price">
	<h2><span class="WebRupee">Rs</span> <?php echo $productresult[0]['price']?></h2>
</div>
<div class="Products-image" id="">
	<?php $sql = "select * from `suitcustomization` where productid = ".$_GET['id']."";
$result=$obj_db->select($sql);
//echo ($_REQUEST['productid']);
$_SESSION['product'] = $_GET['id'];			
		
$_SESSION['fitimage'] = $result[0]['fit_slimfit'];

$_SESSION['styleimage'] = $result[0]['style_full_fit_slimfit_sleeve'];

$_SESSION['collarimage'] = $result[0]['collar_straight'];
			
$_SESSION['cuffimage'] = $result[0]['cuff_singlebuttonmiter'];

$_SESSION['pocketimage'] = $result[0]['pocket_miter'];

$_SESSION['frontimageplacket'] = $result[0]['front_placket'];

$_SESSION['backimage'] = $result[0]['back_sidepleats'];

$_SESSION['fittype'] = 'fit_slimfit';
$_SESSION['styletype'] = 'style_full_fit_slimfit_sleeve';
$_SESSION['collartype'] = 'collar_straight';
$_SESSION['cufftype'] = 'cuff_singlebuttonmiter';
$_SESSION['pockettype'] = 'pocket_miter';
$_SESSION['fronttype'] = 'front_placket';
$_SESSION['backtype'] = 'back_sidepleats';

 ?>
	<div id="fabric_design_details_middle_picture_view1" class=""> 
		<!--//-----------------------------------------------inside inner image---------------------------------------------//--> 
		<img id="0" src="images/suit/merged.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 11;"> 
		
		<!--//-----------------------------------------------blank image---------------------------------------------//--> 
		<img id="0" src="images/suit/667_678_664_transp.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 28;"> 
		
		<!--//-----------------------------------------------inside inner button image---------------------------------------------//--> 
		<img id="0" src="images/suit/872_beige.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 13;"> 
		
		<!--//-----------------------------------------------full sleeve image---------------------------------------------//--> 
		<img id="0" src="images/suit/656_712.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 13;"> 
		
		<!--//-----------------------------------------------outside coat image---------------------------------------------//--> 
		<img id="0" src="images/suit/656_667.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 14;"> 
		
		<!--//-----------------------------------------------outside buttonhole image---------------------------------------------//--> 
		<img id="0" src="images/suit/667_663_766_transp.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 36;"> 
		
		<!--//-----------------------------------------------suit type lapel image---------------------------------------------//--> 
		<img id="0" src="images/suit/656_667_663_b.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 30;"> 
		
		<!--//-----------------------------------------------bottom part of suit image---------------------------------------------//--> 
		<img id="0" src="images/suit/667_664.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 14;"> 
		
		<!--//-----------------------------------------------front pocket image---------------------------------------------//--> 
		<img id="0" src="images/suit/656_678.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 20;"> 
		
		<!--//-----------------------------------------------front upper collar image---------------------------------------------//--> 
		<img id="0" src="images/suit/656_667_663_t.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 25;"> 
		
		<!--//-----------------------------------------------front middle button of suit image---------------------------------------------//--> 
		<img id="0" src="images/suit/667_beige.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 37;"> 
		
		<!--//-----------------------------------------------front inner coat image---------------------------------------------//--> 
		<img id="0" src="images/suit/871_872.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 12;"> </div>
</div>
<div class="button-div">
	<table align="center">
		<tr>
			<td><div> 
					<!--<div class="add-to-bag"><a href="#">ADD TO BAG</a></div>-->
					<div class="add-to-bag"><a href="confirmmsgsuit.php?id=<?php echo $_SESSION['product'];?>&acn=usedcustomizesuit" id="confirm" class="btn confirm">3D CUSTOMIZE</a></div>
					<!--<div class="customize"><a href="confirmmsg.php?acn=usedcustomize" id="confirm" class="confirm">CUSTOMIZE</a></div>--> 
				</div></td>
		</tr>
	</table>
</div>
<div class="Products-description"> <?php echo $productresult[0]['discription']?> 
	<!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>--> 
</div>
<div class="inner-social-div"> 
	<span class='st_facebook_hcount' displayText='Facebook'></span> 
	<span class='st_twitter_hcount' displayText='Tweet'></span> 
	<span class='st_pinterest_hcount' displayText='Pinterest'></span> 
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".confirm").fancybox();
	});
</script> 
