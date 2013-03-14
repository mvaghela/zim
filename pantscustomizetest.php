<?php include("system/config.inc.php"); 
$productsql = "SELECT * FROM `product` WHERE `productid`='".$_REQUEST['productid']."'"; 
$productresult = $obj_db->select($productsql);
//$_SESSION['product'] = $productresult[0]['uniqname'];
$_SESSION['product'] = $productresult[0]['productid'];
$_SESSION['productid'] = $productresult[0]['productid'];
//echo $_SESSION['product'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Pants Customize</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left">
			<div class="inner-title">
				<ul>
					<li><a href="#">Pants</a></li>
					<li class="last"><a href="#">JOAKIM MARCKO</a></li>
				</ul>
			</div>
			<div class="customize-left-menu">
				<ol id="customize">
					<li id="fit" class="back active" name="fitdiv"><a href="#">1.FIT</a></li>
					<li id="style" name="stylediv" ><a href="#">2.Style</a></li>
					<li id="waist" name="waistdiv"><a href="#">3.Waist</a></li>
					<li id="frontpocket"  name="frontpocketdiv"><a href="#">4.Front Pocket</a></li>
					<li id="pleats"  name="pleatsdiv"><a href="#">5.Pleats</a></li>
					<li id="backpocket" class="front customizeoption" name="backpocketdiv"><a href="#">6.Back Pocket</a></li>
					<li id="backpocketstyle" class="front customizeoption" name="backpocketstylediv"><a href="#">7.Pocket Style</a></li>
					<li id="fly" class="back" name="flydiv"><a href="#">8.Fly</a></li>
					<li id="belt" name="beltdiv"><a href="#">9.Belt Style</a></li>
					
					<li>&nbsp;</li>
				</ol>
			</div>
			<?php
//------chk the images for customization------------//
$sql = "select * from `pantcustomization` where productid = ".$_GET['productid']."";
$result=$obj_db->select($sql); ?>
			<div class="customize-right-all-icon">
				<ul class="customize-icon" id="customize-icon">
					<?php if($result[0]['fit_slimfit']) { 
					$imagename = $result[0]['fit_slimfit']; ?>
					<li id="fit" class="customizeoption" name = "fit_slimfit-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Slim fit.jpg"  alt="Slim Fit"/> <span>Slim Fit</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['fit_normalfit']) { 
					$imagename = $result[0]['fit_normalfit']; ?>
					<li id="fit" class="customizeoption" name = "fit_normalfit-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Normal fit.jpg"  alt="Normal Fit"/> <span>Normal Fit</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['fit_loosefit']) { 
					$imagename = $result[0]['fit_loosefit']; ?>
					<li id="fit" class="customizeoption" name = "fit_loosefit-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Loose fit.jpg"  alt="Loose Fit"/> <span>Loose Fit</span> </a> </li>
					<?php } ?>
					
					
					<?php if($result[0]['style_narrow_fit']) { 
					$imagename =$result[0]['style_narrow_fit']; ?>
					<li id="style" class="customizeoption" name="style_narrow_fit-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Style/Full Sleeve.jpg"  alt="Full Sleeve"/> <span>Narrow Fit</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['style_straight_fit']) { 
					$imagename =$result[0]['style_straight_fit'];
					 ?>
					<li id="style" class="customizeoption" name="style_straight_fit-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Style/Half Sleeve.jpg"  alt="Half Sleeve"/> <span>Straight Fit</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['style_bellbottom_fit']) { 
					$imagename =$result[0]['style_bellbottom_fit'];
					 ?>
					<li id="style" class="customizeoption" name="style_straight_fit-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Style/Half Sleeve.jpg"  alt="Half Sleeve"/> <span>Bellbottom Fit</span> </a> </li>
					<?php } ?>
					
					
					<?php if($result[0]['waist_high']) { 
					$imagename = $result[0]['waist_high']; ?>
					<li id="waist" class="customizeoption" name="waist_high-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Straight.jpg"  alt="Straight Collar"/> <span>High Waist</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['waist_medium']) { 
					$imagename = $result[0]['waist_medium']; ?>
					<li id="waist" class="customizeoption" name="waist_medium-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Classic.jpg"  alt="Classic Collar"/> <span>Medium Waist</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['waist_low']) { 
					$imagename = $result[0]['waist_low']; ?>
					<li id="waist" class="customizeoption" name="waist_low-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Spread Collar"/> <span>Low Waist</span> </a> </li>
					<?php } ?>
										
					<?php if($result[0]['front_cross_pocket']) { 
					$imagename = $result[0]['front_cross_pocket']; ?>
					<li id="frontpocket" class="customizeoption" name="front_cross_pocket-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/pant/pocket/cross.png"  alt="SingleButtonMiter Cuff"/> <span>Cross Pocket</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['front_straight_pocket']) { 
					$imagename = $result[0]['front_straight_pocket']; ?>
					<li id="frontpocket" class="customizeoption" name="front_straight_pocket-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/pant/pocket/straight.png"  alt="DoublButtonMiter Cuff"/> <span>Straight Pocket</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['front_round_pocket']) { 
					$imagename = $result[0]['front_round_pocket']; ?>
					<li id="frontpocket" class="customizeoption" name="front_round_pocket-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="FrenchButtonMiter Cuff"/> <span>Round Pocket</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['front_lshape_pocket']) { 
					$imagename = $result[0]['front_lshape_pocket']; ?>
					<li id="frontpocket" class="customizeoption" name="front_lshape_pocket-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/Single button round.jpg"  alt="SingleButtonRound Cuff"/> <span>L-Shape Pocket</span> </a> </li>
					<?php } ?>
					<?php //if($result[0]['pocket_nopocket']) { 
					$imagename ='' ?>
					<li id="frontpocket" class="customizeoption" name="front_no_pocket-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/POCKET/No Pocket.jpg"  alt="No Pocket"/> <span>No Pocket</span> </a> </li>
					<?php //} ?>
					
					
					
					<?php if($result[0]['pleats_single']) { 
					$imagename = $result[0]['pleats_single']; ?>
					<li id="pleats" class="customizeoption" name="pleats_single-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/pant/pleats/single.png"  alt="Pocket Miter"/> <span>Single Pleats</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['pleats_double']) { 
					 $imagename = $result[0]['pleats_double']; ?>
					<li id="pleats" class="customizeoption" name="pleats_double-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/pant/pleats/double.png"  alt="Pocket Round"/> <span>Double Pleats</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['pleats_single_reserved']) { 
					$imagename = $result[0]['pleats_single_reserved']; ?>
					<li id="pleats" class="customizeoption" name="pleats_single_reserved-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/POCKET/Square.jpg"  alt="Pocket Square"/> <span>Single Reversed</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['pleats_double_reserved']) { 
					$imagename = $result[0]['pleats_double_reserved']; ?>
					<li id="pleats" class="customizeoption" name="pleats_double_reserved-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/POCKET/V-Shape.jpg"  alt="Pocket Vshape"/> <span>Double Reversed</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['pleats_box']) { 
					$imagename = $result[0]['pleats_box']; ?>
					<li id="pleats" class="customizeoption" name="pleats_box-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/POCKET/V-Shape.jpg"  alt="Pocket Vshape"/> <span>Box Pleats</span> </a> </li>
					<?php } ?>
					<?php //if($result[0]['pocket_nopocket']) { 
					$imagename ='' ?>
					<li id="pleats" class="customizeoption" name="pleats_without_box-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/pant/pleats/nopleats.png"  alt="No Pocket"/> <span>No Pleats</span> </a> </li>
					<?php //} ?>
					
					
					<?php if($result[0]['back_pocket_left']) { 
					$imagename = $result[0]['back_pocket_left']; ?>
					<li id="backpocket" class="front customizeoption" name="back_pocket_left-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Front Placket"/> <span>Left Pocket</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['back_pocket_right']) { 
					$imagename = $result[0]['back_pocket_right']; ?>
					<li id="backpocket" class="front customizeoption" name="back_pocket_right-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Covered.jpg"  alt="Front Covered"/> <span>Right Pocket</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['back_pocket_both']) { 
					$imagename = $result[0]['back_pocket_both']; ?>
					<li id="backpocket" class="front customizeoption" name="back_pocket_both-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/No Placket.jpg"  alt="Front No Placket"/> <span>Both Pocket</span> </a> </li>
					<?php } ?>
					<?php //if($result[0]['pocket_nopocket']) { 
					$imagename ='' ?>
					<li id="backpocket" class="front customizeoption" name="back_pocket_none-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/POCKET/No Pocket.jpg"  alt="No Pocket"/> <span>No Pocket</span> </a> </li>
					<?php //} ?>
					
					
					<?php if($result[0]['back_pocket_style_single_withhook']) { 
					$imagename = $result[0]['back_pocket_style_single_withhook']; ?>
					<li id="backpocketstyle" class="front customizeoption" name="back_pocket_style_single_withhook-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Side Pleats"/> <span>Single Hook</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['back_pocket_style_double_withhook']) { 
					$imagename = $result[0]['back_pocket_style_double_withhook']; ?>
					<li id="backpocketstyle" class="front customizeoption" name="back_pocket_style_double_withhook-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/Covered.jpg"  alt="Box Pleats"/> <span>Double Hook</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['back_pocket_style_single_withbuttoned']) { 
					$imagename = $result[0]['back_pocket_style_single_withbuttoned']; ?>
					<li id="backpocketstyle" class="front customizeoption" name="back_pocket_style_single_withbuttoned-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/No Placket.jpg"  alt="No Pleats"/> <span>Single Button</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['back_pocket_style_double_withbuttoned']) { 
					$imagename = $result[0]['back_pocket_style_double_withbuttoned']; ?>
					<li id="backpocketstyle" class="front customizeoption" name="back_pocket_style_double_withbuttoned-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/No Placket.jpg"  alt="No Pleats"/> <span>Double Button</span> </a> </li>
					<?php } ?>
					
					
					
					<?php if($result[0]['fly_buttoned']) { 
					$imagename = $result[0]['fly_buttoned']; ?>
					<li id="fly" class="customizeoption" name="fly_buttoned-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Side Pleats"/> <span>Fly Button</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['fly_zipper']) { 
					$imagename = $result[0]['fly_zipper']; ?>
					<li id="fly" class="customizeoption" name="fly_zipper-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/Covered.jpg"  alt="Box Pleats"/> <span>Zipper Fly</span> </a> </li>
					<?php } ?>
					
					<?php if($result[0]['belt_style_cut_buttoned']) { 
					$imagename = $result[0]['belt_style_cut_buttoned']; ?>
					<li id="belt" class="customizeoption" name="belt_style_cut_buttoned-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Side Pleats"/> <span>Cut Button</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['belt_style_cut_hock']) { 
					$imagename = $result[0]['belt_style_cut_hock']; ?>
					<li id="belt" class="customizeoption" name="back_pocket_style_double_withhook-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/Covered.jpg"  alt="Box Pleats"/> <span>Cut Hock</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['belt_style_long_buttoned']) { 
					$imagename = $result[0]['belt_style_long_buttoned']; ?>
					<li id="belt" class="customizeoption" name="belt_style_long_buttoned-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Side Pleats"/> <span>Long Button</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['belt_style_long_hook']) { 
					$imagename = $result[0]['belt_style_long_hook']; ?>
					<li id="belt" class="customizeoption" name="belt_style_long_hook-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/Covered.jpg"  alt="Box Pleats"/> <span>Long Hock</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['belt_style_long_hook_buttoned']) { 
					$imagename = $result[0]['belt_style_long_hook_buttoned']; ?>
					<li id="belt" class="customizeoption" name="belt_style_long_hook_buttoned-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Side Pleats"/> <span>Hock Button</span> </a> </li>
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


<script type="text/javascript">
	$(document).ready(function() {
		$('#customize li.front').click(function() {
			var class1 = $(this).attr("class");
			var dataString =  'class=' + class1;
			//alert(dataString);
				$.ajax({
						type: "GET",
						url: "makepant.php",
						data: dataString,
						cache: false,
						success: function(html){
						  $("#Products-image").empty().fadeOut(300);
						  $("#Products-image").html(html).fadeIn(300);
						  $('#loding_img').fadeOut(300);
						}
					   });
		});
		$('#customize li.back').click(function() {
			var class1 = $(this).attr("class");
			var dataString =  'class=' + class1;
			//alert(dataString);
				$.ajax({
						type: "GET",
						url: "makepant.php",
						data: dataString,
						cache: false,
						success: function(html){
						  $("#Products-image").empty().fadeOut(300);
						  $("#Products-image").html(html).fadeIn(300);
						  $('#loding_img').fadeOut(300);
						}
					   });
		});
	});
</script>



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
 	//alert(dataString);	
	$.ajax({
        type: "GET",
        url: "makepant.php",
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
        url: "makepant.php",
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

$_SESSION['pantfitimage'] = $result[0]['fit_slimfit'];

$_SESSION['pantstyleimage'] = $result[0]['style_narrow_fit'];

$_SESSION['pantwaistimage'] = $result[0]['waist_high'];
			
$_SESSION['pantfrontpocketimage'] = $result[0]['front_cross_pocket'];

$_SESSION['pantpleatsimage'] = $result[0]['pleats_single'];

$_SESSION['pantbackpocketimage'] = $result[0]['back_pocket_left'];

$_SESSION['pantbackpocketstyleimage'] = $result[0]['back_pocket_style_single_withhook'];

$_SESSION['pantflyimage'] = $result[0]['fly_buttoned'];

$_SESSION['pantbeltimage'] = $result[0]['belt_style_cut_buttoned'];



$_SESSION['pantfittype'] = 'fit_slimfit';
$_SESSION['pantstyletype'] = 'style_narrow_fit';
$_SESSION['pantwaisttype'] = 'waist_high';
$_SESSION['pantfrontpockettype'] = 'front_cross_pocket';
$_SESSION['pantpleatstype'] = 'pleats_single';
$_SESSION['pantbackpockettype'] = 'back_pocket_left';
$_SESSION['pantbackpocketstyletype'] = 'back_pocket_style_single_withhook';
$_SESSION['pantflytype'] = 'fly_buttoned';
$_SESSION['pantbelttype'] = 'belt_style_cut_buttoned';
?>
