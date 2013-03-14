<?php include("system/config.inc.php");
include("function/showcustomization.php");
$productsql = "SELECT * FROM `product` WHERE `productid`='".$_REQUEST['productid']."'"; 
$productresult = $obj_db->select($productsql);


$saveshirtsql="SELECT * FROM `save".$_REQUEST['type']."customize` WHERE `productid`='".$_REQUEST['productid']."' AND `userid`=".$_SESSION['userid'].""; 
	$saveshirtresult=$obj_db->select($saveshirtsql);

	$fittype = explode('-',$saveshirtresult[0]['fit']);
	$sleevetype= explode('-',$saveshirtresult[0]['style']);
	$sleeve_type= explode('_',$sleevetype[0]);
	$collartype= explode('-',$saveshirtresult[0]['collar']);
	$cufftype= explode('-',$saveshirtresult[0]['cuff']);
	$pockettype= explode('-',$saveshirtresult[0]['pocket']);
	$fronttype= explode('-',$saveshirtresult[0]['front']);
	
	
	//-------------pant--------------------------//pocket_type
	$pantfittype = explode('-',$saveshirtresult[0]['fit']);			
	$styletype = explode('-',$saveshirtresult[0]['style']);
	$style_type= explode('_',$styletype[0]);
	
	$waisttype = explode('-',$saveshirtresult[0]['waist']);
	$frontpocket = explode('-',$saveshirtresult[0]['front_pocket']);
	$pocket_type = explode('_',$frontpocket[0]);
	
	$pleatstype = explode('-',$saveshirtresult[0]['pleats']);
	$back_pockettype = explode('-',$saveshirtresult[0]['back_pocket']);
	$back_pocket_type = explode('_',$back_pockettype[0]);
	
	$back_pocket_styletype = explode('-',$saveshirtresult[0]['back_pocket_style']);
	$back_pocket_style_type = explode('_',$back_pocket_styletype[0]);
	
	$flytype = explode('-',$saveshirtresult[0]['fly']);
	$belt_style = explode('-',$saveshirtresult[0]['belt_style']);
	$belt_style_type = explode('_',$belt_style[0]);
	
	

//$_SESSION['productid'] = $productresult[0]['productid'];saveshirtcustomize$sleevetype= explode('-',$shirtdata);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>Show Customization</title>
<style type="text/css">
#fancybox-outer {
	-moz-border-radius:5px;
	float:left;
	width:auto !important;
}
#fancybox-content {
	background:#FFF;
	padding:10px;
}
#fancybox-close{
	display:none !important;	
}
</style>
</head>
<body>
<script type="text/javascript">
	  jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#custom").validationEngine();
	});
</script>
<div style="float:left; position:relative;">
	<!-- -----------------Shirt Custimization -------------->
	<?php if($_REQUEST['type']=='shirt'){?>
	<script type="text/javascript">
		$(document).ready(function() {
		  $('#customize li').click(function() {
			//alert("hi");
			 var eleid = $(this).attr("id");
			 var dataString =  'eleid=' + eleid ;
			 //alert(dataString);
			  $('#customize-icon li').hide();
			  $('#customize-icon li#'+eleid).show();
			  $("#customize li").removeClass("active");
			  $("#"+eleid).addClass("active");
		 });
		 var eleid = $(this).attr("id");
		 var dataString =  'eleid=fit';
		  $('#customize-icon li').hide();
		  
		  <?php if($_REQUEST['act']=='sleeve'){?>
		  
		  $('#customize-icon li#style').show();
		  $("#style").addClass("active");
		  
		  <?php } elseif($_REQUEST['act']=='collar'){?>
		  
		  $('#customize-icon li#collar').show();
		  $("#collar").addClass("active");
		  
		  <?php } elseif($_REQUEST['act']=='cuff'){?>
		  
		  $('#customize-icon li#cuff').show();
		  $("#cuff").addClass("active");
		  
		  <?php } elseif($_REQUEST['act']=='pocket'){?>
		  
		  $('#customize-icon li#pocket').show();
		  $("#pocket").addClass("active");
		  
		  <?php } elseif($_REQUEST['act']=='front_pocket'){?>
		  
		  $('#customize-icon li#front').show();
		  $("#front").addClass("active");
		  
		  <?php } else{?>
		  
		  $('#customize-icon li#fit').show();
		  $("#fit").addClass("active");
		  
		  <?php }?>
		});
	</script>

	<div class="customize-left-menu">
		<ol id="customize">
			<li id="fit" name="fitdiv"><a href="#">1.FIT</a></li>
			<li id="style" name="stylediv" ><a href="#">2.Style</a></li>
			<li id="collar" name="collardiv"><a href="#">3.COLLAR</a></li>
			<li id="cuff" name="cuffdiv"><a href="#">4.CUFF</a></li>
			<li id="pocket" name="pocketdiv"><a href="#">5.POCKET</a></li>
			<li id="front" name="frontdiv"><a href="#">6.FRONT</a></li>
			<li id="back" name="backdiv"><a href="#">7.BACK</a></li>
			<li>&nbsp;</li>
		</ol>
	</div>
	<?php
	

	//------chk the images for customization------------//
	$sql = "select * from `shirtcustomization` where productid = ".$_GET['productid']."";
	$result=$obj_db->select($sql); ?>
	<div class="customize-right-all-icon">
		<ul class="customize-icon" id="customize-icon">
			<?php if($result[0]['fit_slimfit']) { 
			$imagename = $result[0]['fit_slimfit']; ?>
			
			
			<li id="fit" <?php if($fittype[0]=='fit_slimfit') { ?> class="customizeoption active" <?php } ?> name = "fit_slimfit-<?php echo $imagename;?>">
						<div class="inner-div"> <a href="#"> <img src="images/Customization/Fit/Slim fit.jpg"  alt="Slim Fit"/> <span>Slim Fit</span> </a> </div>
			</li>
					
			<?php } ?>
			<?php if($result[0]['fit_normalfit']) { 
			$imagename = $result[0]['fit_normalfit']; ?>
						
			<li id="fit" <?php if($fittype[0]=='fit_normalfit') { ?> class="customizeoption active" <?php } ?> name = "fit_normalfit-<?php echo $imagename;?>">
						<div class="inner-div"> <a href="#"> <img src="images/Customization/Fit/Normal fit.jpg"  alt="Normal Fit"/> <span>Normal Fit</span> </a> </div>
			</li>
			
			<?php } ?>
			<?php if($result[0]['fit_loosefit']) { 
			$imagename = $result[0]['fit_loosefit']; ?>
			
			
			<li id="fit" <?php if($fittype[0]=='fit_loosefit') { ?> class="customizeoption active" <?php } ?> name = "fit_loosefit-<?php echo $imagename;?>">
						<div class="inner-div"> <a href="#">  <img src="images/Customization/Fit/Loose fit.jpg"  alt="Loose Fit"/> <span>Loose Fit</span> </a> </div>
			</li>
			<?php } ?>
			
			
			<?php if($result[0]['style_full_fit_slimfit_sleeve']) { 
			$imagename =$result[0]['style_full_fit_slimfit_sleeve']; ?>
			<li id="style" <?php if($sleeve_type[1]=='full') { ?> class="customizeoption active" <?php } ?> name="full"> <div class="inner-div"> <a href="#"> <img src="images/Customization/Style/Full Sleeve.jpg"  alt="Full Sleeve"/> <span>Full Sleeve</span> </a> </div>
			</li>
			<?php } ?>
			<?php if($result[0]['style_half_fit_slimfit_sleeve']) { 
			$imagename =$result[0]['style_half_fit_slimfit_sleeve'];
			 ?>
			<li id="style" <?php if($sleeve_type[1]=='half') { ?> class="customizeoption active" <?php } ?> name="half"> <div class="inner-div"> <a href="#"> <img src="images/Customization/Style/Half Sleeve.jpg"  alt="Half Sleeve"/> <span>Half Sleeve</span> </a> </div>  </li>
			<?php } ?>
			
			
			<?php if($result[0]['collar_straight']) { 
			$imagename = $result[0]['collar_straight']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_straight') { ?> class="customizeoption active" <?php } ?> name="collar_straight-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Straight.jpg"  alt="Straight Collar"/> <span>Straight </span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['collar_classic']) { 
			$imagename = $result[0]['collar_classic']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_classic') { ?> class="customizeoption active" <?php } ?> name="collar_classic-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Classic.jpg"  alt="Classic Collar"/> <span>Classic </span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['collar_spread']) { 
			$imagename = $result[0]['collar_spread']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_spread') { ?> class="customizeoption active" <?php } ?> name="collar_spread-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Spread Collar"/> <span>Spread </span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['collar_cutaway']) { 
			$imagename = $result[0]['collar_cutaway']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_cutaway') { ?> class="customizeoption active" <?php } ?> name="collar_cutaway-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Cutaway.jpg"  alt="Cutaway Collar"/> <span>Cutaway </span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['collar_fullcutaway']) { 
			$imagename = $result[0]['collar_fullcutaway']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_fullcutaway') { ?> class="customizeoption active" <?php } ?> name="collar_fullcutaway-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Full Cutaway.jpg"  alt="Fullcutaway Collar"/> <span>Fullcutaway </span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['collar_englishcutaway']) { 
			$imagename = $result[0]['collar_englishcutaway']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_englishcutaway') { ?> class="customizeoption active" <?php } ?> name="collar_englishcutaway-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/English Cutaway.jpg"  alt="Englishcutaway Collar"/> <span>Englishcutaway </span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['collar_curvedcutaway']) { 
			$imagename = $result[0]['collar_curvedcutaway']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_curvedcutaway') { ?> class="customizeoption active" <?php } ?> name="collar_curvedcutaway-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Curved Cutaway.jpg"  alt="Curvedcutaway Collar"/> <span>Curvedcutaway </span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['collar_cutawaybutton']) { 
			$imagename = $result[0]['collar_cutawaybutton']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_cutawaybutton') { ?> class="customizeoption active" <?php } ?> name="collar_cutawaybutton-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Cutaway 2 button.jpg"  alt="Cutawaybutton Collar"/> <span>Cutawaybutton </span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['collar_bandedcollar']) { 
			$imagename = $result[0]['collar_bandedcollar']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_bandedcollar') { ?> class="customizeoption active" <?php } ?> name="collar_bandedcollar-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Banded Collar.jpg"  alt="Banded Collar"/> <span>Banded </span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['collar_wingup']) { 
			$imagename = $result[0]['collar_wingup']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_wingup') { ?> class="customizeoption active" <?php } ?> name="collar_wingup-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Wing up Tuxedo.jpg"  alt="Wingup Collar"/> <span>Wingup </span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['collar_buttondown']) { 
			$imagename = $result[0]['collar_buttondown']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_buttondown') { ?> class="customizeoption active" <?php } ?> name="collar_buttondown-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Button down.jpg"  alt="Buttondown Collar"/> <span>Buttondown </span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['collar_rounded']) { 
			$imagename = $result[0]['collar_rounded']; ?>
			<li id="collar" <?php if($collartype[0]=='collar_rounded') { ?> class="customizeoption active" <?php } ?> name="collar_rounded-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Rounded.jpg"  alt="Rounded Collar"/> <span>Rounded </span> </a> </div>  </li>
			<?php } ?>					
			
			
			<?php if($result[0]['cuff_singlebuttonmiter']) { ?>
			<?php $imagename = $result[0]['cuff_singlebuttonmiter']; ?>
			<li id="cuff" <?php if($cufftype[0]=='cuff_singlebuttonmiter') { ?> class="customizeoption active" <?php } ?> name="cuff_singlebuttonmiter-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Single button miter.jpg"  alt="SingleButtonMiter Cuff"/> <span>Single Miter</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['cuff_doublebuttonmiter']) { 
			$imagename = $result[0]['cuff_doublebuttonmiter']; ?>
			<li id="cuff" <?php if($cufftype[0]=='cuff_doublebuttonmiter') { ?> class="customizeoption active" <?php } ?> name="cuff_doublebuttonmiter-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Double button miter.jpg"  alt="DoublButtonMiter Cuff"/> <span>Double Miter</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['cuff_frenchbuttonmiter']) { 
			$imagename = $result[0]['cuff_frenchbuttonmiter']; ?>
			<li id="cuff" <?php if($cufftype[0]=='cuff_frenchbuttonmiter') { ?> class="customizeoption active" <?php } ?> name="cuff_frenchbuttonmiter-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="FrenchButtonMiter Cuff"/> <span>French Miter</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['cuff_singlebuttonround']) { 
			$imagename = $result[0]['cuff_singlebuttonround']; ?>
			<li id="cuff" <?php if($cufftype[0]=='cuff_singlebuttonround') { ?> class="customizeoption active" <?php } ?> name="cuff_singlebuttonround-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Single button round.jpg"  alt="SingleButtonRound Cuff"/> <span>Single Round</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['cuff_doublebuttonround']) { 
			$imagename = $result[0]['cuff_doublebuttonround']; ?>
			<li id="cuff" <?php if($cufftype[0]=='cuff_doublebuttonround') { ?> class="customizeoption active" <?php } ?> name="cuff_doublebuttonround-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Double button round.jpg"  alt="DoubleButtonRound Cuff"/> <span>Double Round</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['cuff_frenchbuttonround']) { 
			$imagename = $result[0]['cuff_frenchbuttonround']; ?>
			<li id="cuff" <?php if($cufftype[0]=='cuff_frenchbuttonround') { ?> class="customizeoption active" <?php } ?> name="cuff_frenchbuttonround-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/French Round.jpg"  alt="FrenchButtonRound Cuff"/> <span>French Round</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['cuff_singlebuttonsquare']) { 
			$imagename = $result[0]['cuff_singlebuttonsquare']; ?>
			<li id="cuff"  <?php if($cufftype[0]=='cuff_singlebuttonsquare') { ?> class="customizeoption active" <?php } ?> name="cuff_singlebuttonsquare-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Single Button Square.jpg"  alt="SingleButtonSquare Cuff"/> <span>Single Square</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['cuff_doublebuttonsquare']) { 
			$imagename = $result[0]['cuff_doublebuttonsquare']; ?>
			<li id="cuff" <?php if($cufftype[0]=='cuff_doublebuttonsquare') { ?> class="customizeoption active" <?php } ?> name="cuff_doublebuttonsquare-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Double Button Square.jpg"  alt="DoubleButtonSquare Cuff"/> <span>Double Square</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['cuff_frenchbuttonsquare']) { 
			$imagename = $result[0]['cuff_frenchbuttonsquare']; ?>
			<li id="cuff" <?php if($cufftype[0]=='cuff_frenchbuttonsquare') { ?> class="customizeoption active" <?php } ?> name="cuff_frenchbuttonsquare-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/French Square.jpg"  alt="FrenchButtonSquare Cuff"/> <span>French Square</span> </a> </div>  </li>
			<?php } ?>
			
			
			<?php if($result[0]['pocket_miter']) { 
			$imagename = $result[0]['pocket_miter']; ?>
			<li id="pocket" <?php if($pockettype[0]=='pocket_miter') { ?> class="customizeoption active" <?php } ?> name="pocket_miter-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/Miter.jpg"  alt="Pocket Miter"/> <span>Pocket Miter</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['pocket_round']) { 
			 $imagename = $result[0]['pocket_round']; ?>
			<li id="pocket"  <?php if($pockettype[0]=='pocket_round') { ?> class="customizeoption active" <?php } ?> name="pocket_round-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/Round.jpg"  alt="Pocket Round"/> <span>Pocket Round</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['pocket_square']) { 
			$imagename = $result[0]['pocket_square']; ?>
			<li id="pocket"  <?php if($pockettype[0]=='pocket_square') { ?> class="customizeoption active" <?php } ?> name="pocket_square<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/Square.jpg"  alt="Pocket Square"/> <span>Pocket Square</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['pocket_vshape']) { 
			$imagename = $result[0]['pocket_vshape']; ?>
			<li id="pocket" <?php if($pockettype[0]=='pocket_vshape') { ?> class="customizeoption active" <?php } ?> name="pocket_vshape-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/V-Shape.jpg"  alt="Pocket Vshape"/> <span>Pocket Vshape</span> </a> </div>  </li>
			<?php } ?>
			<?php //if($result[0]['pocket_nopocket']) { 
			$imagename ='' ?>
			<li id="pocket"  <?php if($pockettype[0]=='pocket_nopocket') { ?> class="customizeoption active" <?php } ?> name="pocket_nopocket-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/No Pocket.jpg"  alt="No Pocket"/> <span>No Pocket</span> </a> </div>  </li>
			<?php //} ?>
			
			
			<?php if($result[0]['front_placket']) { 
			$imagename = $result[0]['front_placket']; ?>
			<li id="front" <?php if($fronttype[0]=='front_placket') { ?> class="customizeoption active" <?php } ?> name="front_placket-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Front Placket"/> <span>Front Placket</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['front_covered']) { 
			$imagename = $result[0]['front_covered']; ?>
			<li id="front" <?php if($fronttype[0]=='front_covered') { ?> class="customizeoption active" <?php } ?> name="front_covered-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/FRONT/Covered.jpg"  alt="Front Covered"/> <span>Front Covered</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['front_noplacket']) { 
			$imagename = $result[0]['front_noplacket']; ?>
			<li id="front" <?php if($fronttype[0]=='front_noplacket') { ?> class="customizeoption active" <?php } ?> name="front_noplacket-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/FRONT/No Placket.jpg"  alt="Front No Placket"/> <span>Front No Placket</span> </a> </div>  </li>
			<?php } ?>
			
			
			<?php if($result[0]['back_sidepleats']) { 
			$imagename = $result[0]['back_sidepleats']; ?>
			<li id="back" class="customizeoption active" name="back_sidepleats-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Side Pleats"/> <span>Side Pleats</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['back_boxpleats']) { 
			$imagename = $result[0]['back_boxpleats']; ?>
			<li id="back" class="customizeoption active" name="back_boxpleats-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/BACK/Covered.jpg"  alt="Box Pleats"/> <span>Box Pleats</span> </a> </div>  </li>
			<?php } ?>
			<?php if($result[0]['back_nopleats']) { 
			$imagename = $result[0]['back_nopleats']; ?>
			<li id="back" class="customizeoption active" name="back_nopleats-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/BACK/No Placket.jpg"  alt="No Pleats"/> <span>No Pleats</span> </a> </div>  </li>
			<?php } ?>
		</ul>
	</div>
	<div style="float:right; width:100%;text-align:center">
		<form action="showcustomization.php" method="post">
			<input type="hidden" name="type" value="shirt" />
			<input type="submit" name="submit" value="Save" class="btn"/>
		</form>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function() {
		  $('#customize-icon li').click(function() {
			var pid = <?php echo $_REQUEST['productid'];?>;
			var eleid = $(this).attr("id");
			var class1 = $(this).attr("class");
			var image1 = $(this).attr("name");
			var dataString =  'id=' + eleid + '&class=' + class1 + '&image=' + image1 + '&pid=' +pid  + '&type=shirt';
			
			$("#customize-icon li#"+eleid).removeClass("active");
			$(this).addClass("active");
	
			if(image1=='half') {
				$('.cuff').removeAttr('id');
			}
			
			if(image1=='full') {
				$(".cuff").attr('id', 'cuff');
			}
			//alert(dataString);	
			$.ajax({
				type: "GET",
				url: "changecustomize.php",
				data: dataString,
				cache: false,
				success: function(){
				//alert(html);	  
				}
			   });
			   
			 return false;
			 });
		  });
	</script>
	<?php }?>
	
	
	
	
	
	
	<!-- -----------------Pant Custimization -------------->
	
	<?php if($_REQUEST['type']=='pant'){?>
	<script type="text/javascript">
		$(document).ready(function() {
		  $('#customize li').click(function() {
			//alert("hi");
			 var eleid = $(this).attr("id");
			 var dataString =  'eleid=' + eleid ;
			 //alert(dataString);
			  $('#customize-icon li').hide();
			  $('#customize-icon li#'+eleid).show();
			  $("#customize li").removeClass("active");
			  $("#"+eleid).addClass("active");
		 });
		 var eleid = $(this).attr("id");
		 var dataString =  'eleid=fit';
		  $('#customize-icon li').hide();
		  
		  <?php if($_REQUEST['act']=='style_type'){?>
		  $('#customize-icon li#style').show();		  
		  $("#style").addClass("active");
		  <?php } elseif($_REQUEST['act']=='waist_type'){?>
		  $('#customize-icon li#waist').show();		  
		  $("#waist").addClass("active");
		  <?php }elseif($_REQUEST['act']=='front_pocket_type'){?>
		  $('#customize-icon li#front_pocket').show();		  
		  $("#front_pocket").addClass("active");
		  <?php }elseif($_REQUEST['act']=='pleat_type'){?>
		  $('#customize-icon li#pleats').show();		  
		  $("#pleats").addClass("active");
		  <?php }elseif($_REQUEST['act']=='back_pocket_type'){?>
		  $('#customize-icon li#back_pocket').show();		  
		  $("#back_pocket").addClass("active");
		  <?php }elseif($_REQUEST['act']=='back_pocket_style'){?>
		  $('#customize-icon li#back_pocket_style').show();		  
		  $("#back_pocket_style").addClass("active");
		  <?php }elseif($_REQUEST['act']=='fly_type'){?>
		  $('#customize-icon li#fly').show();		  
		  $("#fly").addClass("active");
		  <?php }elseif($_REQUEST['act']=='belt_style'){?>
		  $('#customize-icon li#belt_style').show();		  
		  $("#belt_style").addClass("active");
		  <?php }else{?>
		  $('#customize-icon li#fit').show();		  
		  $("#fit").addClass("active");
		  <?php }?>
		});
	</script>
	
	<div class="customize-left-menu">
		<ol id="customize">
			<li id="fit" name="fitdiv"><a href="#">1.FIT</a></li>
			<li id="style" class="back" name="stylediv" ><a href="#">2.Style</a></li>
			<li id="waist" class="back" name="waistdiv"><a href="#">3.Waist</a></li>
			<li id="front_pocket" class="back" name="frontpocketdiv"><a href="#">4.Front Pocket</a></li>
			<li id="pleats" class="back"  name="pleatsdiv"><a href="#">5.Pleats</a></li>
			<li id="back_pocket" class="front customizeoption" name="backpocketdiv"><a href="#">6.Back Pocket</a></li>
			<li id="back_pocket_style" class="front customizeoption" name="backpocketstylediv"><a href="#">7.Pocket Style</a></li>
			<li id="fly" class="back" name="flydiv"><a href="#">8.Fly</a></li>
			<li id="belt_style" class="back" name="beltdiv"><a href="#">9.Belt Style</a></li>
			<li>&nbsp;</li>
		</ol>
	</div>
	<?php
	//------chk the images for customization------------//
	$sql = "select * from `pantcustomization` where productid = ".$_GET['productid']."";
	$result=$obj_db->select($sql); ?>
	<div class="customize-right-all-icon">
				<ul class="customize-icon" id="customize-icon">
				
					<li id="pocket"  <?php if($pockettype[0]=='pocket_nopocket') { ?> class="customizeoption active" <?php } ?> name="pocket_nopocket-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/No Pocket.jpg"  alt="No Pocket"/> <span>No Pocket</span> </a> </div>  </li>
					
					<?php if($result[0]['fit_slimfit_narrow_front']) { 
					$imagename = $result[0]['fit_slimfit_narrow_front']; ?>
					<li id="fit" <?php if($pantfittype[0]=='fit_slimfit') { ?> class="customizeoption active" <?php } ?> name = "fit_slimfit-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/fit/slim.png"  alt="Slim Fit"/> <span>Slim Fit</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['fit_normalfit_narrow_front']) { 
					$imagename = $result[0]['fit_normalfit_narrow_front']; ?>
					<li id="fit" <?php if($pantfittype[0]=='fit_normalfit') { ?> class="customizeoption active" <?php } ?> name = "fit_normalfit-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/fit/normal.png"  alt="Normal Fit"/> <span>Normal Fit</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['fit_loosefit_narrow_front']) { 
					$imagename = $result[0]['fit_loosefit_narrow_front']; ?>
					<li id="fit" <?php if($pantfittype[0]=='fit_loosefit') { ?> class="customizeoption active" <?php } ?> name = "fit_loosefit-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/fit/loose.png"  alt="Loose Fit"/> <span>Loose Fit</span> </a> </div> </li>
					<?php } ?>
					
					
					<?php if($result[0]['fit_slimfit_stright_front']) { 
					$imagename = $result[0]['fit_slimfit_stright_front']; ?>
					<li id="style" <?php if($style_type[2]=='narrow') { ?> class="customizeoption active" <?php } ?> name="narrow"> <div class="inner-div"> <a href="#"> <img src="images/Customization/Style/Half Sleeve.jpg"  alt="Full Sleeve"/> <span>Narrow Fit</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['fit_normalfit_stright_front']) { 
					$imagename = $result[0]['fit_normalfit_stright_front']; ?>
					<li id="style" <?php if($style_type[2]=='stright') { ?> class="customizeoption active" <?php } ?> name="stright"> <div class="inner-div"> <a href="#"> <img src="images/Customization/Style/Half Sleeve.jpg"  alt="Half Sleeve"/> <span>Straight Fit</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['fit_loosefit_stright_front']) { 
					$imagename =$result[0]['fit_loosefit_stright_front']; ?>
					<li id="style" <?php if($style_type[2]=='bellbottom') { ?> class="customizeoption active" <?php } ?> name="bellbottom"> <div class="inner-div"> <a href="#"> <img src="images/Customization/Style/Half Sleeve.jpg"  alt="Half Sleeve"/> <span>Bellbottom Fit</span> </a> </div> </li>
					<?php } ?>
					
					
					<?php if($result[0]['waist_high_cross_pocket_front']) { 
					$imagename = $result[0]['waist_high_cross_pocket_front']; ?>
					<li id="waist" <?php if($waisttype[0]=='waist_high') { ?> class="customizeoption active" <?php } ?> name="waist_high-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/waist/high.png"  alt="Straight Collar"/> <span>High Waist</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_medium_cross_pocket_front']) { 
					$imagename = $result[0]['waist_medium_cross_pocket_front']; ?>
					<li id="waist" <?php if($waisttype[0]=='waist_medium') { ?> class="customizeoption active" <?php } ?> name="waist_medium-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/waist/medium.png"  alt="Classic Collar"/> <span>Medium Waist</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_low_cross_pocket_front']) { 
					$imagename = $result[0]['waist_low_cross_pocket_front']; ?>
					<li id="waist" <?php if($waisttype[0]=='waist_low') { ?> class="customizeoption active" <?php } ?> name="waist_low-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/waist/low.png"  alt="Spread Collar"/> <span>Low Waist</span> </a> </div> </li>
					<?php } ?>
										
					<?php if($result[0]['waist_low_cross_pocket_front']) { 
					$imagename = $result[0]['waist_low_cross_pocket_front']; ?>
					<li id="front_pocket" <?php if($pocket_type[2]=='cross') { ?> class="customizeoption active" <?php } ?> name="cross_pocket_front"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/pocket/cross.png"  alt="SingleButtonMiter Cuff"/> <span>Cross Pocket</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_low_cross_pocket_front']) { 
					$imagename = $result[0]['waist_low_cross_pocket_front']; ?>
					<li id="front_pocket" <?php if($pocket_type[2]=='stright') { ?> class="customizeoption active" <?php } ?> name="stright_pocket_front"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/pocket/straight.png"  alt="DoublButtonMiter Cuff"/> <span>Straight Pocket</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_low_cross_pocket_front']) { 
					$imagename = $result[0]['waist_low_cross_pocket_front']; ?>
					<li id="front_pocket" <?php if($pocket_type[2]=='round') { ?> class="customizeoption active" <?php } ?> name="round_pocket_front"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/pocket/round.png"  alt="FrenchButtonMiter Cuff"/> <span>Round Pocket</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_low_cross_pocket_front']) { 
					$imagename = $result[0]['waist_low_cross_pocket_front']; ?>
					<li id="front_pocket" <?php if($pocket_type[2]=='lshape') { ?> class="customizeoption active" <?php } ?> name="lshape_pocket_front"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/pocket/cross.png"  alt="SingleButtonRound Cuff"/> <span>L-Shape Pocket</span> </a> </div> </li>
					<?php } ?>
					<?php //if($result[0]['pocket_nopocket']) { 
					$imagename ='' ?>
					<li id="front_pocket" <?php if($pocket_type[2]=='no') { ?> class="customizeoption active" <?php } ?> name="no_pocket_pocket_front"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/No Pocket.jpg"  alt="No Pocket"/> <span>No Pocket</span> </a> </div> </li>
					<?php //} ?>
					
					
					
					<?php if($result[0]['pleats_single']) { 
					$imagename = $result[0]['pleats_single']; ?>
					<li id="pleats" <?php if($pleatstype[0]=='pleats_single') { ?> class="customizeoption active" <?php } ?> name="pleats_single-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/pleats/single.png"  alt="Pocket Miter"/> <span>Single Pleats</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['pleats_double']) { 
					 $imagename = $result[0]['pleats_double']; ?>
					<li id="pleats" <?php if($pleatstype[0]=='pleats_double') { ?> class="customizeoption active" <?php } ?> name="pleats_double-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/pleats/double.png"  alt="Pocket Round"/> <span>Double Pleats</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['pleats_single_reserved']) { 
					$imagename = $result[0]['pleats_single_reserved']; ?>
					<li id="pleats" <?php if($pleatstype[0]=='pleats_single_reserved') { ?> class="customizeoption active" <?php } ?> name="pleats_single_reserved-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/pleats/single.png"  alt="Pocket Square"/> <span>Single Reversed</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['pleats_double_reserved']) { 
					$imagename = $result[0]['pleats_double_reserved']; ?>
					<li id="pleats" <?php if($pleatstype[0]=='pleats_double_reserved') { ?> class="customizeoption active" <?php } ?> name="pleats_double_reserved-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/pleats/single.png"  alt="Pocket Vshape"/> <span>Double Reversed</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['pleats_box']) { 
					$imagename = $result[0]['pleats_box']; ?>
					<li id="pleats" <?php if($pleatstype[0]=='pleats_box') { ?> class="customizeoption active" <?php } ?> name="pleats_box-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/pleats/single.png"  alt="Pocket Vshape"/> <span>Box Pleats</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['pleats_without_box']) { 
					$imagename = $result[0]['pleats_without_box']; ?>
					<li id="pleats" <?php if($pleatstype[0]=='pleats_without_box') { ?> class="customizeoption active" <?php } ?> name="pleats_without_box-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/pleats/nopleats.png"  alt="No Pocket"/> <span>No Pleats</span> </a> </div> </li>
					<?php } ?>
					
					
					<?php if($result[0]['waist_high_back_pocket_left_singlewelthook']) { 
					$imagename = $result[0]['waist_high_back_pocket_left_singlewelthook']; ?>
					<li id="back_pocket" <?php if($back_pocket_type[4]=='left') { ?> class="customizeoption active" <?php } ?> name="back_pocket_left"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/back pocket/left.png"  alt="Front Placket"/> <span>Left Pocket</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_high_back_pocket_right_singlewelthook']) { 
					$imagename = $result[0]['waist_high_back_pocket_right_singlewelthook']; ?>
					<li id="back_pocket" <?php if($back_pocket_type[4]=='right') { ?> class="customizeoption active" <?php } ?> name="back_pocket_right"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/back pocket/right.png"  alt="Front Covered"/> <span>Right Pocket</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_high_back_pocket_both_singlewelthook']) { 
					$imagename = $result[0]['waist_high_back_pocket_both_singlewelthook']; ?>
					<li id="back_pocket" <?php if($back_pocket_type[4]=='both') { ?> class="customizeoption active" <?php } ?> name="back_pocket_both"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/back pocket/both.png"  alt="Front No Placket"/> <span>Both Pocket</span> </a> </div> </li>
					<?php } ?>
					<?php //if($result[0]['pocket_nopocket']) { 
					$imagename ='' ?>
					<li id="back_pocket" <?php if($back_pocket_type[4]=='none') { ?> class="customizeoption active" <?php } ?> name="back_pocket_none-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/back pocket/none.png"  alt="No Pocket"/> <span>No Pocket</span> </a> </div> </li>
					<?php //} ?>
					
					
					<?php if($result[0]['waist_high_back_pocket_both_singlewelthook']) { 
					$imagename = $result[0]['waist_high_back_pocket_both_singlewelthook']; ?>
					<li id="back_pocket_style" <?php if($back_pocket_style_type[5]=='singlewelthook') { ?> class="customizeoption active" <?php } ?> name="singlewelthook"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/back pocket style/hook.png"  alt="Side Pleats"/> <span>Single Hook</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_high_back_pocket_both_singlewelthook']) { 
					$imagename = $result[0]['waist_high_back_pocket_both_singlewelthook']; ?>
					<li id="back_pocket_style" <?php if($back_pocket_style_type[5]=='doublewelthook') { ?> class="customizeoption active" <?php } ?> name="doublewelthook"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/back pocket style/singlewelt.png"  alt="Box Pleats"/> <span>Double Hook</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_high_back_pocket_both_singlewelthook']) { 
					$imagename = $result[0]['waist_high_back_pocket_both_singlewelthook']; ?>
					<li id="back_pocket_style" <?php if($back_pocket_style_type[5]=='singleweltbutton') { ?> class="customizeoption active" <?php } ?> name="singleweltbutton"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/back pocket style/buttoned.png"  alt="No Pleats"/> <span>Single Button</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_high_back_pocket_both_singlewelthook']) { 
					$imagename = $result[0]['waist_high_back_pocket_both_singlewelthook']; ?>
					<li id="back_pocket_style" <?php if($back_pocket_style_type[5]=='doubleweltbutton') { ?> class="customizeoption active" <?php } ?> name="doubleweltbutton"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/back pocket style/buttoned.png"  alt="No Pleats"/> <span>Double Button</span> </a> </div> </li>
					<?php } ?>
					
					
					
					<?php if($result[0]['fly_buttoned']) { 
					$imagename = $result[0]['fly_buttoned']; ?>
					<li id="fly" <?php if($flytype[0]=='fly_buttoned') { ?> class="customizeoption active" <?php } ?> name="fly_buttoned-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/fly/buttoned.png"  alt="Side Pleats"/> <span>Fly Button</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['fly_zipper']) { 
					$imagename = $result[0]['fly_zipper']; ?>
					<li id="fly" <?php if($flytype[0]=='fly_zipper') { ?> class="customizeoption active" <?php } ?> name="fly_zipper-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/pant/fly/zipper.png"  alt="Box Pleats"/> <span>Zipper Fly</span> </a> </div> </li>
					<?php } ?>
					
					
					
					<?php if($result[0]['waist_high_belt_cut_buttoned_front']) { 
					$imagename = $result[0]['waist_high_belt_cut_buttoned_front']; ?>
					<li id="belt_style" <?php if($belt_style_type[3]."_".$belt_style_type[4]=='cut_buttoned') { ?> class="customizeoption active" <?php } ?> name="belt_cut_buttoned_front"> <div class="inner-div"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Side Pleats"/> <span>Cut Button</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_high_belt_cut_hock_front']) { 
					$imagename = $result[0]['waist_high_belt_cut_hock_front']; ?>
					<li id="belt_style" <?php if($belt_style_type[3]."_".$belt_style_type[4]=='cut_hock') { ?> class="customizeoption active" <?php } ?> name="belt_cut_hock_front"> <div class="inner-div"> <a href="#"> <img src="images/Customization/BACK/Covered.jpg"  alt="Box Pleats"/> <span>Cut Hock</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_high_belt_long_buttoned_front']) { 
					$imagename = $result[0]['waist_high_belt_long_buttoned_front']; ?>
					<li id="belt_style" <?php if($belt_style_type[3]."_".$belt_style_type[4]=='long_buttoned') { ?> class="customizeoption active" <?php } ?> name="belt_long_buttoned_front"> <div class="inner-div"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Side Pleats"/> <span>Long Button</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_high_belt_long_hook_front']) { 
					$imagename = $result[0]['waist_high_belt_long_hook_front']; ?>
					<li id="belt_style" <?php if($belt_style_type[3]."_".$belt_style_type[4]=='long_hock') { ?> class="customizeoption active" <?php } ?> name="belt_long_hook_front"> <div class="inner-div"> <a href="#"> <img src="images/Customization/BACK/Covered.jpg"  alt="Box Pleats"/> <span>Long Hock</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['waist_high_belt_long_hook_buttoned_front']) { 
					$imagename = $result[0]['waist_high_belt_long_hook_buttoned_front']; ?>
					<li id="belt_style" <?php if($belt_style_type[3]."_".$belt_style_type[4]."_".$belt_style_type[5]=='long_hook_buttoned') { ?> class="customizeoption active" <?php } ?> name="belt_long_hook_buttoned_front"> <div class="inner-div"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Side Pleats"/> <span>Hock Button</span> </a> </div> </li>
					<?php } ?>
					
				</ul>
			</div>
		
	<div style="float:right; width:100%;text-align:center">
		<form action="showcustomization.php" method="post">
			<input type="hidden" name="type" value="pant" />
			<input type="submit" name="submit" value="Save" class="btn"/>
		</form>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function() {
		  $('#customize-icon li').click(function() {
			var pid = <?php echo $_REQUEST['productid'];?>;
			var eleid = $(this).attr("id");
			var class1 = $(this).attr("class");
			var image1 = $(this).attr("name");
			var dataString =  'id=' + eleid + '&class=' + class1 + '&image=' + image1 + '&pid=' +pid  + '&type=pant';
			
			
			$("#customize-icon li#"+eleid).removeClass("active");
			$(this).addClass("active");
			
			//alert(dataString);	
			$.ajax({
				type: "GET",
				url: "changecustomize.php",
				data: dataString,
				cache: false,
				success: function(){
				//alert(html);	  
				}
			   });
			   
			 return false;
			 });
		  });
	</script>
<?php }?>





<!-- -----------------Suit Custimization -------------->
	
	<?php if($_REQUEST['type']=='suit'){?>		
	
		<div id="frontsuit" style="float:left; width:100%;">
			
			<?php if($_REQUEST['front']=='true'){?>
			<div class="customize-left-menu">
					<ol id="customize">
						<li id="piece" class="back" name="suittypediv"><a href="#">1.Suit Type</a></li>
						<li id="lapel" class="back" name="lapeldiv"><a href="#">2.Lapel</a></li>
						<li id="vents" class="inner customizeoption" name="ventsdiv" ><a href="#">3.Vents</a></li>
						<li id="buttons" class="back" name="buttondiv"><a href="#">4.Buttons</a></li>
						<li id="pocket" class="back" name="frontpocketdiv"><a href="#">5.Pocket Style</a></li>
						<li id="breast_pocket" class="back"  name="breastdiv"><a href="#">6.Breast Pocket</a></li>
						<li id="ticket_pocket" class="back" name="ticketdiv"><a href="#">7.Ticket Pocket</a></li>
						<li id="sleeve" class="back" name="sleevebuttonsdiv"><a href="#" title="Sleeve Buttons">8.Sleeve</a></li>
						<li id="buttonhole" class="back" name="buttonholediv"><a href="#">9.Buttonhole</a></li>
						<li id="inner_lining" class="front customizeoption" name="interlinigdiv"><a href="#">10.Inter Lining</a></li>					
						<li>&nbsp;</li>
					</ol>
				</div>
			<script type="text/javascript">
					$(document).ready(function() {
					  $('#customize li').click(function() {
						//alert("hi");
					 var eleid = $(this).attr("id");
					 var dataString =  'eleid=' + eleid ;
					 //alert(dataString);
					  $('#customize-icon li').hide();
					  $('#customize-icon li#'+eleid).show();
					  $("#customize li").removeClass("active");
					  $("#"+eleid).addClass("active");
					 });
					 var eleid = $(this).attr("id");
					 var dataString =  'eleid=suittype';
					  $('#customize-icon li').hide();
					  <?php if($_REQUEST['act']=='lapel'){?>
					  $('#customize-icon li#lapel').show();
					  $("#lapel").addClass("active");
					  <?php }elseif($_REQUEST['act']=='vent_type'){?>
					  $('#customize-icon li#vents').show();
					  $("#vents").addClass("active");
					  <?php }elseif($_REQUEST['act']=='button_type'){?>
					  $('#customize-icon li#buttons').show();
					  $("#buttons").addClass("active");
					  <?php }elseif($_REQUEST['act']=='pocket_style'){?>
					  $('#customize-icon li#pocket').show();
					  $("#pocket").addClass("active");
					  <?php }elseif($_REQUEST['act']=='breast_pocket'){?>
					  $('#customize-icon li#breast_pocket').show();
					  $("#breast_pocket").addClass("active");
					  <?php }elseif($_REQUEST['act']=='ticket_pocket'){?>
					  $('#customize-icon li#ticket_pocket').show();
					  $("#ticket_pocket").addClass("active");
					  <?php }elseif($_REQUEST['act']=='suit_sleeve'){?>
					  $('#customize-icon li#sleeve').show();
					  $("#sleeve").addClass("active");
					   <?php }elseif($_REQUEST['act']=='buttonhole'){?>
					  $('#customize-icon li#buttonhole').show();
					  $("#buttonhole").addClass("active");
					   <?php }elseif($_REQUEST['act']=='inner_lining'){?>
					  $('#customize-icon li#inner_lining').show();
					  $("#inner_lining").addClass("active");
					   <?php }else{?>
					  $('#customize-icon li#piece').show();
					  $("#piece").addClass("active");
					  <?php }?>
					});
				</script>
			<?php
			//------chk the images for customization------------//
			$sql = "select * from `suitcustomization` where productid = ".$_GET['productid']."";
			$result=$obj_db->select($sql); ?>
			<div class="customize-right-all-icon">
				<ul class="customize-icon" id="customize-icon">
					<?php //if($result[0]['two_piece']) { 
					$imagename = $result[0]['two_piece']; ?>
					<li id="piece" class="customizeoption twopiece" name = "two_piece-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Loose fit.jpg"  alt="Three piece"/> <span>Two Piece</span> </a> </li>
					<?php //} ?>
					<?php if($result[0]['three_piece']) { 
					$imagename = $result[0]['three_piece']; ?>
					<li id="piece" class="customizeoption threepiece" name = "three_piece-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Loose fit.jpg"  alt="Three piece"/> <span>Three Piece</span> </a> </li>
					<?php } ?>					
				
					<?php if($result[0]['type_peak_lapel']) { 
					$imagename = $result[0]['type_peak_lapel']; ?>
					<li id="lapel" class="customizeoption" name = "type_peak_lapel-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Slim fit.jpg"  alt="Peak Lapel"/> <span>Peak Lapel</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['type_notch_lapel']) { 
					$imagename = $result[0]['type_notch_lapels']; ?>
					<li id="lapel" class="customizeoption" name = "type_notch_lapel-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Normal fit.jpg"  alt="Notch Lapel"/> <span>Notch Lapel</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['type_slim_notch_lapel']) { 
					$imagename = $result[0]['type_slim_notch_lapels']; ?>
					<li id="lapel" class="customizeoption" name = "type_slim_notch_lapel-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Loose fit.jpg"  alt="Slim Notch Lapel"/> <span>Slim Notch Lapel</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['type_shawl_lapel']) { 
					$imagename = $result[0]['type_shawl_lapels']; ?>
					<li id="lapel" class="customizeoption" name = "type_shawl_lapel-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Slim fit.jpg"  alt="Shawl Lapel"/> <span>Shawl Lapel</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['type_mao_lapel']) { 
					$imagename = $result[0]['type_mao_lapels']; ?>
					<li id="lapel" class="customizeoption" name = "type_mao_lapel-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Normal fit.jpg"  alt="Mao Lapel"/> <span>Mao Lapel</span> </a> </li>
					<?php } ?>
					
					
					
					<?php if($result[0]['vents_one']) { 
					$imagename =$result[0]['vents_one']; ?>
					<li id="vents" class="inner customizeoption" name="vents_one-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Style/Full Sleeve.jpg"  alt="Vents One"/> <span>Vents One</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vents_two']) { 
					$imagename =$result[0]['vents_two'];?>
					<li id="vents" class="inner customizeoption" name="vents_two-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Style/Half Sleeve.jpg"  alt="Vents Two"/> <span>Vents Two</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vents_none']) { 
					$imagename =$result[0]['vents_none'];?>
					<li id="vents" class="inner customizeoption" name="vents_none-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Style/Half Sleeve.jpg"  alt="Vents None"/> <span>Vents None</span> </a> </li>
					<?php } ?>
					
					
					<?php if($result[0]['button_one']) { 
					$imagename = $result[0]['button_ones']; ?>
					<li id="buttons" class="customizeoption" name="button_one-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Straight.jpg"  alt="Button One"/> <span>Button One</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['button_two']) { 
					$imagename = $result[0]['button_twos']; ?>
					<li id="buttons" class="customizeoption" name="button_two-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Classic.jpg"  alt="Button Two"/> <span>Button Two</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['button_three']) { 
					$imagename = $result[0]['button_three']; ?>
					<li id="buttons" class="customizeoption" name="button_three-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Button Three"/> <span>Button Three</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['button_double_breasted']) { 
					$imagename = $result[0]['button_double_breasteds']; ?>
					<li id="buttons" class="customizeoption" name="button_double_breasted-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Button Double Breasted"/> <span>Double Breasted</span> </a> </li>
					<?php } ?>
								
										
					<?php if($result[0]['pocket_straight_flap']) { 
					$imagename = $result[0]['pocket_straight_flap']; ?>
					<li id="pocket" class="customizeoption" name="pocket_straight_flap-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Straight Flap"/> <span>Straight Flap</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['pocket_slanted_flap']) { 
					$imagename = $result[0]['pocket_slanted_flaps']; ?>
					<li id="pocket" class="customizeoption" name="pocket_slanted_flap-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Slanted Flap"/> <span>Slanted Flap</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['pocket_piped_flap']) { 
					$imagename = $result[0]['pocket_piped_flaps']; ?>
					<li id="pocket" class="customizeoption" name="pocket_piped_flap-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Piped Flap"/> <span>Piped Flap</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['pocket_patch_flap']) { 
					$imagename = $result[0]['pocket_patch_flaps']; ?>
					<li id="pocket" class="customizeoption" name="pocket_patch_flap-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/Single button round.jpg"  alt="Patch Flap"/> <span>Patch Flap</span> </a> </li>
					<?php } ?>
					
					
					
					<?php if($result[0]['breast_pocket_yes']) { 
					$imagename = $result[0]['breast_pocket_yes']; ?>
					<li id="breast_pocket" class="customizeoption" name="breast_pocket_yes-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Breast"/> <span>Breast</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['breast_pocket_no']) { 
					 $imagename = $result[0]['breast_pocket_nos']; ?>
					<li id="breast_pocket" class="customizeoption" name="breast_pocket_no-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Breast None"/> <span>Breast None</span> </a> </li>
					<?php } ?>
					
					
					<?php if($result[0]['ticket_pocket_yes']) { 
					$imagename = $result[0]['ticket_pocket_yes']; ?>
					<li id="ticket_pocket" class="customizeoption" name="ticket_pocket_yes-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Ticket"/> <span>Ticket</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['ticket_pocket_no']) { 
					 $imagename = $result[0]['ticket_pocket_nos']; ?>
					<li id="ticket_pocket" class="customizeoption" name="ticket_pocket_no-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Ticket No"/> <span>Ticket None</span> </a> </li>
					<?php } ?>
					
					
					
					<?php if($result[0]['sleeve_buttons_working']) { 
					$imagename = $result[0]['sleeve_buttons_working']; ?>
					<li id="sleeve" class="customizeoption" name="sleeve_buttons_working-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Sleeve Button Working"/> <span>Working</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['sleeve_buttons_overlapping']) { 
					$imagename = $result[0]['sleeve_buttons_overlappings']; ?>
					<li id="sleeve" class="customizeoption" name="sleeve_buttons_overlapping-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Covered.jpg"  alt="Sleeve Button Working"/> <span>Overlapping</span> </a> </li>
					<?php } ?>
					
					
					<?php if($result[0]['lapel_buttonhole_yes']) { 
					$imagename = $result[0]['lapel_buttonhole_yes']; ?>
					<li id="buttonhole" class="customizeoption" name="lapel_buttonhole_yes-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Covered.jpg"  alt="Buttonhole"/> <span>Buttonhole</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['lapel_buttonhole_no']) { 
					 $imagename = $result[0]['lapel_buttonhole_nos']; ?>
					<li id="buttonhole" class="customizeoption" name="lapel_buttonhole_no-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Covered.jpg"  alt="Buttonhole None"/> <span>Buttonhole None</span> </a> </li>
					<?php } ?>
					
					
					<?php if($result[0]['inner_linings']) { 
					$imagename = $result[0]['inner_linings']; ?>
					<li id="inner_lining" class="front customizeoption" name="inner_linings-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Inter lining"/> <span>Inter lining</span> </a> </li>
					<?php } ?>
				</ul>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".threepiece").click(function(){
						$(".link").show();
					});
					$(".twopiece").click(function(){
						$(".link").hide();
					});
				});
			</script>
			
			<div style="float:right; width:100%;text-align:center">
				<form action="showcustomization.php" method="post">
					<input type="hidden" name="type" value="suit" />
					<input type="submit" name="submit" value="Save" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="link btn" style="display:none;" href="showcustomization.php?productid=<?php echo $_REQUEST['productid'];?>&type=suit&act=piece&back=true">Next</a>
				</form>
			</div>
			
<script type="text/javascript">
		$(document).ready(function() {
		  $('#customize-icon li').click(function() {
			var pid = <?php echo $_REQUEST['productid'];?>;
			var eleid = $(this).attr("id");
			var class1 = $(this).attr("class");
			var image1 = $(this).attr("name");
			var dataString =  'id=' + eleid + '&class=' + class1 + '&image=' + image1 + '&pid=' +pid  + '&type=suit';
			
			//alert(dataString);	
			$.ajax({
				type: "GET",
				url: "changecustomize.php",
				data: dataString,
				cache: false,
				success: function(){
				//alert(html);	  
				}
			   });
			   
			 return false;
			 });
		  });
	</script>	
	<?php }?>
				<?php if($_REQUEST['back']=='true'){?>
			
			<script type="text/javascript">
				$(document).ready(function() {
				  $('#customize li').click(function() {
						//alert("hi");
					 var eleid = $(this).attr("id");
					 var dataString =  'eleid=' + eleid ;
					 //alert(dataString);
					  $('#customize-icon li').hide();
					  $('#customize-icon li#'+eleid).show();
					  $("#customize li").removeClass("active");
					  $("#"+eleid).addClass("active");
					 });
				 var eleid = $(this).attr("id");
				 var dataString =  'eleid=vest_button';
				  $('#customize-icon li').hide();
				  
				  <?php if($_REQUEST['act']=='vest_back'){?>
				  $('#customize-icon li#vests_back').show();
				  $("#vests_back").addClass("active");
				  <?php }elseif($_REQUEST['act']=='vest_pocket'){?>
				  $('#customize-icon li#vests_pocket').show();
				  $("#vests_pocket").addClass("active");
				  <?php }elseif($_REQUEST['act']=='vest_breast_pocket'){?>
				  $('#customize-icon li#vests_breat_pocket').show();
				  $("#vests_breat_pocket").addClass("active");
				  <?php }else{?>
				  $('#customize-icon li#vests_button').show();
				  $("#vests_button").addClass("active");
				  <?php }?>
				});
			</script>
			<script type="text/javascript">
				$(document).ready(function() {
				  $('#customize-icon li').click(function() {
					var pid = <?php echo $_REQUEST['productid'];?>;
					var eleid = $(this).attr("id");
					var class1 = $(this).attr("class");
					var image1 = $(this).attr("name");
					var dataString =  'id=' + eleid + '&class=' + class1 + '&image=' + image1 + '&pid=' +pid  + '&type=suit';
					
					//alert(dataString);	
					$.ajax({
						type: "GET",
						url: "changecustomize.php",
						data: dataString,
						cache: false,
						success: function(){
						//alert(html);	  
						}
					   });
					   
					 return false;
					 });
				  });
			</script>
			<div class="customize-left-menu">
					<ol id="customize">
						<li id="vests_button" class="front" name="suitveststypediv"><a href="#">1.Buttons</a></li>
						<li id="vests_back" class="inner customizeoption" name="suitvestsbackdiv"><a href="#">2.Back</a></li>
						<li id="vests_pocket" class="front" name="suitvestspocketdiv" ><a href="#">3.Pocket Style</a></li>
						<li id="vests_breat_pocket" class="front" name="suitvestsbreastdiv"><a href="#">4.Breast Pocket</a></li>
						<li>&nbsp;</li>
					</ol>
				</div>
			<?php
			//------chk the images for customization------------//
			$sql = "select * from `suitcustomization` where productid = ".$_GET['productid']."";
			$result=$obj_db->select($sql); ?>
			<div class="customize-right-all-icon">
				<ul class="customize-icon" id="customize-icon">
					
					<?php if($result[0]['vests_button_three']) { 
					$imagename = $result[0]['vests_button_three']; ?>
					<li id="vests_button" class="customizeoption" name="vests_button_three-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Straight.jpg"  alt="Button One"/> <span>Button Three</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_button_four']) { 
					$imagename = $result[0]['vests_button_four']; ?>
					<li id="vests_button" class="customizeoption" name="vests_button_four-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Classic.jpg"  alt="Button Two"/> <span>Button Four</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_button_five']) { 
					$imagename = $result[0]['vests_button_five']; ?>
					<li id="vests_button" class="customizeoption" name="vests_button_five-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Button Three"/> <span>Button Five</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_button_six']) { 
					$imagename = $result[0]['vests_button_six']; ?>
					<li id="vests_button" class="customizeoption" name="vests_button_six-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Button Double Breasted"/> <span>Button Six</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_button_seven']) { 
					$imagename = $result[0]['vests_button_seven']; ?>
					<li id="vests_button" class="customizeoption" name="vests_button_seven-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Button Double Breasted"/> <span>Button Seven</span> </a> </li>
					<?php } ?>
					
					
					<?php if($result[0]['vests_back_interlining']) { 
					$imagename = $result[0]['vests_back_interlining']; ?>
					<li id="vests_back" class="customizeoption" name="vests_back_interlining-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Ticket"/> <span>Ticket</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_back_normal']) { 
					 $imagename = $result[0]['vests_back_normal']; ?>
					<li id="vests_back" class="customizeoption" name="vests_back_normal-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Ticket No"/> <span>Ticket None</span> </a> </li>
					<?php } ?>
								
										
					<?php if($result[0]['vests_pocket_straight']) { 
					$imagename = $result[0]['vests_pocket_straight']; ?>
					<li id="vests_pocket" class="customizeoption" name="vests_pocket_straight-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Straight Flap"/> <span>Straight Flap</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_pocket_slanted']) { 
					$imagename = $result[0]['vests_pocket_slanted']; ?>
					<li id="vests_pocket" class="customizeoption" name="vests_pocket_slanted-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Slanted Flap"/> <span>Slanted Flap</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_pocket_piped']) { 
					$imagename = $result[0]['vests_pocket_piped']; ?>
					<li id="vests_pocket" class="customizeoption" name="vests_pocket_piped-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Piped Flap"/> <span>Piped Flap</span> </a> </li>
					<?php } ?>
					
					
					<?php if($result[0]['vests_breast_pocket_yes']) { 
					$imagename = $result[0]['vests_breast_pocket_yes']; ?>
					<li id="vests_breat_pocket" class="customizeoption" name="vests_breast_pocket_yes-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Breast"/> <span>Breast</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_breast_pocket_no']) { 
					 $imagename = $result[0]['vests_breast_pocket_no']; ?>
					<li id="vests_breat_pocket" class="customizeoption" name="breast_pocket_no-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Breast None"/> <span>Breast None</span> </a> </li>
					<?php } ?>
					
					
				</ul>
			</div>
			
			
			
			<div style="float:right; width:100%;text-align:center">
				<form action="showcustomization.php" method="post">
					<input type="hidden" name="type" value="suit" />
					<input type="submit" name="submit" value="Save" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="link btn" href="showcustomization.php?productid=<?php echo $_REQUEST['productid'];?>&type=suit&act=vest_button&front=true">Back</a>
				</form>
			</div>
			
			
			<?php }?>
		</div>
		 <script type="text/javascript">
		 	$(document).ready(function(){
				$(".link").fancybox();
			});
		 </script>
<?php }?>







	
	
</div>
</body>
</html>