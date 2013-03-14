<?php include("system/config.inc.php"); 
include("system/paging.php"); ?>
<?php 
//--------store the images in session---------//

$_SESSION['suitfilter']['pattern'] = $_GET['patterneleid'];
$_SESSION['suitfilter']['color'] = $_GET['coloreleid'];
$_SESSION['suitfilter']['composition'] = $_GET['compositioneleid'];
$_SESSION['suitfilter']['wearing'] = $_GET['wearingeleid'];
$_SESSION['suitfilter']['weight'] = $_GET['weighteleid'];
$_SESSION['suitfilter']['simplesort'] = $_GET['simplesorteleid'];
$_SESSION['suitfilter']['displayorder'] = $_GET['displayordereleid'];

//--------counter for session for count query---------//

$counter = 0;
if($_SESSION['suitfilter']['pattern']>0)
	{
		$counter++;
	}
if($_SESSION['suitfilter']['color']>0)
	{
		$counter++;
	}
if($_SESSION['suitfilter']['composition']>0)
	{
		$counter++;
	}
if($_SESSION['suitfilter']['wearing']>0)
	{
		$counter++;
	}
if($_SESSION['suitfilter']['weight']>0)
	{
		$counter++;
	}
//echo $counter;
?>
<?php 
if(($_SESSION['suitfilter']['pattern']==0) && ($_SESSION['suitfilter']['color']==0 ) && ($_SESSION['suitfilter']['composition']==0 ) && ($_SESSION['suitfilter']['wearing']==0 ) && ($_SESSION['suitfilter']['weight']==0 ) && ($_SESSION['suitfilter']['simplesort']) && $counter==0 ){
			$cond = " 1 = 1 ";
			$ccc= " 1 = 1 ";
} 
else { 
	$cond = "`optiontypeid` = '".$_SESSION['suitfilter']['pattern']."' OR  `optiontypeid` = '".$_SESSION['suitfilter']['color']."' OR  `optiontypeid` = '".$_SESSION['suitfilter']['composition']."' OR  `optiontypeid` = '".$_SESSION['suitfilter']['wearing']."' OR  `optiontypeid` = '".$_SESSION['suitfilter']['weight']."'  ";
	$ccc = "total = ".$counter."";
}
//--------foe order by option---------//

if($_SESSION['suitfilter']['displayorder'] == 'undefined') {
	$sortorder = 'DESC';
} else {
	$sortorder = $_SESSION['suitfilter']['displayorder'];
}

if($_SESSION['suitfilter']['simplesort'] == 'undefined') {
		$order = "ORDER BY product.productid ".$sortorder;
} else {
	
	$order = "ORDER BY product.".$_SESSION['suitfilter']['simplesort']." ".$sortorder." ";
}

$current = Removemsg(selfURL());
$currenturl = site_Encryption($current);
$recordperpage = 9;
if (isset($_REQUEST['page'])) {
		$page = $_REQUEST['page'];
		$s1 = $page * $recordperpage - $recordperpage;
		$s2 = $recordperpage;
} else {
		$s1 = 0;
		$s2 = $recordperpage;
}		
//--------query for paging---------//
		
$sqlcpont="SELECT count(product.productid) AS `countno` 
			FROM `product` 
			LEFT OUTER JOIN `productoption` ON
			product.productid = productoption.productid
			Where ".$cond." and product.producttypeid = 6
			GROUP BY product.productid "; 
$count = $obj_db->select($sqlcpont);

//--------query for actual select---------//

$sql = "SELECT * FROM( SELECT count( productoption.productoptionid ) AS total,product.price,product.producttypeid as ptype,
					product.productname,product.image,productoption.optiontypeid,product.productid 
					from `product`
					LEFT OUTER JOIN `productoption` ON
					product.productid = productoption.productid
					Where ".$cond." 
					GROUP BY product.productid ".$order." ) AS tbl WHERE ".$ccc." AND ptype = 6  LIMIT $s1,$s2";
$result=$obj_db->select($sql);
?>

<!--main ul,li for image --->

<ul class="all-fabric">

		
<?php for($i=0;$i<count($result);$i++){ ?>
	<li class="pname" id="<?php echo $result[$i]['productid'];?>" ><span class="fabric-image"><img src="admin/upload/image/thumb/<?php echo $result[$i]['image'];?>"  alt="<?php echo $result[$i]['productname'];?>"/></span>
	<a href="#" class="pname" id="<?php echo $result[$i]['productid'];?>">
		<h3><?php echo $result[$i]['productname'];?></h3>
	</a> 
<!--	 <a class="fabric-name"  href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>">
		<h3><?php echo $result[$i]['productname'];?></h3>
	</a> 
-->		<a class="fabric-price"  href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>"><span class="WebRupee">Rs</span> <?php echo $result[$i]['price'];?></a> <a class="fabric-image-hover" href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>">&nbsp;</a> </li>
<?php } ?>
</ul>

<div class="pagination">
     <?php doPages($recordperpage, "suit.php" . checkurlconnectergiven("suit.php"), "", count($count)); ?>
</div>
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
<script type="text/javascript">
$(document).ready(function() {
  $('.pname').click(function() {
	//ssalert("hi");
	var eleid = $(this).attr("id");
	var dataString =  'id=' + eleid ;
	//alert(dataString);			
	$.ajax({
        type: "GET",
        url: "displaysuit.php",
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
	var eleid = 24;
	var dataString =  'id=' + eleid ;
	
	 $.ajax({
        type: "GET",
        url: "displaysuit.php",
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
