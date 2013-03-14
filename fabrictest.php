<?php include("system/config.inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Fabric</title>
</head>
<body>
<?php include('include/header.php'); 
/*---store name,price in session ---*/
	if(($_POST['simplesort'])){
		if(($_POST['sortorder'])){ 
			/*---store asc,desc order in session ---*/
				$sortorder = $_POST['sortorder'];
				$_SESSION['displayorder'] = $_POST['sortorder'];
			} else { 
				$sortorder = "desc"; 
				$_SESSION['displayorder'] = "desc";
			}

		$order = "ORDER BY product.".$_POST['simplesort']." ".$sortorder."  ";
		$_SESSION['order'] = $_POST['simplesort'];
}
?>
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
		/*---product type  ---*/			
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
			/*---parent option ---*/
$category_sql="select * from `option`";
$category=$obj_db->select($category_sql);
?>

<?php
/*---------loop for product start ----------------------*/
/*---Unset Particular Variable ---*/
		 for($j=0;$j<5;$j++) { 
			if (($_POST['catID-'.$j])){
				$_SESSION['fabric'.$j] = $_POST['catID-'.$j];
			} else {
				unset($_SESSION['fabric'.$j]); 
			}	?>
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="catID-<?php echo $j;?>" id="catID" onchange="catSelect.submit()">
							<option value="0">All <?php echo $category[$j]['optionname']?></option>
							<?php 
							/*---child  option ---*/
							$subcategory_sql="select * from `optiontype` WHERE `optionid` = '".$category[$j]['optionid']."'";
							$subcategory=$obj_db->select($subcategory_sql);
							
							for($i=0;$i<count($subcategory);$i++) { ?>
							<option <?php if($_SESSION['fabric'.$j]==$subcategory[$i]['optiontypeid']) { ?> selected="selected" <?php } ?>
							value="<?php echo $subcategory[$i]['optiontypeid']?>"><?php echo $subcategory[$i]['optiontypename']?></option>
							<?php } ?>
						</select>
					</div>
					<?php } ?>
					<!-- Name,price select box -->
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="simplesort" id="simplesort" onchange="catSelect.submit()">
							<option <?php if($_SESSION['order']=='productid') { ?> selected="selected" <?php } ?>value="productid">Standard</option>
							<option <?php if($_SESSION['order']=='productname') { ?> selected="selected" <?php } ?> value="productname">Name</option>
							<option <?php if($_SESSION['order']=='price') { ?> selected="selected" <?php } ?> value="price">Price</option>
						</select>
					</div>
					<!-- Dispaly order select box -->
					<div class="filter-fabric-input-div">
						<select style="float:left;" class="styled categorycall" name="sortorder" id="sortorder" onchange="catSelect.submit()">
							<option <?php if($_SESSION['displayorder']=='asc') { ?> selected="selected" <?php } ?>value="asc">ASCENDING</option>
							<option <?php if($_SESSION['displayorder']=='desc') { ?> selected="selected" <?php } ?>value="desc">DESCENDING</option>
						</select>
					</div>
				</form>
			</div>
			<?php 
			for($j=0;$j<5;$j++) {
				//echo $_SESSION['fabric'.$j];
				if($_SESSION['fabric'.$j]==''){
					$cond.= "";
				} else { 
					$cond.= " OR `optiontypeid` = '".$_SESSION['fabric'.$j]."'";
					//$cond = substr($cond1,0,-2);
				}
			} 
			/*---  product query ----*/
			$sql = "SELECT product.*,productoption.*
					from `product`
					LEFT OUTER JOIN `productoption` ON
					product.productid = productoption.productid  
					WHERE 1 = 1  ".$cond."
					GROUP BY `product`.`productid` ".$order." ";
			$result=$obj_db->select($sql);
			?>
			<ul class="all-filter-fabric">
				<?php for($i=0;$i<count($result);$i++){ ?>
				<li><span class="fabric-image"><img src="admin/upload/image/thumb/<?php echo $result[$i]['image'];?>"  alt="<?php echo $result[$i]['productname'];?>"/></span> <a class="fabric-name"  href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>">
					<h3><?php echo $result[$i]['productname'];?></h3>
					</a> <a class="fabric-price"  href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>"><span class="WebRupee">Rs</span>: <?php echo $result[$i]['price'];?></a> <a class="fabric-image-hover" href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>">&nbsp;</a> </li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>
