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
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-3c1315b-bbbc-86a8-333e-a9b9a410a83b", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
			<ul>
				<li><a href="#">Suit</a></li>
				<li><a href="#">JOAKIM MARCKO</a></li>
				<li class="last"><a href="#">CUSTOMIZE</a></li>
			</ul>
		</div>
	</div>
</div>	
<div class="wrapper">
	<div class="middle">
		<!--<div class="inner-title">
			<ul>
				<li><a href="#">Suit</a></li>
				<li><a href="#">JOAKIM MARCKO</a></li>
				<li class="last"><a href="#">CUSTOMIZE</a></li>
			</ul>
		</div>-->
		<div class="inner-page-left">
			<div class="customize-left-menu">
				<ol id="customize">
					<li id="suittype" class="back active" name="suittypediv"><a href="#">1.Suit Type</a></li>
					<li id="lapel" class="back" name="lapeldiv"><a href="#">2.Lapel</a></li>
					<li id="vents" class="inner customizeoption" name="ventsdiv" ><a href="#">3.Vents</a></li>
					<li id="button" class="back" name="buttondiv"><a href="#">4.Buttons</a></li>
					<li id="frontpocket" class="back" name="frontpocketdiv"><a href="#">5.Pocket Style</a></li>
					<li id="breast" class="back"  name="breastdiv"><a href="#">6.Breast Pocket</a></li>
					<li id="ticket" class="back" name="ticketdiv"><a href="#">7.Ticket Pocket</a></li>
					<li id="sleevebuttons" class="back" name="sleevebuttonsdiv"><a href="#" title="Sleeve Buttons">8.Sleeve</a></li>
					<li id="buttonhole" class="back" name="buttonholediv"><a href="#">9.Buttonhole</a></li>
					<li id="interlinig" class="front customizeoption" name="interlinigdiv"><a href="#">10.Inter Lining</a></li>					
					<li>&nbsp;</li>
				</ol>
			</div>
			<?php
//------chk the images for customization------------//
$sql = "select * from `suitcustomization` where productid = ".$_GET['productid']."";
$result=$obj_db->select($sql); ?>
			<div class="customize-right-all-icon">
				<ul class="customize-icon" id="customize-icon">
					<?php //if($result[0]['two_piece']) { 
					$imagename = $result[0]['two_piece']; ?>
					<li id="suittype" class="customizeoption" name = "two_piece-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Loose fit.jpg"  alt="Three piece"/> <span>Two Piece</span> </a> </li>
					<?php //} ?>
					<?php if($result[0]['three_piece']) { 
					$imagename = $result[0]['three_piece']; ?>
					<li id="suittype" class="customizeoption" name = "three_piece-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/Fit/Loose fit.jpg"  alt="Three piece"/> <span>Three Piece</span> </a> </li>
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
					$imagename = $result[0]['button_one']; ?>
					<li id="button" class="customizeoption" name="button_one-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Straight.jpg"  alt="Button One"/> <span>Button One</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['button_two']) { 
					$imagename = $result[0]['button_twos']; ?>
					<li id="button" class="customizeoption" name="button_two-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Classic.jpg"  alt="Button Two"/> <span>Button Two</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['button_three']) { 
					$imagename = $result[0]['button_threes']; ?>
					<li id="button" class="customizeoption" name="button_three-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Button Three"/> <span>Button Three</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['button_double_breasted']) { 
					$imagename = $result[0]['button_double_breasteds']; ?>
					<li id="button" class="customizeoption" name="button_double_breasted-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/COLLAR/Spread.jpg"  alt="Button Double Breasted"/> <span>Double Breasted</span> </a> </li>
					<?php } ?>
								
										
					<?php if($result[0]['pocket_straight_flap']) { 
					$imagename = $result[0]['pocket_straight_flap']; ?>
					<li id="frontpocket" class="customizeoption" name="pocket_straight_flap-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Straight Flap"/> <span>Straight Flap</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['pocket_slanted_flap']) { 
					$imagename = $result[0]['pocket_slanted_flaps']; ?>
					<li id="frontpocket" class="customizeoption" name="pocket_slanted_flap-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Slanted Flap"/> <span>Slanted Flap</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['pocket_piped_flap']) { 
					$imagename = $result[0]['pocket_piped_flaps']; ?>
					<li id="frontpocket" class="customizeoption" name="pocket_piped_flap-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/French Miter.jpg"  alt="Piped Flap"/> <span>Piped Flap</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['pocket_patch_flap']) { 
					$imagename = $result[0]['pocket_patch_flaps']; ?>
					<li id="frontpocket" class="customizeoption" name="pocket_patch_flap-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/CUFF/Single button round.jpg"  alt="Patch Flap"/> <span>Patch Flap</span> </a> </li>
					<?php } ?>
					
					
					
					<?php if($result[0]['breast_pocket_yes']) { 
					$imagename = $result[0]['breast_pocket_yes']; ?>
					<li id="breast" class="customizeoption" name="breast_pocket_yes-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Breast"/> <span>Breast</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['breast_pocket_no']) { 
					 $imagename = $result[0]['breast_pocket_nos']; ?>
					<li id="breast" class="customizeoption" name="breast_pocket_no-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Breast None"/> <span>Breast None</span> </a> </li>
					<?php } ?>
					
					
					<?php if($result[0]['ticket_pocket_yes']) { 
					$imagename = $result[0]['ticket_pocket_yes']; ?>
					<li id="ticket" class="customizeoption" name="ticket_pocket_yes-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Ticket"/> <span>Ticket</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['ticket_pocket_no']) { 
					 $imagename = $result[0]['ticket_pocket_nos']; ?>
					<li id="ticket" class="customizeoption" name="ticket_pocket_no-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Ticket No"/> <span>Ticket None</span> </a> </li>
					<?php } ?>
					
					
					
					<?php if($result[0]['sleeve_buttons_working']) { 
					$imagename = $result[0]['sleeve_buttons_working']; ?>
					<li id="sleevebuttons" class="customizeoption" name="sleeve_buttons_working-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg"  alt="Sleeve Button Working"/> <span>Working</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['sleeve_buttons_overlapping']) { 
					$imagename = $result[0]['sleeve_buttons_overlappings']; ?>
					<li id="sleevebuttons" class="customizeoption" name="sleeve_buttons_overlapping-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/FRONT/Covered.jpg"  alt="Sleeve Button Working"/> <span>Overlapping</span> </a> </li>
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
					<li id="interlinig" class="front customizeoption" name="inner_linings-<?php echo $imagename;?>"> <a href="#"> <img src="images/Customization/BACK/Side Pleats.jpg"  alt="Inter lining"/> <span>Inter lining</span> </a> </li>
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
						url: "makesuit.php",
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
						url: "makesuit.php",
						data: dataString,
						cache: false,
						success: function(html){
						  $("#Products-image").empty().fadeOut(300);
						  $("#Products-image").html(html).fadeIn(300);
						  $('#loding_img').fadeOut(300);
						}
					   });
		});
		$('#customize li.inner').click(function() {
			var class1 = $(this).attr("class");
			var dataString =  'class=' + class1;
			//alert(dataString);
				$.ajax({
						type: "GET",
						url: "makesuit.php",
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
 var dataString =  'eleid=suittype';
  $('#customize-icon li').hide();
  $('#customize-icon li#suittype').show();
  $("#suittype").addClass("active");
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
        url: "makesuit.php",
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
        url: "makesuit.php",
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
$_SESSION['pieceimage'] = $result[0]['two_piece'];

$_SESSION['suittypeimage'] = $result[0]['type_peak_lapel'];

$_SESSION['suitventsimage'] = $result[0]['vents_one'];

$_SESSION['suitbuttonimage'] = $result[0]['button_one'];
			
$_SESSION['suitfrontpocketimage'] = $result[0]['pocket_straight_flap'];

$_SESSION['suitbreastimage'] = $result[0]['breast_pocket_yes'];

$_SESSION['suittiecketimage'] = $result[0]['ticket_pocket_yes'];

$_SESSION['suitsleevebuttonimage'] = $result[0]['sleeve_buttons_working'];

$_SESSION['suitbuttonholeimage'] = $result[0]['lapel_buttonhole_yes'];

$_SESSION['suitinnerliningimage'] = $result[0]['inner_linings'];



$_SESSION['piecetype'] = 'two_piece';
$_SESSION['suittype'] = 'type_peak_lapel';
$_SESSION['suitventstype'] = 'vents_one';
$_SESSION['suitbuttontype'] = 'button_one';
$_SESSION['suitfrontpockettype'] = 'pocket_straight_flap';
$_SESSION['suitbreaststype'] = 'breast_pocket_yes';
$_SESSION['suittickettype'] = 'ticket_pocket_yes';
$_SESSION['suitsleevebuttontype'] = 'sleeve_buttons_working';
$_SESSION['suitbuttonholetype'] = 'lapel_buttonhole_yes';
$_SESSION['suitinnerliningtype'] = 'inner_linings';
?>
