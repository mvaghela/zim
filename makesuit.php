<?php include("system/config.inc.php"); 

$sql = "select * from `suitcustomization` where productid = ".$_SESSION['productid']."";
$result=$obj_db->select($sql);

$productsql = "select * from `product` where productid = ".$_SESSION['productid']."";
$productresult=$obj_db->select($productsql);
//echo ($_REQUEST['productid']);					
switch($_GET['id'])
	{
		case 'suittype':
			$piecetype= explode('-',$_GET['image']);
			$_SESSION['piecetype'] = $piecetype[0];
			$_SESSION['pieceimage'] = $piecetype[1];
			break;
		case 'lapel':
			 $suittype= explode('-',$_GET['image']);
			 $_SESSION['suittype'] = $suittype[0];
			 $_SESSION['suittypeimage'] = $suittype[1];
			break;
		case 'vents':
			$suitventstype= explode('-',$_GET['image']);
			$_SESSION['suitventstype'] = $suitventstype[0];
			$_SESSION['suitventsimage'] = $suitventstype[1];
			break;
		case 'button':
			$suitbuttontype= explode('-',$_GET['image']);
			$_SESSION['suitbuttontype'] = $suitbuttontype[0];
			$_SESSION['suitbuttonimage'] = $suitbuttontype[1];
			break;
		case 'frontpocket':
			$suitfrontpockettype= explode('-',$_GET['image']);
			$_SESSION['suitfrontpockettype'] = $suitfrontpockettype[0];
			$_SESSION['suitfrontpocketimage'] = $suitfrontpockettype[1];
			break;
		case 'breast':
			$suitbreasttype= explode('-',$_GET['image']);
			$_SESSION['suitbreaststype'] = $suitbreasttype[0];
			$_SESSION['suitbreastimage'] = $suitbreasttype[1];
			break;
		case 'ticket':
			$suittickettype= explode('-',$_GET['image']);
			$_SESSION['suittickettype'] = $suittickettype[0];
			$_SESSION['suittiecketimage'] = $suittickettype[1];
			break;	
		case 'sleevebuttons':
			$suitsleevebuttonstype= explode('-',$_GET['image']);
			$_SESSION['suitsleevebuttontype'] = $suitsleevebuttonstype[0];
			$_SESSION['suitsleevebuttonimage'] = $suitsleevebuttonstype[1];
			break;
		case 'buttonhole':
			$suitbuttonholetype= explode('-',$_GET['image']);
			$_SESSION['suitbuttonholetype'] = $suitbuttonholetype[0];
			$_SESSION['suitbuttonholeimage'] = $suitbuttonholetype[1];
			break;	
		case 'interlinig':
			$suitinterlinigtype= explode('-',$_GET['image']);
			$_SESSION['suitinnerliningtype'] = $suitinterlinigtype[0];
			$_SESSION['suitinnerliningimage'] = $suitinterlinigtype[1];
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

<?php } else if($_GET['class']=='front customizeoption') { ?>
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
<?php } else { ?>
<div id="fabric_design_details_middle_picture_view1" class=""> 
	<!-----------------------------------------------------------front part------------------------------------------------->
	
	<!-----------------------------------------------------------static part------------------------------------------------->
	<!--//-----------------------------------------------inside inner image---------------------------------------------//--> 
	<img id="0" src="images/suit/merged.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 11;">
	
	<!--//-----------------------------------------------Shadow image image---------------------------------------------//--> 
	<img id="0" src="images/suit/667_678_664_transp.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 28;">

	<!--//-----------------------------------------------full sleeve image---------------------------------------------//--> 
	<img id="0" src="images/suit/656_712.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 13;">

	<!--//-----------------------------------------------outside coat image---------------------------------------------//--> 
	<img id="0" src="images/suit/656_667.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 14;">

	<!--//-----------------------------------------------bottom part of suit image---------------------------------------------//--> 
	<img id="0" src="images/suit/667_664.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 14;">
	
	<!--//-----------------------------------------------front upper collar image---------------------------------------------//--> 
	<img id="0" src="images/suit/656_667_663_t.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 25;">

	<!--//-----------------------------------------------front shirt middle button of suit image-------------------------------------------//--> 
	<img id="0" src="images/suit/872_beige.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 13;">


	<!-----------------------------------------------------------dynmic part------------------------------------------------->
	<!--//-----------------------------------------------inside inner button image---------------------------------------------//--> 
	<img id="0" src="admin/upload/suit/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['suitbuttonimage']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 37;">
	

	<!--//-----------------------------------------------outside buttonhole image---------------------------------------------//--> 
	<img id="0" src="admin/upload/suit/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['suitbuttonholeimage']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 36;">


	<!--//-----------------------------------------------suit type lapel image---------------------------------------------//--> 
	<img id="0" src="admin/upload/suit/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['suittypeimage']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 30;">
	

	<!--//-----------------------------------------------front pocket image---------------------------------------------//--> 
	<img id="0" src="admin/upload/suit/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['suitfrontpocketimage']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 20;">
	

	<!--//-----------------------------------------------front inner coat for 3 piece image---------------------------------------------//--> 
	<img id="0" src="admin/upload/suit/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pieceimage']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 12;">

</div>
<?php } ?>
</div>


<div class="button-div">				
				<div class="add-to-bag"><a href="suit.php">Previous</a></div>
				<?php if($_SESSION['pieceimage']) { ?>
				<div class="customize"><a href="vestssuitcustomize.php?productid=<?php echo $_SESSION['productid'];?>">Next</a></div>
				<?php } else {?>
				<div class="customize"><a href="confirmmsgsuit.php?acn=addtobag" id="confirm" class="btn confirm">Next</a></div>
				<?php } ?>
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