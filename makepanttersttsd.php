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
			echo $_SESSION['pantfittype']; 
			//$fittypedata= explode('_',$_GET['image']);
			//$_SESSION['fittypedatanew'] = $fittypedata[0]."_".$fittypedata[1];
			break;
		case 'style':
			 $styletype=$_GET['image'];
			 $left = $_SESSION['pantfittype']."_".$_GET['image']."_front";
			 echo $left; //die();
			 $_SESSION['pantstyletype'] = $styletype;
			 $_SESSION['pantstyleimage'] = $result[0][$left];
			 
			break;
		case 'waist':
			$pantwaisttype= explode('-',$_GET['image']);
			$_SESSION['pantwaisttype'] = $pantwaisttype[0];
			$_SESSION['pantwaistimage'] = $pantwaisttype[1];
			echo $_SESSION['pantwaisttype'];
			break;
		case 'frontpocket':
			 $frontpocket=$_GET['image'];
			 $frontpocketdata = $_SESSION['pantwaisttype']."_".$_GET['image'];
			 //echo $frontpocketdata; //die();

			
			$_SESSION['pantfrontpockettype'] = $pantfrontpockettype[0];
			$_SESSION['pantfrontpocketimage'] = $result[0][$frontpocketdata];
			echo $_SESSION['pantfrontpocketimage']; //die();
			break;
		case 'pleats':
			$pantpleatstype= explode('-',$_GET['image']);
			$_SESSION['pantpleatstype'] = $pantpleatstype[0];
			$_SESSION['pantpleatsimage'] = $pantpleatstype[1];
			echo $_SESSION['pantpleatstype'];
			break;
		case 'backpocket':
			$pantbackpockettype= explode('-',$_GET['image']);
			//$_SESSION['pantbackpocketdata'] = $pantbackpockettype[0];
			$_SESSION['pantbackpockettype'] = $_SESSION['pantwaisttype']."_".$pantbackpockettype[0]."_singlewelthook";
			$_SESSION['pantbackpocketimage'] = $pantbackpockettype[1];
			$right = $_SESSION['pantfittype']."_".$_SESSION['pantstyletype']."_back"; 
			$beltback = $_SESSION['pantwaisttype']."_belt_back"; 
			echo $_SESSION['pantbackpockettype'];
			echo "<br>".$right;
			echo "<br>".$beltback;
			break;
		case 'backpocketstyle':
			//waist_high_back_pocket_both_singlewelthook		
			$pantbackpocketstyletype= explode('-',$_GET['image']);
			$_SESSION['pantbackpocketstyletype'] = $_SESSION['pantwaisttype']."_".$_SESSION['pantbackpocketdata']."_".$pantbackpocketstyletype[0];
			$_SESSION['pantbackpocketstyleimage'] = $pantbackpocketstyletype[1];
			echo $_SESSION['pantbackpocketstyletype'];
			break;	
		case 'fly':
			$pantflytype= explode('-',$_GET['image']);
			$_SESSION['pantflytype'] = $pantflytype[0];
			$_SESSION['pantflyimage'] = $pantflytype[1];
			echo $_SESSION['pantflytype'];
			break;
		case 'belt':
			$pantbelttype= explode('-',$_GET['image']);
			$_SESSION['pantbelttype'] = $_SESSION['pantwaisttype']."_".$pantbelttype[0];
			$_SESSION['pantbeltimage'] = $pantbelttype[1];
			echo $_SESSION['pantbelttype'];
			break;	

	} die();
 ?>
 
<div class="Products-image" id=""> 

<?php if($_GET['class']=='front customizeoption') { ?>
<div id="fabric_design_details_middle_picture_view1" class=""> 
	<!--//-----------------------------------------------main paint image n inside---------------------------------------------//--> 
	<img id="2" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantfitimage']; ?>" name="back main image" title="Peace Maker" style="position: absolute; display: block; z-index: 8;"> 
	
	
	<!--//-----------------------------------------------back pocket---------------------------------------------//--> 
	<img id="1" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantbackpocketstyleimage']; ?>" name="back pocket" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
	
	<!--//-----------------------------------------------Belt loops---------------------------------------------//--> 
	<img id="3" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantfitimage']; ?>" name="back belt" title="Peace Maker" style="position: absolute; display: block; z-index: 10;"> 
	
	

</div>

<?php } else { ?>
<div id="fabric_design_details_middle_picture_view1" class=""> 
	<!--//-----------------------------------------------main paint image n inside---------------------------------------------//--> 
	<img id="0" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantfitimage']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 8;"> 
	<img id="1" src="images/pants/Slim-Fit/inside/inside.png" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 0;">
	
	<!----------------front pocket -----------------> 
	<img id="2" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantfrontpocketimage']; ?>" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
	
	<!--//-----------------------------------------------back pocket---------------------------------------------//--> 
	<img id="3" src="images/pants/641s_656.png" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
	<!--//-----------------------------------------------Belt loops---------------------------------------------//--> 
	<img id="4" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantbeltimage']; ?>" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 10;"> 
	
	<!--//-----------------------------------------------pleats---------------------------------------------//--> 
	<img id="5" src="admin/upload/Pant/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pantpleatsimage']; ?>" title="Peace Maker" style="position: absolute; display: block; z-index: 10;">

</div>
<?php } ?>
</div>