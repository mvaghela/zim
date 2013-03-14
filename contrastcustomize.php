<?php include("system/config.inc.php"); 
$productsql = "SELECT * FROM `product` WHERE `productid`='".$_REQUEST['productid']."'"; 
$productresult = $obj_db->select($productsql);
//$_SESSION['product'] = $productresult[0]['uniqname'];
$_SESSION['product'] = $productresult[0]['productid'];
$_SESSION['productid'] = $productresult[0]['productid'];
//echo $_SESSION['product'];
$_SESSION['contrastfabriccollar'] = 'yes';
$_SESSION['contrastfabriccuff'] = 'no';
$_SESSION['contrastfabricplacket'] = 'no';

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
				<li><a href="shirt.php" class="lastname" ><?php echo $productresult[0]['productname']?></a></li>
				<li><a href="customize.php?productid=<?php echo $_SESSION['productid'];?>">CUSTOMIZE</a></li>
				<li class="last"><a href="#">CONTRAST</a></li>
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
				<li><a href="#">CUSTOMIZE</a></li>
				<li class="last"><a href="#">CONTRAST</a></li>
			</ul>
		</div>-->
		<div class="inner-page-left">
			<div class="customize-left-menu">
				<ol id="customize">
					<li id="fabric" class="active" name="fitdiv"><a href="#">CONTRAST</a></li>
					<li>&nbsp;</li>
				</ol>
			</div>
			<?php
//------chk the images for customization------------//
$sql = "select * from `shirtcustomization` where productid = ".$_GET['productid']."";
$result=$obj_db->select($sql); 

$productsqlshirt = "select * from `product` where producttypeid = 3 ";
$productresultshirt=$obj_db->select($productsqlshirt); 

?>
			<div class="customize-right-all-icon">
				<ul class="customize-icon-fabric" id="customize-icon-fabric">
					<li id="collar" class="location active"  name="<?php echo $_SESSION['productid'];?>">
						<div class="inner-div"> 
							<a href="#"> 
								<img src="images/Customization/COLLAR/Straight.jpg"  alt="Straight Collar"/> 
									<span>Collar </span> 
							</a> 
						</div>	
					</li>
					<?php if($_SESSION['sleevetypeshirt']!='half'){?>
					<li id="cuff" class="location" name="<?php echo $_SESSION['productid'];?>"> 
						<div class="inner-div">
							<a href="#"> 
								<img src="images/Customization/CUFF/Single button miter.jpg"  alt="Classic Collar"/> 
									<span>Cuff </span> 
							</a> 
						</div>		
					</li>
					<?php } ?>
					<li id="placket"  class="location" name="<?php echo $_SESSION['productid'];?>"> 
						<div class="inner-div">
							<a href="#"> 
								<img src="images/Customization/FRONT/Placket.jpg" alt="Spread Collar"/> 
									<span>Placket </span> 
							</a> 
						</div>		
					</li>
					
					<span id="default" name="<?php echo $_SESSION['productid']; ?>" class="location">&nbsp;</span>

				</ul>
				
				<ul class="customize-icon" id="customize-icon">
					<?php for($i=0;$i<count($productresultshirt);$i++){ ?>
					<li class="fabric" id="<?php echo $productresultshirt[$i]['productid'];?>" name="<?php echo $productresultshirt[$i]['productid'];?>">
						<div class="inner-div">
						<center>
							<a href="#"> <img src="admin/upload/image/medthumb/<?php echo $productresultshirt[$i]['image'];?>"  alt="<?php echo $productresultshirt[$i]['productname'];?>" height="70"/></a>
						</center>
						<span><?php echo $productresultshirt[$i]['productname'];?></span> 
						</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="inner-page-right" >
			<div class="Products-title">
				<h1><?php echo $productresult[0]['productname']?></h1>
			</div>
			<div class="Products-price">
				<h2><span class="WebRupee">$ </span> <?php echo $productresult[0]['price']?></h2>
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
				<div class="add-to-bag"><a href="customize.php?productid=<?php echo $_SESSION['product'];?>" class="btn">« Prev</a></div>
				<div class="add-to-bag"><a href="monogramshirt.php?productid=<?php echo $_SESSION['product'];?>" class="btn">Next »</a></div>
				<!--<div class="customize"><a href="confirmmsg.php" id="confirm" class="confirm">Finish</a></div>--> 
			</div>
			<div class="Products-description"> <?php echo $productresult[0]['discription']?> </div>
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
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>

<!--script for customizaion to chnge the shirt image -->

<script type="text/javascript">
$(document).ready(function() {
  $('#customize-icon-fabric li').click(function() {
	var eleid = $(this).attr("id");
	var class1 = $(this).attr("class");
	var image1 = $(this).attr("name");
	var fabricid = $("#customize-icon-fabric span#default").attr("name");

 	var dataString =  'id=' + eleid + '&class=' + class1 + '&image=' + image1 + '&fabricid=' + fabricid ;
	var thisvar = $(this);
	//alert(dataString);
	/*if(<?php echo $_SESSION['productid'];?>==image1) {
		alert("select fabric");
	}*/
	if(class1=="location active"){
		$(this).removeClass("active");
	} else {	
		$(this).addClass("active");
	}
	//$(this).addClass("active");
	if (eleid=='collar') {
			$.ajax({
				type: "GET",
				url: "makeshirtcontrast.php",
				data: dataString,
				cache: false,
				success: function(html){
				  $("#Products-image").empty().fadeOut(300);
				  $("#Products-image").html(html).fadeIn(300);
				  
				  
						var collarfabricclass = $("#collarfabric").attr("class");
						var collarfabricname = $("#collarfabric").attr("name");
						var thisclass = image1;
							if(collarfabricname==thisclass){
								$(thisvar).attr("name",collarfabricclass);
								}
							if(image1==<?php echo $_SESSION['productid'];?>){
									$(thisvar).attr("name",$("#default").attr("name"));	
								}
		
				}
			   });
	}
	
		if(eleid=='cuff') {
				$.ajax({
				type: "GET",
				url: "makeshirtcontrast.php",
				data: dataString,
				cache: false,
				success: function(html){
				  $("#Products-imagecuff").empty().fadeOut(300);
				  $("#Products-imagecuff").html(html).fadeIn(300);
				  
				  
						var collarfabricclass = $("#collarfabric").attr("class");
						var collarfabricname = $("#collarfabric").attr("name");
						var thisclass = image1;
							if(collarfabricname==thisclass){
								$(thisvar).attr("name",collarfabricclass);
								}
							if(image1==<?php echo $_SESSION['productid'];?>){
									$(thisvar).attr("name",$("#default").attr("name"));	
								}
		
				}
			   });
	}
	
		if(eleid=='placket') {
				$.ajax({
				type: "GET",
				url: "makeshirtcontrast.php",
				data: dataString,
				cache: false,
				success: function(html){
				  $("#Products-imageplacket").empty().fadeOut(300);
				  $("#Products-imageplacket").html(html).fadeIn(300);
				  
				  
						var collarfabricclass = $("#collarfabric").attr("class");
						var collarfabricname = $("#collarfabric").attr("name");
						var thisclass = image1;
							if(collarfabricname==thisclass){
								$(thisvar).attr("name",collarfabricclass);
								}
							if(image1==<?php echo $_SESSION['productid'];?>){
									$(thisvar).attr("name",$("#default").attr("name"));	
								}
		
				}
			   });
	}
	
	 return false;
	 });
  });
</script>


<script type="text/javascript">
$(document).ready(function() {
  $('#customize-icon li.fabric').click(function() {
	var eleid = $(this).attr("id");
	var class1 = $(this).attr("class");
	var image1 = $(this).attr("name");
	
	$("#customize-icon-fabric li").attr("name",eleid);
	$("#customize-icon-fabric span#default").attr("name",eleid);
	
	var fabricid = $("#customize-icon-fabric span#default").attr("name");
 	var dataString =  'id=' + eleid + '&class=' + class1 + '&image=' + image1 + '&fabricid=' + fabricid;

	$("#customize-icon li").removeClass("active");
	$(this).addClass("active");
	//$(this).css({"margin-bottom":"6px","margin-left":"10px"});

 	//alert(dataString);
		$.ajax({
        type: "GET",
        url: "makeshirtcontrast.php",
        data: dataString,
        cache: false,
        success: function(html){
		  		$("#Products-image").empty().fadeOut(300);
		  		$("#Products-image").html(html).fadeIn(300);
				
				if(image1==$("#default").attr("name")){
					$("#customize-icon-fabric li#collar").attr("name",<?php echo $_SESSION['productid'];?>);	
				}				

		  
				//$("#Products-imagecuff").empty().fadeOut(300);
				//$("#Products-imagecuff").html(html).fadeIn(300);
				
				//$("#Products-imageplacket").empty().fadeOut(300);
				//$("#Products-imageplacket").html(html).fadeIn(300);
				
        }
       });
	 return false;
	 });
	 
	 var fabricid = $("#customize-icon-fabric span#default").attr("name");
	 var dataString =  'fabricid=' + fabricid ;

	 //alert(dataString);
		 $.ajax({
			type: "GET",
			url: "makeshirtcontrast.php",
			data: dataString,
			cache: false,
			success: function(html){
					
			}
		   });

  });
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".confirm").fancybox();
		//$(".lastname").html("<?//php echo $productresult[0]['productname']?>");
	});
</script>