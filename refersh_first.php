<?php include("system/config.inc.php"); 
include("system/paging.php"); 
//--------store the images in session---------//
$_SESSION['filter']['fabricoption'] = $_GET['fabricoption'];
$_SESSION['filter']['pattern'] = $_GET['patterneleid'];
$_SESSION['filter']['color'] = $_GET['coloreleid'];
$_SESSION['filter']['composition'] = $_GET['compositioneleid'];
$_SESSION['filter']['wearing'] = $_GET['wearingeleid'];
$_SESSION['filter']['weight'] = $_GET['weighteleid'];
$_SESSION['filter']['simplesort'] = $_GET['simplesorteleid'];
$_SESSION['filter']['displayorder'] = $_GET['displayordereleid'];

//--------counter for session for count query---------//

$counter = 0;
if($_SESSION['filter']['pattern']>0)
	{
		$counter++;
	}
if($_SESSION['filter']['color']>0)
	{
		$counter++;
	}
if($_SESSION['filter']['composition']>0)
	{
		$counter++;
	}
if($_SESSION['filter']['wearing']>0)
	{
		$counter++;
	}
if($_SESSION['filter']['weight']>0)
	{
		$counter++;
	}
//echo $counter;
?>
<?php 
if($_SESSION['filter']['fabricoption']==0) {
	$fabricoption = " 1 = 1 AND ";
} else {
	$fabricoption = " `product`.`producttypeid` = ".$_SESSION['filter']['fabricoption']." AND ";
	$fabricoptionmain = " `ptype` = ".$_SESSION['filter']['fabricoption']." AND ";
}
if(($_SESSION['filter']['pattern']==0) && ($_SESSION['filter']['color']==0 ) && ($_SESSION['filter']['composition']==0 ) && ($_SESSION['filter']['wearing']==0 ) && ($_SESSION['filter']['weight']==0 ) && ($_SESSION['filter']['simplesort']) && $counter==0 ){
			$cond = " 1 = 1 ";
			$ccc= " 1 = 1 ";
} 
else { 
	$cond = "`optiontypeid` = '".$_SESSION['filter']['pattern']."' OR  `optiontypeid` = '".$_SESSION['filter']['color']."' OR  `optiontypeid` = '".$_SESSION['filter']['composition']."' OR  `optiontypeid` = '".$_SESSION['filter']['wearing']."' OR  `optiontypeid` = '".$_SESSION['filter']['weight']."'  ";
	$ccc = "total = ".$counter."";
}

$sortorder = $_SESSION['filter']['displayorder'];
$order = "ORDER BY product.".$_SESSION['filter']['simplesort']." ".$sortorder." ";


//--------query for actual select---------//
			
$sql = "SELECT * FROM( SELECT count( productoption.productoptionid ) AS total,product.price,product.producttypeid as ptype,
					product.productname,product.image,productoption.optiontypeid,product.productid,product.productid AS pid
					from `product`
					LEFT OUTER JOIN `productoption` ON
					product.productid = productoption.productid
					Where ".$cond." 
					GROUP BY product.productid ".$order." ) AS tbl WHERE ".$fabricoptionmain." ".$ccc." LIMIT 0,10";//LIMIT $s1,$s2";
$result=$obj_db->select($sql);
?>
<!--main ul,li for image --->
<?php
	 for($i=0;$i<count($result);$i++){ ?>
<div id="<?php echo $i; ?>" class="message_box" >
	<div class="middle-dibs" id="middle-dibs<?php echo $result[$i]['productid']; ?>">
		<div class="newall-filter-fabric" >
			
			<div class="dibs_hover_div middle-dibs<?php echo $result[$i]['productid']; ?>">
				<a class="fabric-price" style="height:157px !important;" href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>"></a>
			</div>
				
			<span class="fabric-image">
				<img src="admin/upload/image/thumb/<?php echo $result[$i]['image'];?>"  alt="<?php echo $result[$i]['productname'];?>"/>
			</span> 
			
			<a class="fabric-name"  href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>">
				<h3><?php echo $result[$i]['productname'];?></h3>
			</a> 
			
			<a class="fabric-price"  href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>">
				<span class="WebRupee">$ </span><?php echo $result[$i]['price'];?>
			</a> 
			
			<!--<a class="fabric-image-hover" href="viewfabric.php?id=<?//php echo $result[$i]['productid'];?>">&nbsp;</a> -->
			<span><?php echo $result[$i]['productid'];?></span>
		</div>
	</div>	
</div>
<?php  } ?>


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

<script>
	$(document).ready(function() {
		$(".middle-dibs").mouseenter(function() {
			var thisid=$(this).attr("id");
			$(this).children($("."+thisid).fadeIn(200));
		});
		$(".middle-dibs").mouseleave(function() {
			var thisid=$(this).attr("id");
			$(this).children($("."+thisid).fadeOut(200));
		});
	});
</script>