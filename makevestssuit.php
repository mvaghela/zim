<?php include("system/config.inc.php"); 

$sql = "select * from `suitcustomization` where productid = ".$_SESSION['productid']."";
$result=$obj_db->select($sql);

$productsql = "select * from `product` where productid = ".$_SESSION['productid']."";
$productresult=$obj_db->select($productsql);
//echo ($_REQUEST['productid']);					
switch($_GET['id'])
	{
		case 'suitveststype':
			$suitveststype= explode('-',$_GET['image']);
			$_SESSION['suitveststype'] = $suitveststype[0];
			$_SESSION['suitvestsbuttonimage'] = $suitveststype[1];
			break;
		case 'suitvestsback':
			 $suitvestsback= explode('-',$_GET['image']);
			 $_SESSION['suitvestsbacktype'] = $suitvestsback[0];
			 $_SESSION['suitvestsbackimage'] = $suitvestsback[1];
			break;
		case 'suitvestspocket':
			$suitvestspocket= explode('-',$_GET['image']);
			$_SESSION['suitvestspockettype'] = $suitvestspocket[0];
			$_SESSION['suitvestspocketimage'] = $suitvestspocket[1];
			break;
		case 'suitvestsbreast':
			$suitvestsbreast= explode('-',$_GET['image']);
			$_SESSION['suitvestsbreasttype'] = $suitvestsbreast[0];
			$_SESSION['suitvestsbreatimage'] = $suitvestsbreast[1];
			break;
	}
 ?>
 
<div class="Products-title">
	<h1><?php echo $productresult[0]['productname']?></h1>
</div>
<div class="Products-price">
	<h2><span class="WebRupee">Rs</span> <?php echo $productresult[0]['price']?></h2>
</div>

<div class="Products-image" id=""> 
<?php if($_GET['class']=='inner customizeoption') { ?>
<div id="fabric_design_details_middle_picture_view1" class=""> 
	<!-----------------------------------------------------------back part------------------------------------------------->
	<!--//-----------------------------------------------inner main merged image for back---------------------------------------------//--> 
	<img id="1" src="images/suit/back/mix.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 11;"> 
	<img id="2" src="admin/upload/suit/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['suitventsimage']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 14;"> 

</div>

<?php } else { ?>
<div id="fabric_design_details_middle_picture_view1" class=""> 
	<!-----------------------------------------------------------inner part------------------------------------------------->
	<!--//-----------------------------------------------inside inner pocket image---------------------------------------------//--> 
	<img id="0" src="images/suit/lining_705_b.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 34;">

	<!--//-----------------------------------------------inside inner image---------------------------------------------//--> 
	<img id="0" src="images/suit/merged.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 11;">

	
	<!--//-----------------------------------------------inside inner button image---------------------------------------------//--> 
	<img id="0" src="images/suit/872_beige.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 13;">


	<!--//-----------------------------------------------jacket_shoulders image---------------------------------------------//--> 
	<img id="0" src="images/suit/jacket_shoulders.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 2;">
	
	
	<!--//-----------------------------------------------open arms image---------------------------------------------//--> 
	<img id="0" src="images/suit/656_b_openarms.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 30;">
	
	<!--//-----------------------------------------------lining_705_a image---------------------------------------------//--> 
	<img id="0" src="images/suit/lining_705_a.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 0;">
	
	
	<!--//-----------------------------------------------656_t_openarms image---------------------------------------------//--> 
	<img id="0" src="images/suit/656_t_openarms.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 25;">
	
	<!--//-----------------------------------------------656_t_openarms image---------------------------------------------//--> 
	<img id="0" src="images/suit/656_t_openarms.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 25;">
	
	<!--//-----------------------------------------------front inner coat image---------------------------------------------//--> 
	<img id="0" src="images/suit/871_872.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 12;">
	
</div>
<?php } ?>
</div>


<div class="button-div">
	<table align="center">
		<tr>
			<td>				
				<div class="add-to-bag"><a href="confirmmsgsuit.php?acn=addtobag" id="confirm" class="btn confirm">ADD TO BAG</a></div>				
			</td>
		</tr>		
	</table>
</div>
			
<div class="Products-description">
	<?php echo $productresult[0]['discription']?>
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