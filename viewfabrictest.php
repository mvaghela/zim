<?php include("system/config.inc.php"); ?>
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
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
			<div class="inner-title">
				<ul>
					<li><a href="#">All</a></li>
					<li class="last"><a href="#">Fabric</a></li>
				</ul>
			</div>
			<div class="filter-fabric">
				<form action="#">
					<span>FILTER BY:</span>
					<?php	
		$category_sql="select * from `producttype`";
		$category=$obj_db->select($category_sql);
?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" name="option" class="styled categorycall">
							<option>Product Type</option>
							<?php 
							for($i=0;$i<count($category);$i++) { ?>
							<option <?php if($user_res[0]['producttypeid']==$category[$i]['producttypeid']) { ?> selected="selected" <?php } ?> value="<?php echo $category[$i]['producttypeid']?>"><?php echo $category[$i]['producttypename']?></option>
							<?php } ?>
						</select>
					</div>
				</form>
			</div>
			<div class="filter-fabric">
				<form name="catSelect" action="fabric.php" method="post" >
					<span>FILTER BY:</span>
					<?php	
		$category_sql="select * from `option`";
		$category=$obj_db->select($category_sql);
?>
					<?php for($j=0;$j<5;$j++) { ?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="catID-<?php echo $j;?>" id="catID" onchange="catSelect.submit()">
							<option value="0"><?php echo $category[$j]['optionname']?></option>
							<?php 
							$subcategory_sql="select * from `optiontype` WHERE `optionid` = '".$category[$j]['optionid']."'";
							$subcategory=$obj_db->select($subcategory_sql);
							for($i=0;$i<count($subcategory);$i++) { ?>
							<option value="<?php echo $subcategory[$i]['optiontypeid']?>"><?php echo $subcategory[$i]['optiontypename']?></option>
							<?php } ?>
						</select>
					</div>
					<?php } ?>
					<div class="filter-fabric-input-div">
						<input type="text" value="Sort"/>
					</div>
					<div class="filter-fabric-input-div">
						<input type="text" value="Sorting Order"/>
					</div>
				</form>
			</div>
			<?php 
			for($j=0;$j<5;$j++) {
			 if (!isset($_POST['catID-'.$j])){
      			echo $catNum = 0;}
   			else{
      			echo $catNum = $_POST['catID-'.$j];
			}
			} 
			$sql = "SELECT productoption.*,optiontype.*,option.optionname,option.optionid,product.productname,product.price,
							product.productid,product.image FROM `productoption`
							 LEFT OUTER JOIN `optiontype` ON 
							 `optiontype`.`optiontypeid` = `productoption`.`optiontypeid`
							 LEFT OUTER JOIN `option` ON 
							 `option`.`optionid` = `optiontype`.`optionid`
							 LEFT OUTER JOIN `product` ON 
							 `product`.`productid` = `productoption`.`productid`
							  GROUP BY `product`.`productid` ";
			$result=$obj_db->select($sql);
			?>
			<ul class="all-filter-fabric">
				<?php for($i=0;$i<count($result);$i++){ ?>
				<li><span class="fabric-image"><img src="admin/upload/image/thumb/<?php echo $result[$i]['image'];?>"  alt="<?php echo $result[$i]['productname'];?>"/></span> <a class="fabric-name"  href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>">
					<h3><?php echo $result[$i]['productname'];?></h3>
					</a> <a class="fabric-price"  href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>"><span class="WebRupee">Rs</span>: <?php echo $result[$i]['price'];?></a> <a class="fabric-image-hover" href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>">&nbsp;</a> </li>
				<?php } ?>
				<!--			<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>
				<li><span class="fabric-image"><img src="images/inner-fabric.jpg"  alt="Fa"/></span> <a class="fabric-name"  href="#">
					<h3>JOAKIM MARCKO</h3>
					</a> <a class="fabric-price"  href="#"><span class="WebRupee">Rs</span>: 555.00</a> <a class="fabric-image-hover" href="#">&nbsp;</a> </li>-->
			</ul>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>
