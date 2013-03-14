<?php include("system/config.inc.php"); 
$productsql = "SELECT * FROM `product` WHERE `productid`='".$_REQUEST['productid']."'"; 
$productresult = $obj_db->select($productsql);
//$_SESSION['product'] = $productresult[0]['uniqname'];
$_SESSION['product'] = $productresult[0]['productid'];
$_SESSION['productid'] = $productresult[0]['productid'];
//echo $_SESSION['product'];
unset($_SESSION['redirecturlusedcustomize']);	
unset($_SESSION['redirecturlsavecust']);	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Customize</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
			<ul>
				<li class="first"><a href="shirt.php">SHIRTS</a></li>
				<li><a href="shirt.php" class="lastname" ><?php echo $productresult[0]['productname'];?></a></li>
				<li class="last"><a href="#">CUSTOMIZE</a></li>
			</ul>
		</div>
	</div>
</div>	
<div class="wrapper">
	<div class="middle">
		<!--<div class="inner-title">
			<ul>
				<li><a href="#">SHIRTS</a></li>
				<li><a href="#" class="lastname" ></a></li>
				<li class="last"><a href="#">CUSTOMIZE</a></li>
			</ul>
		</div>-->
		<div class="inner-page-left">			
			<div class="customize-left-menu">
				<ol id="customize">
					<li id="fit" class="active" name="fitdiv"><a href="#">FIT</a></li>
					<li id="style" name="stylediv" ><a href="#">Style</a></li>
					<li id="collar" name="collardiv"><a href="#">COLLAR</a></li>
					<li id="cuff" name="cuffdiv"><a href="#">CUFF</a></li>
					<li id="pocket" name="pocketdiv"><a href="#">POCKET</a></li>
					<li id="front" name="frontdiv"><a href="#">FRONT</a></li>
					<li id="back" name="backdiv"><a href="#">BACK</a></li>
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
					<li id="fit" class="customizeoption active" name = "fit_slimfit-<?php echo $imagename;?>">
						<div class="inner-div"> <a href="#"> <img src="images/Customization/Fit/Slim fit.jpg"  alt="Slim Fit"/> <span>Slim Fit</span> </a> </div>
					</li>
					<?php } ?>
					<?php if($result[0]['fit_normalfit']) { 
					$imagename = $result[0]['fit_normalfit']; ?>
					<li id="fit" class="customizeoption" name = "fit_normalfit-<?php echo $imagename;?>">
						<div class="inner-div"> <a href="#"> <img src="images/Customization/Fit/Normal fit.jpg"  alt="Normal Fit"/> <span>Normal Fit</span> </a> </div>
					</li>
					<?php } ?>
					<?php if($result[0]['fit_loosefit']) { 
					$imagename = $result[0]['fit_loosefit']; ?>
					<li id="fit" class="customizeoption" name = "fit_loosefit-<?php echo $imagename;?>">
						<div class="inner-div"> <a href="#"> <img src="images/Customization/Fit/Loose fit.jpg"  alt="Loose Fit"/> <span>Loose Fit</span> </a> </div>
					</li>
					<?php } ?>
					<?php if($result[0]['style_full_fit_slimfit_sleeve'] || $result[0]['style_full_fit_normalfit_sleeve'] || $result[0]['style_full_fit_loosefit_sleeve']) { 
					$imagename =$result[0]['style_full_fit_slimfit_sleeve']; ?>
					<li id="style" class="customizeoption" name="full">
						<div class="inner-div"> <a href="#"> <img src="images/Customization/Style/Full Sleeve.jpg"  alt="Full Sleeve"/> <span>Full Sleeve</span> </a> </div>
					</li>
					<?php } ?>
					<?php if($result[0]['style_half_fit_slimfit_sleeve'] || $result[0]['style_half_fit_normalfit_sleeve'] || $result[0]['style_half_fit_loosefit_sleeve']) { 
					$imagename =$result[0]['style_half_fit_slimfit_sleeve'];
					 ?>
					<li id="style" class="customizeoption" name="half">
						<div class="inner-div"> <a href="#"> <img src="images/Customization/Style/Half Sleeve.jpg"  alt="Half Sleeve"/> <span>Half Sleeve</span> </a> </div>
					</li>
					<?php } ?>
					<?php if($result[0]['collar_straight']) { 
					$imagename = $result[0]['collar_straight']; ?>
					<li id="collar" class="customizeoption" name="collar_straight-<?php echo $imagename;?>">
						<div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Straight.jpg"  alt="Straight Collar"/> <span>Straight </span> </a> </div>
					</li>
					<?php } ?>
					<?php if($result[0]['collar_classic']) { 
					$imagename = $result[0]['collar_classic']; ?>
					<li id="collar" class="customizeoption" name="collar_classic-<?php echo $imagename;?>">
						<div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Classic.jpg"  alt="Classic Collar"/> <span>Classic </span> </a> </div>
					</li>
					<?php } ?>
					<?php if($result[0]['collar_spread']) { 
					$imagename = $result[0]['collar_spread']; ?>
					<li id="collar" class="customizeoption" name="collar_spread-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Spread Collar"/> <span>Spread </span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['collar_cutaway']) { 
					$imagename = $result[0]['collar_cutaway']; ?>
					<li id="collar" class="customizeoption" name="collar_cutaway-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Cutaway.jpg"  alt="Cutaway Collar"/> <span>Cutaway </span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['collar_fullcutaway']) { 
					$imagename = $result[0]['collar_fullcutaway']; ?>
					<li id="collar" class="customizeoption" name="collar_fullcutaway-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Full Cutaway.jpg"  alt="Fullcutaway Collar"/> <span>Fullcutaway </span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['collar_englishcutaway']) { 
					$imagename = $result[0]['collar_englishcutaway']; ?>
					<li id="collar" class="customizeoption" name="collar_englishcutaway-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/English Cutaway.jpg"  alt="Englishcutaway Collar"/> <span>Englishcutaway </span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['collar_curvedcutaway']) { 
					$imagename = $result[0]['collar_curvedcutaway']; ?>
					<li id="collar" class="customizeoption" name="collar_curvedcutaway-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Curved Cutaway.jpg"  alt="Curvedcutaway Collar"/> <span>Curvedcutaway </span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['collar_cutawaybutton']) { 
					$imagename = $result[0]['collar_cutawaybutton']; ?>
					<li id="collar" class="customizeoption" name="collar_cutawaybutton-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Cutaway 2 button.jpg"  alt="Cutawaybutton Collar"/> <span>Cutawaybutton </span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['collar_bandedcollar']) { 
					$imagename = $result[0]['collar_bandedcollar']; ?>
					<li id="collar" class="customizeoption" name="collar_bandedcollar-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Banded Collar.jpg"  alt="Banded Collar"/> <span>Banded </span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['collar_wingup']) { 
					$imagename = $result[0]['collar_wingup']; ?>
					<li id="collar" class="customizeoption" name="collar_wingup-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Wing up Tuxedo.jpg"  alt="Wingup Collar"/> <span>Wingup </span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['collar_buttondown']) { 
					$imagename = $result[0]['collar_buttondown']; ?>
					<li id="collar" class="customizeoption" name="collar_buttondown-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Button down.jpg"  alt="Buttondown Collar"/> <span>Buttondown </span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['collar_rounded']) { 
					$imagename = $result[0]['collar_rounded']; ?>
					<li id="collar" class="customizeoption" name="collar_rounded-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/COLLAR/Rounded.jpg"  alt="Rounded Collar"/> <span>Rounded </span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['cuff_singlebuttonmiter']) { ?>
					
					<!--<div id="cuffmsg" class="customizeoption message errormsg" style="display: block;">
							<p>You have selected sleeve option as halfsleeve <br /> so you can't choose cuff for halfsleeve.</p>
						</div>
					<li id="cuff" class="hi" name="hi">
					123
					</li>-->
					
					<?php $imagename = $result[0]['cuff_singlebuttonmiter']; ?>
					<li id="cuff" class="customizeoption cuff" name="cuff_singlebuttonmiter-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Single button miter.jpg"  alt="SingleButtonMiter Cuff"/> <span>Single Miter</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['cuff_doublebuttonmiter']) { 
					$imagename = $result[0]['cuff_doublebuttonmiter']; ?>
					<li id="cuff" class="customizeoption cuff" name="cuff_doublebuttonmiter-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Double button miter.jpg"  alt="DoublButtonMiter Cuff"/> <span>Double Miter</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['cuff_frenchbuttonmiter']) { 
					$imagename = $result[0]['cuff_frenchbuttonmiter']; ?>
					<li id="cuff" class="customizeoption cuff" name="cuff_frenchbuttonmiter-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="FrenchButtonMiter Cuff"/> <span>French Miter</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['cuff_singlebuttonround']) { 
					$imagename = $result[0]['cuff_singlebuttonround']; ?>
					<li id="cuff" class="customizeoption cuff" name="cuff_singlebuttonround-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Single button round.jpg"  alt="SingleButtonRound Cuff"/> <span>Single Round</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['cuff_doublebuttonround']) { 
					$imagename = $result[0]['cuff_doublebuttonround']; ?>
					<li id="cuff" class="customizeoption cuff" name="cuff_doublebuttonround-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Double button round.jpg"  alt="DoubleButtonRound Cuff"/> <span>Double Round</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['cuff_frenchbuttonround']) { 
					$imagename = $result[0]['cuff_frenchbuttonround']; ?>
					<li id="cuff" class="customizeoption cuff" name="cuff_frenchbuttonround-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/French Round.jpg"  alt="FrenchButtonRound Cuff"/> <span>French Round</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['cuff_singlebuttonsquare']) { 
					$imagename = $result[0]['cuff_singlebuttonsquare']; ?>
					<li id="cuff" class="customizeoption cuff" name="cuff_singlebuttonsquare-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Single Button Square.jpg"  alt="SingleButtonSquare Cuff"/> <span>Single Square</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['cuff_doublebuttonsquare']) { 
					$imagename = $result[0]['cuff_doublebuttonsquare']; ?>
					<li id="cuff" class="customizeoption cuff" name="cuff_doublebuttonsquare-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/Double Button Square.jpg"  alt="DoubleButtonSquare Cuff"/> <span>Double Square</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['cuff_frenchbuttonsquare']) { 
					$imagename = $result[0]['cuff_frenchbuttonsquare']; ?>
					<li id="cuff" class="customizeoption cuff" name="cuff_frenchbuttonsquare-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/CUFF/French Square.jpg"  alt="FrenchButtonSquare Cuff"/> <span>French Square</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['pocket_miter']) { 
					$imagename = $result[0]['pocket_miter']; ?>
					<li id="pocket" class="customizeoption" name="pocket_miter-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/Miter.jpg"  alt="Pocket Miter"/> <span>Pocket Miter</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['pocket_round']) { 
					 $imagename = $result[0]['pocket_round']; ?>
					<li id="pocket" class="customizeoption" name="pocket_round-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/Round.jpg"  alt="Pocket Round"/> <span>Pocket Round</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['pocket_square']) { 
					$imagename = $result[0]['pocket_square']; ?>
					<li id="pocket" class="customizeoption" name="pocket_square<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/Square.jpg"  alt="Pocket Square"/> <span>Pocket Square</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['pocket_vshape']) { 
					$imagename = $result[0]['pocket_vshape']; ?>
					<li id="pocket" class="customizeoption" name="pocket_vshape-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/V-Shape.jpg"  alt="Pocket Vshape"/> <span>Pocket Vshape</span> </a> </div> </li>
					<?php } ?>
					<?php //if($result[0]['pocket_nopocket']) { 
					$imagename ='' ?>
					<li id="pocket" class="customizeoption" name="pocket_nopocket-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/POCKET/No Pocket.jpg"  alt="No Pocket"/> <span>No Pocket</span> </a> </div> </li>
					<?php //} ?>
					<?php if($result[0]['front_placket']) { 
					$imagename = $result[0]['front_placket']; ?>
					<li id="front" class="customizeoption" name="front_placket-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Front Placket"/> <span>Front Placket</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['front_covered']) { 
					$imagename = $result[0]['front_covered']; ?>
					<li id="front" class="customizeoption" name="front_covered-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/FRONT/Covered.jpg"  alt="Front Covered"/> <span>Front Covered</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['front_noplacket']) { 
					$imagename = $result[0]['front_noplacket']; ?>
					<li id="front" class="front_noplacket" name="front_noplacket-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/FRONT/No Placket.jpg"  alt="Front No Placket"/> <span>Front No Placket</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['back_sidepleats']) { 
					$imagename = $result[0]['back_sidepleats']; ?>
					<li id="back" class="customizeoption" name="back_sidepleats-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Side Pleats"/> <span>Side Pleats</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['back_boxpleats']) { 
					$imagename = $result[0]['back_boxpleats']; ?>
					<li id="back" class="customizeoption" name="back_boxpleats-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/BACK/Covered.jpg"  alt="Box Pleats"/> <span>Box Pleats</span> </a> </div> </li>
					<?php } ?>
					<?php if($result[0]['back_nopleats']) { 
					$imagename = $result[0]['back_nopleats']; ?>
					<li id="back" class="customizeoption" name="back_nopleats-<?php echo $imagename;?>"> <div class="inner-div"> <a href="#"> <img src="images/Customization/BACK/No Placket.jpg"  alt="No Pleats"/> <span>No Pleats</span> </a> </div> </li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="inner-page-right" id="Products-image">
			<center>
					<div id="loding_img" class="loding_img_2">
						<img src="images/loading1.gif" />
					</div>
			</center>
		</div>
		
		
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>
<!--script for fit,style images -->
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
  $('#customize-icon li#fit').show();
  $("#fit").addClass("active");
});
</script>

<!--script for customizaion to chnge the shirt image -->

<script type="text/javascript">
$(document).ready(function() {
  $('#customize-icon li').click(function() {
	var eleid = $(this).attr("id");
	var class1 = $(this).attr("class");
	var image1 = $(this).attr("name");
 	var dataString =  'id=' + eleid + '&class=' + class1 + '&image=' + image1;
	
	$("#customize-icon li#"+eleid).removeClass("active");
	$(this).addClass("active");
	//$(this).css({"margin-bottom":"6px","margin-left":"10px"});

	
	if(image1=='half') {
		$('.cuff').removeAttr('id');
	}
	
	if(image1=='full') {
		$(".cuff").attr('id', 'cuff');
	}
	
 	//alert(dataString);
	
	$.ajax({
        type: "GET",
        url: "makeshirt.php",
        data: dataString,
        cache: false,
        success: function(html){
          $("#Products-image").empty().fadeOut(300);
		  $("#Products-image").html(html).fadeIn(300);
		  $('#loding_img').fadeOut(300);
        }
       });
	   
	 return false;
	 });
	 
	var eleid = $("#customize-icon li").attr("id");
	var class1 = $("#customize-icon li").attr("class");
	var image1 = $("#customize-icon li").attr("name");
 	var dataString =  'id=' + eleid + '&class=' + class1 + '&image=' + image1;
	
	 $.ajax({
        type: "GET",
        url: "makeshirt.php",
        data: dataString,
        cache: false,
        success: function(html){
			//alert(dataString);
          $("#Products-image").empty().fadeOut(300);
		  $("#Products-image").html(html).fadeIn(300);
		  $('#loding_img').fadeOut(300);
        }
       });
  });
</script>

<!--store by default first value-->

<?php

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

$_SESSION['sleevetypeshirt'] = 'Full';

?>
<script type="text/javascript">
	$(document).ready(function() {
		$(".login_link_h").fancybox();
	});
	$(document).ready(function() {
		$(".register_link_h").fancybox();
	});
	$(document).ready(function() {
			$("#register").fancybox();
		});
</script>
