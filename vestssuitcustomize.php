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
<title>Zymba | Suit Customize</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
				<ul>
					<li><a href="#">Vests Suit</a></li>
					<li class="last"><a href="#">JOAKIM MARCKO</a></li>
				</ul>
			</div>
	</div>
</div>	
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left">
			<!--<div class="inner-title">
				<ul>
					<li><a href="#">Vests Suit</a></li>
					<li class="last"><a href="#">JOAKIM MARCKO</a></li>
				</ul>
			</div>-->
			<div class="customize-left-menu">
				<ol id="customize">
					<li id="suitveststype" class="front active" name="suitveststypediv"><a href="#">1.Buttons</a></li>
					<li id="suitvestsback" class="inner customizeoption" name="suitvestsbackdiv"><a href="#">2.Back</a></li>
					<li id="suitvestspocket" class="front" name="suitvestspocketdiv" ><a href="#">3.Pocket Style</a></li>
					<li id="suitvestsbreast" class="front" name="suitvestsbreastdiv"><a href="#">4.Breast Pocket</a></li>
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
					<li id="suitveststype" class="customizeoption" name="vests_button_three-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Straight.jpg"  alt="Button One"/> <span>Button Three</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_button_four']) { 
					$imagename = $result[0]['vests_button_four']; ?>
					<li id="suitveststype" class="customizeoption" name="vests_button_four-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Classic.jpg"  alt="Button Two"/> <span>Button Four</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_button_five']) { 
					$imagename = $result[0]['vests_button_five']; ?>
					<li id="suitveststype" class="customizeoption" name="vests_button_five-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Button Three"/> <span>Button Five</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_button_six']) { 
					$imagename = $result[0]['vests_button_six']; ?>
					<li id="suitveststype" class="customizeoption" name="vests_button_six-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Button Double Breasted"/> <span>Button Six</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_button_seven']) { 
					$imagename = $result[0]['vests_button_seven']; ?>
					<li id="suitveststype" class="customizeoption" name="vests_button_seven-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Button Double Breasted"/> <span>Button Seven</span> </a> </li>
					<?php } ?>
					
					
					<?php if($result[0]['vests_back_interlining']) { 
					$imagename = $result[0]['vests_back_interlining']; ?>
					<li id="suitvestsback" class="customizeoption" name="vests_back_interlining-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Ticket"/> <span>Ticket</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_back_normal']) { 
					 $imagename = $result[0]['vests_back_normal']; ?>
					<li id="suitvestsback" class="customizeoption" name="vests_back_normal-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Ticket No"/> <span>Ticket None</span> </a> </li>
					<?php } ?>
								
										
					<?php if($result[0]['vests_pocket_straight']) { 
					$imagename = $result[0]['vests_pocket_straight']; ?>
					<li id="suitvestspocket" class="customizeoption" name="vests_pocket_straight-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Straight Flap"/> <span>Straight Flap</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_pocket_slanted']) { 
					$imagename = $result[0]['vests_pocket_slanted']; ?>
					<li id="suitvestspocket" class="customizeoption" name="vests_pocket_slanted-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Slanted Flap"/> <span>Slanted Flap</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_pocket_piped']) { 
					$imagename = $result[0]['vests_pocket_piped']; ?>
					<li id="suitvestspocket" class="customizeoption" name="vests_pocket_piped-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Piped Flap"/> <span>Piped Flap</span> </a> </li>
					<?php } ?>
					
					
					<?php if($result[0]['vests_breast_pocket_yes']) { 
					$imagename = $result[0]['vests_breast_pocket_yes']; ?>
					<li id="suitvestsbreast" class="customizeoption" name="vests_breast_pocket_yes-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Breast"/> <span>Breast</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['vests_breast_pocket_no']) { 
					 $imagename = $result[0]['vests_breast_pocket_no']; ?>
					<li id="suitvestsbreast" class="customizeoption" name="breast_pocket_no-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Breast None"/> <span>Breast None</span> </a> </li>
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
						url: "makevestssuit.php",
						data: dataString,
						cache: false,
						success: function(html){
						  $("#Products-image").empty().fadeOut(300);
						  $("#Products-image").html(html).fadeIn(300);
						  $('#loding_img').fadeOut(300);
						}
					   });
		});
			var class1 = 'dd';
			var dataString =  'class=' + class1;
			//alert(dataString);
				$.ajax({
						type: "GET",
						url: "makevestssuit.php",
						data: dataString,
						cache: false,
						success: function(html){
						  $("#Products-image").empty().fadeOut(300);
						  $("#Products-image").html(html).fadeIn(300);
						  $('#loding_img').fadeOut(300);
						}
					   });
		$('#customize li.inner').click(function() {
			var class1 = $(this).attr("class");
			var dataString =  'class=' + class1;
			//alert(dataString);
				$.ajax({
						type: "GET",
						url: "makevestssuit.php",
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
 var dataString =  'eleid=suitveststype';
  $('#customize-icon li').hide();
  $('#customize-icon li#suitveststype').show();
  $("#suitveststype").addClass("active");
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
        url: "makevestssuit.php",
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
        url: "makevestssuit.php",
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
$_SESSION['suitvestsbuttonimage'] = $result[0]['vests_button_three'];

$_SESSION['suitvestsbackimage'] = $result[0]['vests_back_interlining'];

$_SESSION['suitvestspocketimage'] = $result[0]['vests_pocket_straight'];

$_SESSION['suitvestsbreatimage'] = $result[0]['vests_breast_pocket_yes'];
			


$_SESSION['suitveststype'] = 'vests_button_three';
$_SESSION['suitvestsbacktype'] = 'vests_back_interlining';
$_SESSION['suitvestspockettype'] = 'vests_pocket_straight';
$_SESSION['suitvestsbreasttype'] = 'vests_breast_pocket_yes';
?>
