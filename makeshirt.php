<?php include("system/config.inc.php"); 

$sql = "select * from `shirtcustomization` where productid = ".$_SESSION['productid']."";
$result=$obj_db->select($sql);

$productsql = "select * from `product` where productid = ".$_SESSION['productid']."";
$productresult=$obj_db->select($productsql);
//echo ($_REQUEST['productid']);					
switch($_GET['id'])
	{
		case 'fit':
			$fittype= explode('-',$_GET['image']);
			$_SESSION['fittype'] = $fittype[0];
			$_SESSION['fitimage'] = $fittype[1];
			break;
		case 'style':
 			 $_SESSION['sleevetypeshirt'] = $_GET['image'];
			 $sleevetype= explode('-',$_GET['image']);
			 $sleevetype = $_GET['image'];
			 $left = "style_".$_GET['image']."_".$_SESSION['fittype']."_"."sleeve";
			 $_SESSION['styletype'] = $left;
			 $_SESSION['styleimage'] = $result[0][$left];
			break;
		case 'collar':
			$collartype= explode('-',$_GET['image']);
			$_SESSION['collartype'] = $collartype[0];
			$_SESSION['collarimage'] = $collartype[1];
			break;
		case 'cuff':
			$cufftype= explode('-',$_GET['image']);
			$_SESSION['cufftype'] = $cufftype[0];

			$_SESSION['cuffimage'] = $cufftype[1];
			break;
		case 'pocket':
			$pockettype= explode('-',$_GET['image']);
			$_SESSION['pockettype'] = $pockettype[0];

			$_SESSION['pocketimage'] = $pockettype[1];
			break;
		case 'front':
			$fronttype= explode('-',$_GET['image']);
			$_SESSION['fronttype'] = $fronttype[0];

			$_SESSION['frontimageplacket'] = $fronttype[1];
			break;
		case 'back':
			$backtype= explode('-',$_GET['image']);
			$_SESSION['backtype'] = $backtype[0];

			$_SESSION['backimage'] = $backtype[1];
			break;	
	}
if($sleevetype=='half'){
	unset($_SESSION['cuffimage']);
}
if($sleevetype=='full'){
		$_SESSION['cuffimage'] = $result[0]['cuff_singlebuttonmiter'];
}
 ?>
 
<div class="Products-title">
	<h1><?php echo $productresult[0]['productname']?></h1>
</div>
<div class="Products-price">
	<h2><span class="WebRupee">$ </span> <?php echo $productresult[0]['price']?></h2>
</div>

<div class="Products-image" id=""> 


<div id="fabric_design_details_middle_picture_view1" class="">
<!----------------fit ----------------->
<img id="0" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['fitimage']; ?>" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 0;">

<!----------------Style---------------->
<img id="2" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['styleimage']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 2;">

<!----------------pocket---------------->
<img id="3" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pocketimage']; ?>" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 3;">


<!----------------Blank---------------->
<img id="20" src="images/shirts/rounded_files/shirtimage/blank.gif" name="undefined" title="undefined" style="position: absolute; display: block; z-index: 20;">
<img id="19" src="images/shirts/rounded_files/shirtimage/blank.gif" name="undefined" title="undefined" style="position: absolute; display: block; z-index: 19;">
<img id="18" src="images/shirts/rounded_files/shirtimage/blank.gif" name="sewn in" title="sewn in" style="position: absolute; display: block; z-index: 18;">
<img id="4" src="images/shirts/rounded_files/shirtimage/blank.gif" name="noloops" title="noloops" style="position: absolute; display: block; z-index: 4;">

<!----------------Cuff---------------->
<img id="5" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['cuffimage']; ?>" name="1buttonangle" title="Peace Maker" style="position: absolute; display: block; z-index: 5;">


<!----------------front placket---------------->
<img id="11" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['frontimageplacket']; ?>" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 11;">

<!----------------collar---------------->
<img id="14" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['collarimage']; ?>" name="classic" title="Peace Maker" style="position: absolute; display: block; z-index: 14;">
</div>
</div>


<div class="button-div">
	<table align="center">				
		<tr>
			<td>				
				<div class="add-to-bag"><a href="shirt.php" class="btn" >« Prev</a></div>
				<!--<div class="customize"><a href="confirmmsg.php" id="confirm" class="confirm">Finish</a></div>-->
			</td>
			
			<td>				
				<div class="add-to-bag"><a href="contrastcustomize.php?productid=<?php echo $_SESSION['productid'];?>" class="btn">Next »</a></div>
				<!--<div class="customize"><a href="confirmmsg.php" id="confirm" class="confirm">Finish</a></div>-->
			</td>

		</tr>		
	</table>
</div>
			
<div class="Products-description">
	<?php echo $productresult[0]['discription']?>
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
		//$(".lastname").html("<?//php echo $productresult[0]['productname']?>");
	});
</script>