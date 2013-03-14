<?php include("system/config.inc.php"); 
$productsql = "SELECT * FROM `product` WHERE `productid`='".$_REQUEST['productid']."'"; 
$productresult = $obj_db->select($productsql);
//$_SESSION['product'] = $productresult[0]['uniqname'];
$_SESSION['product'] = $productresult[0]['productid'];
$_SESSION['productid'] = $productresult[0]['productid'];

$_SESSION['monogramprice'] = $productresult[0]['price'];
$_SESSION['monogrampricenew'] = $productresult[0]['price'];
unset($_SESSION['redirecturlusedcustomize']);	
unset($_SESSION['redirecturlsavecust']);	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | MONOGRAM </title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
				<ul>
					<li class="first"><a href="shirt.php">SHIRTS</a></li>
					<li><a href="shirt.php" class="lastname" ><?php echo $productresult[0]['productname']?></a></li>
					<li><a href="contrastcustomize.php?productid=<?php echo $_SESSION['productid'];?>">CUSTOMIZE</a></li>
					<li class="last"><a href="#">MONOGRAM</a></li>
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
					<li class="last"><a href="#">MONOGRAM</a></li>
				</ul>
			</div>-->
		<div class="inner-page-left">
			
			<div class="customize-left-menu">
				<ol id="customize">
					<li id="fabric" class="active" name="fitdiv"><a href="#">MONOGRAM</a></li>
					<li>&nbsp;</li>
				</ol>
			</div>
			
			<div class="customize-right-all-icon">
			
				<div class="monogramfilter"> <span>PLACEMENT:</span>
					
					<div class="filter-fabric-input-div">
						<?php	
						/*---product type  ---*/			
						$option_sql="select * from `monogramoption`";
						$option_result=$obj_db->select($option_sql);
					?>
						<select style="float:left;width:122%; font-size:13px;" class="categorycall login_text" name="placement" id="placement">
							<option value="0">SELECT PLACEMENT</option>
							<?php for($i=0;$i<count($option_result);$i++) { 
								if($_SESSION['sleevetypeshirt']=='half'){
										if($option_result[$i]['name'] == 'Cuff' || $option_result[$i]['name'] == 'Cuff And Pocket') {
											continue;
										}
									}
								?>	
							<option value="<?php echo $option_result[$i]['name'];?>"><?php echo $option_result[$i]['name']."-$ -". $option_result[$i]['price'];?></option>
							<?php } ?>
							<!--<option value="CUFF">CUFF</option>
							<option value="POCKET">POCKET</option>
							<option value="PLACKET">PLACKET</option>
							<option value="cuffandpocket">CUFF AND POCKET</option>-->
						</select>
					</div>
				</div>
				
				
				<div class="monogramfilter"> <span>Colour:</span>
				
					<div class="filter-fabric-input-div">
					<?php	
						/*---product type  ---*/			
						$colour_sql="select * from `monogramcolor`";
						$colour_result=$obj_db->select($colour_sql);
					?>

						<select style="float:left;width:122%; font-size:13px;" class="styled categorycall login_text" name="colour" id="colour">
							<option value="#FFFFFF">SELECT COLOUR</option>
							<?php for($i=0;$i<count($colour_result);$i++) { ?>
							<option value="<?php echo $colour_result[$i]['id'];?>"><?php echo $colour_result[$i]['name'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>
<script type="text/javascript">
$(document).ready(function() {
  $('#name').change(function() {
                // binds form submission and fields to the validation engine
                var name = $('#name').val();
					if(name.length > 10) {
						alert("Please Enter only 10 Characters");
						$(this).val(""); 
					}
            });	
		});	
</script>
			
				<div class="monogramfilter"> <span>Text:</span>
					<div class="monofilter-fabric-input-div">
						<input class="validate[required,maxSize[6]] categorycall" type="text" name="name" id="name" style="border: 1px solid #024E89;  padding: 5px; font-size:13px;">
					</div>
				</div>
				
				<div class="monogramfilter"> <span>Font Type:</span>
					<div class="filter-fabric-input-div">
					<?php	
						/*---product type  ---*/			
						$font_sql="select * from `monogramfont`";
						$font_result=$obj_db->select($font_sql);
					?>
						<!--<select>
							<option style="font-family : Arial">Arial</option>
							<option style="font-family : Courier">Courier</option>
							<option style="font-family : Tahoma">Tahoma</option>
							<option style="font-family : 'Times New Roman'">Times New Roman</option>
							<option style="font-family : Verdana">Verdana</option>
						</select>-->
						
						<select style="float:left;width:122%; font-size:13px;" class="categorycall login_text" name="fonttype" id="fonttype">
							<option value="Anaheim">SELECT FONT TYPE</option>
							<?php for($i=0;$i<count($font_result);$i++) { ?>
							<option style="font-family : <?php echo $font_result[$i]['name'];?>" value="<?php echo $font_result[$i]['id'];?>"><?php echo $font_result[$i]['name'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<span id="default" >&nbsp;</span>
				
			</div>
		</div>
		<div class="inner-page-right" >
			<div class="Products-title">
				<h1><?php echo $productresult[0]['productname']?></h1>
			</div>
			<div class="Products-price">
				<h2><span class="WebRupee">$ </span> <span class="proprice"><?php echo $productresult[0]['price']?></span></h2>
			</div>
			<div class="Products-image" id="" > 
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
					<?php if($_SESSION['contrastfabriccuff']=='yes'){ 
					$product = $_SESSION['contrastfabric'];	} else { $product = $_SESSION['product']; }?>
					<img id="5" src="admin/upload/shirt/<?php echo $product;?>/<?php echo $_SESSION['cuffimage']; ?>" name="1buttonangle" title="Peace Maker" style="position: absolute; display: block; z-index: 5;">
					</div>
					
					<div id="Products-imageplacket" > 
					<!----------------front placket-------------imageplacket--->
					<?php if($_SESSION['contrastfabricplacket']=='yes'){ 
					$product = $_SESSION['contrastfabric'];	} else { $product = $_SESSION['product']; }?>
					<img id="11" src="admin/upload/shirt/<?php echo $product;?>/<?php echo $_SESSION['frontimageplacket']; ?>" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 11;">
					</div>
					
					
					<div id="Products-image" > 
					<!----------------collar---------------->
					<?php if($_SESSION['contrastfabriccollar']=='yes'){ 
					$product = $_SESSION['contrastfabric'];	} else { $product = $_SESSION['product']; }?>
					<img id="14" src="admin/upload/shirt/<?php echo $product;?>/<?php echo $_SESSION['collarimage']; ?>" name="classic" title="Peace Maker" style="position: absolute; display: block; z-index: 14;">
					</div>
					
					<div id="monogrampocket" style="position:relative;" > 
					</div>
					
					</div>
			</div>
			
			<div class="button-div">
				<table align="center">				
					<tr>
						<td>				
							<div class="add-to-bag"><a href="confirmmsg.php?acn=addtobag" id="confirm" class="btn confirm">ADD TO BAG</a></div>
							<!--<div class="customize"><a href="confirmmsg.php" id="confirm" class="confirm">Finish</a></div>-->
						</td>
					</tr>		
				</table>
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
  $('.categorycall').change(function() {
 	
		$('#default').removeClass();
 		$('#default').addClass($('#placement').val());
		var place1 = $('#default').attr("class");
		
 		var dataString =  'placement=' + $('#placement').val() + '&colour=' +  $('#colour').val() + '&name=' +  $('#name').val() + '&fonttype=' +  $('#fonttype').val() + '&place=' + place1;
	//alert(dataString);
		$.ajax({
        type: "post",
        url: "makemonogram.php",
        data: dataString,
        cache: false,
        success: function(html){
			//alert(html);
			 $("#monogrampocket").empty().fadeOut(300);
			 $("#monogrampocket").html(html).fadeIn(300);
			 }
       });
	   
    return false;
 });
 

});

</script>



<script type="text/javascript">
	$(document).ready(function() {
		$(".confirm").fancybox();
		//$(".lastname").html("<?//php echo $productresult[0]['productname']?>");
	});
</script>