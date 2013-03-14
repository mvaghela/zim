<?php include("system/config.inc.php");
$productsql = "select * from `product` where productid = ".$_GET['id']."";
$productresult=$obj_db->select($productsql);
 ?>

<div class="Products-title">
	<h1><?php echo $productresult[0]['productname']?></h1>
</div>
<div class="Products-price">
	<h2><span class="WebRupee">$ </span> <?php echo $productresult[0]['price']?></h2>
</div>
<div class="Products-image" id="">
	<?php $sql = "select * from `pantcustomization` where productid = ".$_GET['id']."";
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
		<!--//-----------------------------------------------main paint image n inside---------------------------------------------//--> 
		<img id="2" src="images/pants/Slim-Fit/Slim-Fit/main-front-imag-no-cuff.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 8;"> <img id="0" src="images/pants/Slim-Fit/inside/inside.png" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 0;"> 
		
		<!----------------front pocket -----------------> 
		<img id="0" src="images/pants/Slim-Fit/Front pocket/Round pocket.png" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
		
		<!--//-----------------------------------------------back pocket---------------------------------------------//--> 
		<img id="1" src="images/pants/641s_656.png" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
		<!--//-----------------------------------------------Belt loops---------------------------------------------//--> 
		<img id="3" src="images/pants/Slim-Fit/Belt Style/Cut belt-buttoned.png" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 10;"> 
		
		<!--//-----------------------------------------------pleats---------------------------------------------//--> 
		<img id="3" src="images/pants/Slim-Fit/Pleats/Single Reversed Pleat.png" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 10;"> </div>
</div>
<div class="button-div">
	<table align="center">
		<tr>
			<td><div> 
					<!--<div class="add-to-bag"><a href="#">ADD TO BAG</a></div>-->
					<div class="add-to-bag"><a href="confirmmsgpant.php?id=<?php echo $_SESSION['product'];?>&acn=usedcustomizepant" id="confirm" class="btn confirm">3D CUSTOMIZE</a></div>
					<!--<div class="customize"><a href="confirmmsg.php?acn=usedcustomize" id="confirm" class="confirm">CUSTOMIZE</a></div>--> 
				</div></td>
		</tr>
	</table>
</div>
<div class="Products-description"> <?php echo $productresult[0]['discription']?> 
	<!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>--> 
</div>
<div class="inner-social-div"> 
	<div class="addthis_toolbox addthis_default_style ">
		<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
		<a class="addthis_button_tweet"></a>
		<a class="addthis_button_pinterest_pinit"></a>
		<a class="addthis_counter addthis_pill_style"></a>
	</div>
	<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5130a9a70952c052"></script>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".confirm").fancybox();
		$(".lastname").html("<?php echo $productresult[0]['productname']?>"); 

	});
</script> 
