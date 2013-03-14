<?php include("system/config.inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Customize</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left">
			<div class="inner-title">
				<ul>
					<li><a href="#">SHIRTS</a></li>
					<li class="last"><a href="#">JOAKIM MARCKO</a></li>
				</ul>
			</div>
			<div class="customize-left-menu">
				<ol id="customize">
					<li id="fit" class="active"><a href="#">1.FIT</a></li>
					<li id="style" ><a href="#">2.Style</a></li>
					<li id="collar"><a href="#">3.COLLAR</a></li>
					<li id="cuff"><a href="#">4.CUFF</a></li>
					<li id="pocket"><a href="#">5.POCKET</a></li>
					<li id="front"><a href="#">6.FRONT</a></li>
					<li id="back"><a href="#">7.BACK</a></li>
					<li>&nbsp;</li>
				</ol>
			</div>
		
		<div id="ajax_customize">
			<!--<div class="customize-right-all-icon">
				<ul class="customize-icon">
					<?php if($result[0]['fit_slimfit']) { ?>
						<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['fit_slimfit'];?>"  alt="Side Pleats"/> <span>Side Pleats</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['fit_normalfit']) { ?>
						<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['fit_normalfit'];?>"  alt="Covered"/> <span>Covered</span> </a> </li>
					<?php } ?>
					<?php if($result[0]['fit_loosefit']) { ?>
						<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['fit_loosefit'];?>"  alt="No Placket"/> <span>No Placket</span> </a> </li>
					<?php } ?>
				</ul>
			</div>-->
		</div>
		</div>
		<div class="inner-page-right">
			<div class="Products-title">
				<h1>JOAKIM MARCKO</h1>
			</div>
			<div class="Products-price">
				<h2><span class="WebRupee">Rs</span>999.00</h2>
			</div>
			<div class="Products-image">
			<img src="images/Products-image.png"  alt="Products Image"/></div>
			<div class="button-div">
				<div class="add-to-bag"><a href="#">ADD TO BAG</a></div>
				<div class="wishlist"><a href="#">WISHLIST</a></div>
				<div class="customize"><a href="#">CUSTOMIZE</a></div>
			</div>
			<div class="Products-description">
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>
			</div>
			<div class="inner-social-div"><img src="images/social-icon.jpg" alt="Social Icon" /></div>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>

<script type="text/javascript">
$(document).ready(function() {
	var productid = <?php echo $_REQUEST['productid']?>;
  $('#customize li').click(function() {
 	//alert("hi");
 var eleid = $(this).attr("id");
 var dataString =  'eleid=' + eleid + '&productid=' + productid;
 //alert(dataString);

$.ajax({
        type: "GET",
        url: "ajax_customize.php",
        data: dataString,
        cache: false,
        success: function(html){
			//alert(dataString);
          $("#ajax_customize").empty().fadeOut(300);
		  $("#ajax_customize").html(html).fadeIn(500);
		  $('#loding_img').fadeOut(300);
		  
		  $("#customize li").removeClass("active");
		  $("#"+eleid).addClass("active");
        }
       });
	   
    return false;
 });
 
 //var eleid = $().attr("id");
 var dataString =  'eleid=fit&productid=' + productid;
 //alert(dataString);

$.ajax({
        type: "GET",
        url: "ajax_customize.php",
        data: dataString,
        cache: false,
        success: function(html){
			//alert(dataString);
          $("#ajax_customize").empty().fadeOut(300);
		  $("#ajax_customize").html(html).fadeIn(500);
		  $('#loding_img').fadeOut(300);
        }
       });
	   

    return false;
 
});

</script>