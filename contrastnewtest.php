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
					<li><a href="#" class="lastname" ></a></li>
					<li><a href="#">CUSTOMIZE</a></li>
					<li class="last"><a href="#">CONTRAST</a></li>
					
				</ul>
			</div>
			<div class="customize-left-menu">
				<ol id="customize">
					<li id="fabric" class="active" name="fitdiv"><a href="#">1.FABRIC</a></li>
					<!--<li id="style" name="stylediv" ><a href="#">2.Style</a></li>-->
					<li id="location" name="locationdiv"><a href="#">2.LOCATION</a></li>
					<!--<li id="front" name="frontdiv"><a href="#">3.PLACKET</a></li>-->
					<!--<li id="cuff" name="cuffdiv"><a href="#">4.CUFF</a></li>
					<li id="pocket" name="pocketdiv"><a href="#">5.POCKET</a></li>
					<li id="front" name="frontdiv"><a href="#">6.PLACKET</a></li>
					<li id="back" name="backdiv"><a href="#">7.BACK</a></li>-->
					<li>&nbsp;</li>
				</ol>
			</div>
			<?php
//------chk the images for customization------------//
$sql = "select * from `shirtcustomization` where productid = ".$_GET['productid']."";
$result=$obj_db->select($sql); 

$productsql = "select * from `product` where producttypeid = 3 ";
$productresult=$obj_db->select($productsql); 

?>
			<div class="customize-right-all-icon">
				<ul class="customize-icon" id="customize-icon">
				
					<?php for($i=0;$i<count($productresult);$i++){ ?>
						<li id="fabric" class="<?php echo $productresult[$i]['productid'];?>" name="<?php echo $productresult[$i]['productid'];?>">
						<center><a href="#">
								<img src="admin/upload/image/medthumb/<?php echo $productresult[$i]['image'];?>"  alt="<?php echo $productresult[$i]['productname'];?>" height="70"/></a>
						</center>
							<span><?php echo $productresult[$i]['productname'];?></span>
						 </li>
					<?php } ?>
	
					
					
					<li id="location"  name="collar"> <a href="#"> <img src="images/Customization/COLLAR/Straight.jpg"  alt="Straight Collar"/> <span>Collar </span> </a> </li>
					
					
					<li id="location"  name="cuff"> <a href="#"> <img src="images/Customization/CUFF/Single button miter.jpg"  alt="Classic Collar"/> <span>Cuff </span> </a> </li>
					
					<li id="location"  name="placket"> <a href="#"> <img src="images/Customization/FRONT/Placket.jpg" alt="Spread Collar"/> <span>Placket </span> </a> </li>
					
									
				</ul>
			</div>
		</div>
		<div class="inner-page-right" >
			<div class="Products-title">
	<h1><?php echo $productresult[0]['productname']?></h1>
</div>
<div class="Products-price">
	<h2><span class="WebRupee">Rs</span> <?php echo $productresult[0]['price']?></h2>
</div>

<div class="Products-image" id=""> 
<div id="fabric_design_details_middle_picture_view1" class="">
<!----------------fit ----------------->
<img id="0" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['fitimage']; ?>" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 0;">

<!----------------Style---------------->
<img id="2" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['styleimage']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 2;">

<!----------------pocket---------------->
<img id="3" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pocketimage']; ?>" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 3;">


<!----------------Blank---------------->
<img id="20" src="images/shirts/rounded_files/shirtimage/blank.gif" name="undefined" title="undefined" style="position: absolute; display: block; z-index: 20;">
<img id="19" src="images/shirts/rounded_files/shirtimage/blank.gif" name="undefined" title="undefined" style="position: absolute; display: block; z-index: 19;">
<img id="18" src="images/shirts/rounded_files/shirtimage/blank.gif" name="sewn in" title="sewn in" style="position: absolute; display: block; z-index: 18;">
<img id="4" src="images/shirts/rounded_files/shirtimage/blank.gif" name="noloops" title="noloops" style="position: absolute; display: block; z-index: 4;">

<div id="Products-imagecuff" > 
<!----------------Cuff---------------->
<img id="5" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['cuffimage']; ?>" name="1buttonangle" title="Peace Maker" style="position: absolute; display: block; z-index: 5;">
</div>

<div id="Products-imageplacket" > 
<!----------------front placket-------------imageplacket--->
<img id="11" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['frontimageplacket']; ?>" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 11;">
</div>


<div id="Products-image" > 
<!----------------collar---------------->
<img id="14" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['collarimage']; ?>" name="classic" title="Peace Maker" style="position: absolute; display: block; z-index: 14;">
</div>

</div>
</div>


<div class="button-div">				
				<div class="add-to-bag"><a href="confirmmsg.php?acn=addtobag" id="confirm" class="confirm">ADD TO BAG</a></div>
				<div class="wishlist"><a href="#">WISHLIST</a></div>
				<!--<div class="customize"><a href="confirmmsg.php" id="confirm" class="confirm">Finish</a></div>-->
			</div>
			
<div class="Products-description">
	<?php echo $productresult[0]['discription']?>
</div>
<div class="inner-social-div"><img src="images/social-icon.jpg" alt="Social Icon" /></div>
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
 var dataString =  'eleid=fabric';
  $('#customize-icon li').hide();
  $('#customize-icon li#fabric').show();
  $("#fabric").addClass("active");
});
</script>




<!--script for customizaion to chnge the shirt image -->

<script type="text/javascript">
$(document).ready(function() {
  $('#customize-icon li#fabric').click(function() {
	var eleid = $(this).attr("id");
	var class1 = $(this).attr("class");
	var image1 = $(this).attr("name");
 	var dataString =  'id=' + eleid + '&class=' + class1 + '&image=' + image1;
	
	//$("#customize-icon li#"+eleid).removeClass($(this).attr("name"));
	$("#customize-icon li#location").removeClass();
	//$("#customize-icon li#front").removeClass();
	//$(this).addClass("active");
	$("#customize-icon li#location").addClass($(this).attr("name"));
	//$("#customize-icon li#front").addClass($(this).attr("name"));
	
 	alert(dataString);
	 return false;
	
	
	 });
	 
$('#customize-icon li#location').click(function() {
	var eleid = $(this).attr("id");
	var class1 = $(this).attr("class");
	var image1 = $(this).attr("name");
 	var dataString =  'id=' + eleid + '&class=' + class1 + '&image=' + image1;
	
	
 	alert(dataString);



	if(image1=='collar') {
	//$(this).addClass($("#collarfabric").addClass($(this).attr("class")));
	
	$.ajax({
        type: "GET",
        url: "makeshirtcontrast.php",
        data: dataString,
        cache: false,
        success: function(html){
          $("#Products-image").empty().fadeOut(300);
		  $("#Products-image").html(html).fadeIn(300);
		  $('#loding_img').fadeOut(300);
		  
		  	var collarfabricclass = $("#collarfabric").attr("class");
			var collarfabricname = $("#collarfabric").attr("name");
			//alert(collarfabricclass+"--"+collarfabricname);
			var thisclass = class1;
							//alert(thisclass);

			if(collarfabricclass==thisclass){
				alert("c1");
				$(this).removeClass(thisclass);
				//$("#customize-icon li#"+eleid).addClass(collarfabricname);
				}
			if(collarfabricname==thisclass){
								alert("c2");

				$("#eleid").removeClass(thisclass);
				//$("#eleid").addClass(collarfabricclass);

				}
        }
       });
	}
	
	if(image1=='cuff') {
	$.ajax({
        type: "GET",
        url: "makeshirtcontrast.php",
        data: dataString,
        cache: false,
        success: function(html){
          $("#Products-imagecuff").empty().fadeOut(300);
		  $("#Products-imagecuff").html(html).fadeIn(300);
		  $('#loding_img').fadeOut(300);
        }
       });
	}
	
	if(image1=='placket') {
	$.ajax({
        type: "GET",
        url: "makeshirtcontrast.php",
        data: dataString,
        cache: false,
        success: function(html){
          $("#Products-imageplacket").empty().fadeOut(300);
		  $("#Products-imageplacket").html(html).fadeIn(300);
		  $('#loding_img').fadeOut(300);
        }
       });
	}
	 return false;
	 });
	 
  });
</script>