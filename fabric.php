<?php include("system/config.inc.php"); 
unset($_SESSION['redirecturlusedcustomize']);	
unset($_SESSION['redirecturlsavecust']);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Fabric</title>
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
					<li class="first"><a href="#">All</a></li>
					<li class="last"><a href="#">Fabric</a></li>
				</ul>
			</div>
	</div>
</div>	
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
			<div class="filter-fabric">
				<form action="#">
					<span>FILTER BY:</span>
					<?php	
		/*---product type  ---*/			
		$category_sql="select * from `producttype`";
		$category=$obj_db->select($category_sql);
?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" name="fabricoption" id="fabricoption" class="styled categorycall">
							<option value="0">Product Type</option>
							<?php 
							for($i=0;$i<count($category);$i++) { ?>
							<option <?php if($_SESSION['filter']['fabricoption']==$category[$i]['producttypeid']) { ?> selected="selected" <?php } ?> value="<?php echo $category[$i]['producttypeid']?>"><?php echo $category[$i]['producttypename']?></option>
							<?php } ?>
						</select>
					</div>
				</form>
			</div>
			<div class="filter-fabric"> <span>FILTER BY:</span>
			<!-- sortinf for price,color,weight,wearing n compsition -->
				<form name="catSelect" action="#" method="post" >
					<?php
$subcategory_sql="select * from `optiontype` 
					LEFT OUTER JOIN `option` ON
					optiontype.optionid = option.optionid
					WHERE `option`.`optionid` = 2 ";
$subcategory=$obj_db->select($subcategory_sql);
?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="pattern" id="pattern">
							<option value="0">All <?php echo $subcategory[0]['optionname']?></option>
							<?php for($i=0;$i<count($subcategory);$i++) { 
							
							?>
							<option <?php if($_SESSION['filter']['pattern']==$subcategory[$i]['optiontypeid']) { ?> selected="selected" <?php } ?> value="<?php echo $subcategory[$i]['optiontypeid']?>"><?php echo $subcategory[$i]['optiontypename']?></option>
							<?php } ?>
						</select>
					</div>
				</form>
				<form name="catSelect" action="#" method="post" >
					<?php
$subcategory_sql="select * from `optiontype` 
					LEFT OUTER JOIN `option` ON
					optiontype.optionid = option.optionid
					WHERE `option`.`optionid` = 3 ";
$subcategory=$obj_db->select($subcategory_sql);
?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="color" id="color">
							<option value="0">All <?php echo $subcategory[0]['optionname']?></option>
							<?php for($i=0;$i<count($subcategory);$i++) { ?>
							<option <?php if($_SESSION['filter']['color']==$subcategory[$i]['optiontypeid']) { ?> selected="selected" <?php } ?> value="<?php echo $subcategory[$i]['optiontypeid']?>"><?php echo $subcategory[$i]['optiontypename']?></option>
							<?php } ?>
						</select>
					</div>
				</form>
				<form name="catSelect" action="#" method="post" >
					<?php
$subcategory_sql="select * from `optiontype` 
					LEFT OUTER JOIN `option` ON
					optiontype.optionid = option.optionid
					WHERE `option`.`optionid` = 4 ";
$subcategory=$obj_db->select($subcategory_sql);
?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="composition" id="composition">
							<option value="0">All <?php echo $subcategory[0]['optionname']?></option>
							<?php for($i=0;$i<count($subcategory);$i++) { 
							
							?>
							<option <?php if($_SESSION['filter']['composition']==$subcategory[$i]['optiontypeid']) { ?> selected="selected" <?php } ?> value="<?php echo $subcategory[$i]['optiontypeid']?>"><?php echo $subcategory[$i]['optiontypename']?></option>
							<?php } ?>
						</select>
					</div>
				</form>
				<form name="catSelect" action="#" method="post" >
					<?php
$subcategory_sql="select * from `optiontype` 
					LEFT OUTER JOIN `option` ON
					optiontype.optionid = option.optionid
					WHERE `option`.`optionid` = 5 ";
$subcategory=$obj_db->select($subcategory_sql);
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
				</form>
				<form name="catSelect" action="#" method="post" >
					<?php
$subcategory_sql="select * from `optiontype` 
					LEFT OUTER JOIN `option` ON
					optiontype.optionid = option.optionid
					WHERE `option`.`optionid` = 6 ";
$subcategory=$obj_db->select($subcategory_sql);
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
				</form>
				
			<!-- Name,price select box -->
				<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="simplesort" id="simplesort" >
							<option <?php if($_SESSION['filter']['simplesort']=='productid') { ?> selected="selected" <?php } ?>value="productid">Standard</option>
							<option <?php if($_SESSION['filter']['simplesort']=='productname') { ?> selected="selected" <?php } ?> value="productname">Name</option>
							<option <?php if($_SESSION['filter']['simplesort']=='price') { ?> selected="selected" <?php } ?> value="price">Price</option>
						</select>
				</div>
			<!-- Dispaly order select box -->
				<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="displayorder" id="displayorder" >
							<option <?php if($_SESSION['filter']['displayorder']=='asc') { ?> selected="selected" <?php } ?>value="asc">Ascending</option>
							<option <?php if($_SESSION['filter']['displayorder']=='desc') { ?> selected="selected" <?php } ?>value="desc">Desending</option>
						</select>
				</div>
					
			</div>
			<center>
			<div id="loding_img" class="loding_img_2"><img src="images/loading1.gif" /></div></center>
			<div id="ajax_specs">
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
 var dataString =  'fabricoption=' + $('#fabricoption').val() + '&patterneleid=' + $('#pattern').val() + '&coloreleid=' +  $('#color').val() + '&compositioneleid=' +  $('#composition').val() + '&wearingeleid=' +  $('#wearing').val() + '&weighteleid=' +  $('#weight').val() + '&simplesorteleid=' +  $('#simplesort').val() + '&displayordereleid=' +  $('#displayorder').val() ;
//alert(dataString);
$.ajax({
        type: "GET",
        url: "refersh.php?page=1",
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
  var dataString =  'fabricoption=' + $('#fabricoption').val() + '&patterneleid=' + $('#pattern').val() + '&coloreleid=' +  $('#color').val() + '&compositioneleid=' +  $('#composition').val() + '&wearingeleid=' +  $('#wearing').val() + '&weighteleid=' +  $('#weight').val() + '&simplesorteleid=' +  $('#simplesort').val() + '&displayordereleid=' +  $('#displayorder').val() ;
//alert(dataString);
$.ajax({
        type: "GET",
        url: "refersh.php?page=<?php if($_GET['page']){ echo $_GET['page']; }else{echo '1';} ?>",
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