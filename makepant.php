<?php include("system/config.inc.php"); 

$sql = "select * from `pantcustomization` where productid = ".$_SESSION['productid']."";
$result=$obj_db->select($sql);

$productsql = "select * from `product` where productid = ".$_SESSION['productid']."";
$productresult=$obj_db->select($productsql);
//echo ($_REQUEST['productid']);					
switch($_GET['id'])
	{
		case 'fit':
			$fittype= explode('-',$_GET['image']);
			$_SESSION['pantfittype'] = $fittype[0];
			$_SESSION['pantfitimage'] = $fittype[1];
			$_SESSION['pantfittype']; 
			
			$backfit = $fittype[0]."_narrow_back";
			$_SESSION['pantbackfittype']=$fittype[0]."_narrow_back";
			$_SESSION['pantbackstyleimage']=$result[0][$backfit];
			//$fittypedata= explode('_',$_GET['image']);
			//$_SESSION['fittypedatanew'] = $fittypedata[0]."_".$fittypedata[1];
			break;
		case 'style':
			 $styletype=$_GET['image'];
			 $_SESSION['pantstyletypedata'] = $_GET['image'];
			 $left = $_SESSION['pantfittype']."_".$_GET['image']."_front";
			 //echo $left; //die();
			 $_SESSION['pantstyletype'] = $left; 
			 $_SESSION['pantfitimage'] = $result[0][$left]; //die();
			 
			 $backfit = $_SESSION['pantfittype']."_".$_GET['image']."_back";
			 $_SESSION['pantbackfittype'] = $_SESSION['pantfittype']."_".$_GET['image']."_back";
			 $_SESSION['pantbackstyleimage'] = $result[0][$backfit];
			break;
			
			
		case 'waist':
			$pantwaisttype= explode('-',$_GET['image']);
			$_SESSION['pantwaisttype'] = $pantwaisttype[0];
			$_SESSION['pantfrontpocketimage'] = $pantwaisttype[1];
			$_SESSION['pantfrontpocketimage'];
			
			$_SESSION['pantbackpockettype'] = $_SESSION['pantwaisttype']."_".$_SESSION['pantbackpocketdata']."_".$_SESSION['pantbackpocketstyledata'];
			$_SESSION['pantbackpocketimage'] = $_SESSION['pantwaisttype']."_".$_SESSION['pantbackpocketdata']."_".$_SESSION['pantbackpocketstyledata'];
			
			$_SESSION['pantbackbelttype'] = $_SESSION['pantwaisttype']."_belt_back";
			$_SESSION['pantbackbeltimage'] = $_SESSION['pantwaisttype']."_belt_back";
			
			break;
		case 'frontpocket':
			 $frontpocket=$_GET['image'];
			 $frontpocketdata = $_SESSION['pantwaisttype']."_".$_GET['image'];
			 //echo $frontpocketdata; //die();

			
			$_SESSION['pantfrontpockettype'] = $frontpocketdata;
			$_SESSION['pantfrontpocketimage'] = $result[0][$frontpocketdata];
			$_SESSION['pantfrontpocketimage']; //die();
			break;
		case 'pleats':
			$pantpleatstype= explode('-',$_GET['image']);
			$_SESSION['pantpleatstype'] = $pantpleatstype[0];
			$_SESSION['pantpleatsimage'] = $pantpleatstype[1];
			$_SESSION['pantpleatstype'];
			break;
		case 'backpocket':
			$pantbackpockettype= explode('-',$_GET['image']);
			$_SESSION['pantbackpocketdata'] = $pantbackpockettype[0];
			$backpocketstyle = $_SESSION['pantwaisttype']."_".$pantbackpockettype[0]."_".$_SESSION['pantbackpocketstyledata'];
			$_SESSION['pantbackpockettype'] = $_SESSION['pantwaisttype']."_".$pantbackpockettype[0]."_".$_SESSION['pantbackpocketstyledata'];
			$_SESSION['pantbackpocketimage'] = $result[0][$backpocketstyle];
			//$backpocketstyle;
			
			
			$backstyle = $_SESSION['pantfittype']."_".$_SESSION['pantstyletypedata']."_back"; 
			$_SESSION['pantbackfittype'] = $backstyle;
			$_SESSION['pantbackstyleimage'] = $result[0][$backstyle];
			echo "<br>".$backstyle;
			
			$beltback = $_SESSION['pantwaisttype']."_belt_back"; 
			$_SESSION['pantbackbelttype'] = $beltback;
			$_SESSION['pantbackbeltimage'] = $result[0][$beltback];
			//echo "<br>".$beltback;
			
			break;
		case 'backpocketstyle':
			//waist_high_back_pocket_both_singlewelthook		
			$pantbackpocketstyletype= explode('-',$_GET['image']);
			$_SESSION['pantbackpocketstyledata'] = $pantbackpocketstyletype[0];
			$pantbackpocketstyletypedata = $_SESSION['pantwaisttype']."_".$_SESSION['pantbackpocketdata']."_".$pantbackpocketstyletype[0];
			$_SESSION['pantbackpocketstyletype'] = $_SESSION['pantwaisttype']."_".$_SESSION['pantbackpocketdata']."_".$pantbackpocketstyletype[0];
			$_SESSION['pantbackpocketimage'] = $result[0][$pantbackpocketstyletypedata];
			//echo $pantbackpocketstyletypedata;pantbackpocketstyletype
			break;	
		case 'fly':
			$pantflytype= explode('-',$_GET['image']);
			$_SESSION['pantflytype'] = $pantflytype[0];
			$_SESSION['pantflyimage'] = $pantflytype[1];
			$_SESSION['pantflytype'];
			break;
		case 'belt':
			$pantbelttype= explode('-',$_GET['image']);
			$pantbelttypedata = $_SESSION['pantwaisttype']."_".$pantbelttype[0];
			$_SESSION['pantbelttype'] =  $_SESSION['pantwaisttype']."_".$pantbelttype[0];
			$_SESSION['pantbeltimage'] = $result[0][$pantbelttypedata];
			//echo $pantbelttypedata;
			break;	

	} //die();
 ?>
<div class="Products-title">
	<h1><?php echo $productresult[0]['productname']?></h1>
</div>
<div class="Products-price">
	<h2><span class="WebRupee">$ </span> <?php echo $productresult[0]['price']?></h2>
</div>


<div class="Products-image" id=""> 

<?php if($_GET['class']=='front customizeoption') { 
?>
<div id="fabric_design_details_middle_picture_view1" class=""> 
	<!--//-----------------------------------------------main paint image n inside---------------------------------------------//--> 
	<img id="2" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantbackpocketimage']; ?>" name="back main image" title="Peace Maker" style="position: absolute; display: block; z-index: 8;"> 
	
	
	<!--//-----------------------------------------------back pocket---------------------------------------------//--> 
	<img id="1" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantbackstyleimage']; ?>" name="back pocket" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
	
	<!--//-----------------------------------------------Belt loops---------------------------------------------//--> 
	<img id="3" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantbackbeltimage']; ?>" name="back belt" title="Peace Maker" style="position: absolute; display: block; z-index: 10;"> 
	
	

</div>
<?php } else { ?>
<div id="fabric_design_details_middle_picture_view1" class=""> 
	<!--//-----------------------------------------------main paint image n inside---------------------------------------------//--> 
	<img id="0" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantfitimage']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 8;"> 
	<img id="1" src="images/pants/Slim-Fit/inside/inside.png" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 0;">
	
	<!----------------front pocket -----------------> 
	<img id="2" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantfrontpocketimage']; ?>" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
	
	
	<!--//-----------------------------------------------Belt loops---------------------------------------------//--> 
	<img id="4" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantbeltimage']; ?>" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 10;"> 
	
	<!--//-----------------------------------------------pleats---------------------------------------------//--> 
	<img id="5" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantpleatsimage']; ?>" title="Peace Maker" style="position: absolute; display: block; z-index: 10;">

</div>
<?php } ?>
</div>

<div class="button-div">
	<table align="center">				
		<tr>
			<td>
				<div class="add-to-bag"><a href="confirmmsgpant.php?acn=addtobag" id="confirm" class="btn confirm">ADD TO BAG</a></div>
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