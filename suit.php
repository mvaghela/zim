<?php include("system/config.inc.php"); 
include("system/paging.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Suit</title>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-a021b0a5-1b53-62e4-8d25-5af315316135", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>
<body>
<?php include('include/header.php'); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fabric-name").fancybox();
	});
	$(document).ready(function() {
		$(".fabric-image-hover").fancybox();
	});
	$(document).ready(function() {
		$(".fabric-price").fancybox();
	});
</script>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Suit</a></li>
				<li class="last"><a href="#">JOAKIM MARCKO</a></li>
			</ul>
		</div>
	</div>
</div>	
<div class="wrapper">
	<div class="middle">
		<!--<div class="inner-title">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Suit</a></li>
				<li class="last"><a href="#">JOAKIM MARCKO</a></li>
			</ul>
		</div>-->
		<div class="inner-page-left">
			<div class="filter"> <span>FILTER BY:</span>
		<!-- sortinf for price,color,weight,wearing n compsition -->
				<form name="catSelect" action="#" method="post" >
					<?php
$subcategory_sql="select * from `optiontype` 
					LEFT OUTER JOIN `option` ON
					optiontype.optionid = option.optionid
					LEFT OUTER JOIN `filter` ON
					optiontype.optionid = filter.optionid
					WHERE `option`.`optionid` = 2 AND `filter`.`status` = 'active'";
$subcategory=$obj_db->select($subcategory_sql);
if($subcategory){
?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="pattern" id="pattern">
							<option value="0">All <?php echo $subcategory[0]['optionname']?></option>
							<?php for($i=0;$i<count($subcategory);$i++) { 
							
							?>
							<option <?php if($_SESSION['suitfilter']['pattern']==$subcategory[$i]['optiontypeid']) { ?> selected="selected" <?php } ?> value="<?php echo $subcategory[$i]['optiontypeid']?>"><?php echo $subcategory[$i]['optiontypename']?></option>
							<?php } ?>
						</select>
					</div>
					<?php } ?>
				</form>
				<form name="catSelect" action="#" method="post" >
					<?php
$subcategory_sql="select * from `optiontype` 
					LEFT OUTER JOIN `option` ON
					optiontype.optionid = option.optionid
					LEFT OUTER JOIN `filter` ON
					optiontype.optionid = filter.optionid
					WHERE `option`.`optionid` = 3 AND `filter`.`status` = 'active'";
$subcategory=$obj_db->select($subcategory_sql);
if($subcategory){
?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="color" id="color">
							<option value="0">All <?php echo $subcategory[0]['optionname']?></option>
							<?php for($i=0;$i<count($subcategory);$i++) { ?>
							<option <?php if($_SESSION['suitfilter']['color']==$subcategory[$i]['optiontypeid']) { ?> selected="selected" <?php } ?> value="<?php echo $subcategory[$i]['optiontypeid']?>"><?php echo $subcategory[$i]['optiontypename']?></option>
							<?php } ?>
						</select>
					</div>
					<?php } ?>
				</form>
				<form name="catSelect" action="#" method="post" >
					<?php
$subcategory_sql="select * from `optiontype` 
					LEFT OUTER JOIN `option` ON
					optiontype.optionid = option.optionid
					LEFT OUTER JOIN `filter` ON
					optiontype.optionid = filter.optionid
					WHERE `option`.`optionid` = 4 AND `filter`.`status` = 'active'";
$subcategory=$obj_db->select($subcategory_sql);
if($subcategory){
?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="composition" id="composition">
							<option value="0">All <?php echo $subcategory[0]['optionname']?></option>
							<?php for($i=0;$i<count($subcategory);$i++) { ?>
							<option <?php if($_SESSION['filter']['composition']==$subcategory[$i]['optiontypeid']) { ?> selected="selected" <?php } ?> value="<?php echo $subcategory[$i]['optiontypeid']?>"><?php echo $subcategory[$i]['optiontypename']?></option>
							<?php } ?>
						</select>
					</div>
					<?php } ?>
				</form>
				<form name="catSelect" action="#" method="post" >
					<?php
$subcategory_sql="select * from `optiontype` 
					LEFT OUTER JOIN `option` ON
					optiontype.optionid = option.optionid
					LEFT OUTER JOIN `filter` ON
					optiontype.optionid = filter.optionid
					WHERE `option`.`optionid` = 5 AND `filter`.`status` = 'active' ";
$subcategory=$obj_db->select($subcategory_sql);
if($subcategory){
?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="wearing" id="wearing">
							<option value="0">All <?php echo $subcategory[0]['optionname']?></option>
							<?php for($i=0;$i<count($subcategory);$i++) { 
							
							?>
							<option <?php if($_SESSION['filter']['wearing']==$subcategory[$i]['optiontypeid']) { ?> selected="selected" <?php } ?> value="<?php echo $subcategory[$i]['optiontypeid']?>"><?php echo $subcategory[$i]['optiontypename']?></option>
							<?php } ?>
						</select>
					</div>
					<?php } ?>
				</form>
				<form name="catSelect" action="#" method="post" >
					<?php
$subcategory_sql="select * from `optiontype` 
					LEFT OUTER JOIN `option` ON
					optiontype.optionid = option.optionid
					LEFT OUTER JOIN `filter` ON
					optiontype.optionid = filter.optionid
					WHERE `option`.`optionid` = 6 AND `filter`.`status` = 'active'";
$subcategory=$obj_db->select($subcategory_sql);
if($subcategory){
?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="weight" id="weight">
							<option value="0">All <?php echo $subcategory[0]['optionname']?></option>
							<?php for($i=0;$i<count($subcategory);$i++) { 
							
							?>
							<option <?php if($_SESSION['filter']['weight']==$subcategory[$i]['optiontypeid']) { ?> selected="selected" <?php } ?> value="<?php echo $subcategory[$i]['optiontypeid']?>"><?php echo $subcategory[$i]['optiontypename']?></option>
							<?php } ?>
						</select>
					</div>
					<?php } ?>
				</form>
		<!-- Name,price select box -->
<?php
$subcategory_sql="select * from `filter` 
				WHERE `filter`.`optionid` = 11 AND `filter`.`status` = 'active'";
$subcategory=$obj_db->select($subcategory_sql);
if($subcategory){ ?>
				<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="simplesort" id="simplesort" >
							<option <?php if($_SESSION['suitfilter']['simplesort']=='productid') { ?> selected="selected" <?php } ?>value="productid">Standard</option>
							<option <?php if($_SESSION['suitfilter']['simplesort']=='productname') { ?> selected="selected" <?php } ?> value="productname">Name</option>
							<option <?php if($_SESSION['suitfilter']['simplesort']=='price') { ?> selected="selected" <?php } ?> value="price">Price</option>
						</select>
				</div>
<?php } ?>
			<!-- Dispaly order select box -->
<?php
$subcategory_sql="select * from `filter` 
				WHERE `filter`.`optionid` = 12 AND `filter`.`status` = 'active'";
$subcategory=$obj_db->select($subcategory_sql);
if($subcategory){ ?>

				<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="displayorder" id="displayorder" >
							<option <?php if($_SESSION['suitfilter']['displayorder']=='asc') { ?> selected="selected" <?php } ?>value="asc">ASCENDING</option>
							<option <?php if($_SESSION['suitfilter']['displayorder']=='desc') { ?> selected="selected" <?php } ?>value="desc">DESCENDING</option>
						</select>
				</div>
<?php } ?>
			</div>
			
			<center>
				<div id="loding_img" class="loding_img_2"><img src="images/loading1.gif" /></div>
			</center>
			<div id="ajax_specs">
			
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
</div>
<?php include('include/footer.php'); ?>
</body>
</html>

<!-- script for ajax sorting -->

<script type="text/javascript">
$(document).ready(function() {
  $('.categorycall').change(function() {
 //alert("hi");
 //var patterneleid = $(this).val();
 var dataString =  'patterneleid=' + $('#pattern').val() + '&coloreleid=' +  $('#color').val() + '&compositioneleid=' +  $('#composition').val() + '&wearingeleid=' +  $('#wearing').val() + '&weighteleid=' +  $('#weight').val() + '&simplesorteleid=' +  $('#simplesort').val() + '&displayordereleid=' +  $('#displayorder').val() ;
//alert(dataString);
$.ajax({
        type: "GET",
        url: "suit_refresh.php?page=1",
        data: dataString,
        cache: false,
        success: function(html){
			//alert(dataString);
          $("#ajax_specs").empty().fadeOut(300);
		  $("#ajax_specs").html(html).fadeIn(300);
		  $('#loding_img').fadeOut(300);
        }
       });
	   
    return false;
 });
  var dataString =  'patterneleid=' + $('#pattern').val() + '&coloreleid=' +  $('#color').val() + '&compositioneleid=' +  $('#composition').val() + '&wearingeleid=' +  $('#wearing').val() + '&weighteleid=' +  $('#weight').val() + '&simplesorteleid=' +  $('#simplesort').val() + '&displayordereleid=' +  $('#displayorder').val() ;
//alert(dataString);
$.ajax({
        type: "GET",
        url: "suit_refresh.php?page=<?php if($_GET['page']){ echo $_GET['page']; }else{echo '1';} ?>",
        data: dataString,
        cache: false,
        success: function(html){
			//alert(dataString);
          $("#ajax_specs").empty().fadeOut(300);
		  $("#ajax_specs").html(html).fadeIn(300);
  		  $('#loding_img').fadeOut(300);
        }
       });
});

</script>

