<?php include("system/config.inc.php"); 
include("system/paging.php"); ?>
<?php 
//--------store the images in session---------//

$_SESSION['shirtfilter']['pattern'] = $_GET['patterneleid'];
$_SESSION['shirtfilter']['color'] = $_GET['coloreleid'];
$_SESSION['shirtfilter']['composition'] = $_GET['compositioneleid'];
$_SESSION['shirtfilter']['wearing'] = $_GET['wearingeleid'];
$_SESSION['shirtfilter']['weight'] = $_GET['weighteleid'];
$_SESSION['shirtfilter']['simplesort'] = $_GET['simplesorteleid'];
$_SESSION['shirtfilter']['displayorder'] = $_GET['displayordereleid'];

//--------counter for session for count query---------//

$counter = 0;
if($_SESSION['shirtfilter']['pattern']>0)
	{
		$counter++;
	}
if($_SESSION['shirtfilter']['color']>0)
	{
		$counter++;
	}
if($_SESSION['shirtfilter']['composition']>0)
	{
		$counter++;
	}
if($_SESSION['shirtfilter']['wearing']>0)
	{
		$counter++;
	}
if($_SESSION['shirtfilter']['weight']>0)
	{
		$counter++;
	}
//echo $counter;
?>
<?php 
if(($_SESSION['shirtfilter']['pattern']==0) && ($_SESSION['shirtfilter']['color']==0 ) && ($_SESSION['shirtfilter']['composition']==0 ) && ($_SESSION['shirtfilter']['wearing']==0 ) && ($_SESSION['shirtfilter']['weight']==0 ) && ($_SESSION['shirtfilter']['simplesort']) && $counter==0 ){
			$cond = " 1 = 1 ";
			$ccc= " 1 = 1 ";
} 
else { 
	$cond = "`optiontypeid` = '".$_SESSION['shirtfilter']['pattern']."' OR  `optiontypeid` = '".$_SESSION['shirtfilter']['color']."' OR  `optiontypeid` = '".$_SESSION['shirtfilter']['composition']."' OR  `optiontypeid` = '".$_SESSION['shirtfilter']['wearing']."' OR  `optiontypeid` = '".$_SESSION['shirtfilter']['weight']."'  ";
	$ccc = "total = ".$counter."";
}
//--------foe order by option---------//

if($_SESSION['shirtfilter']['displayorder'] == 'undefined') {
	$sortorder = 'DESC';
} else {
	$sortorder = $_SESSION['shirtfilter']['displayorder'];
}

if($_SESSION['shirtfilter']['simplesort'] == 'undefined') {
		$order = "ORDER BY product.productid ".$sortorder;
} else {
	
	$order = "ORDER BY product.".$_SESSION['shirtfilter']['simplesort']." ".$sortorder." ";
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
			Where ".$cond." and product.producttypeid = 3
			GROUP BY product.productid "; 
$count = $obj_db->select($sqlcpont);

//--------query for actual select---------//

$sql = "SELECT * FROM( SELECT count( productoption.productoptionid ) AS total,product.price,product.producttypeid as ptype,
					product.productname,product.image,productoption.optiontypeid,product.productid 
					from `product`
					LEFT OUTER JOIN `productoption` ON
					product.productid = productoption.productid
					Where ".$cond." 
					GROUP BY product.productid ".$order." ) AS tbl WHERE ".$ccc." AND ptype = 3 LIMIT $s1,$s2";
$result=$obj_db->select($sql);
?>

<!--main ul,li for image --->

<div class="all-fabric" >	
<?php for($i=0;$i<count($result);$i++){ ?>
<div id="<?php echo $i; ?>" class="message_box" >
	<div class="middle-dibs" id="middle-dibs<?php echo $result[$i]['productid']; ?>">
		<div class="all-fabric-inner" >
			
			<div class="dibs_hover_div middle-dibs<?php echo $result[$i]['productid']; ?>">
				<a class="fabric-price" style="height:157px !important;" href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>"></a>
			</div>
				
			<span class="fabric-image">
				<img src="admin/upload/image/thumb/<?php echo $result[$i]['image'];?>"  alt="<?php echo $result[$i]['productname'];?>"/>
			</span> 
			
			<a href="#" class="pname" id="<?php echo $result[$i]['productid'];?>">
				<h3><?php echo $result[$i]['productname'];?></h3>
			</a> 
			
			<a class="fabric-price"  href="viewfabric.php?id=<?php echo $result[$i]['productid'];?>">
				<span class="WebRupee">$ </span><?php echo $result[$i]['price'];?>
			</a> 
			
			<!--<a class="fabric-image-hover" href="viewfabric.php?id=<?//php echo $result[$i]['productid'];?>">&nbsp;</a> -->
			<!--<span><?//php echo $result[$i]['productid'];?></span>-->
		</div>
	</div>	
</div>
<?php } ?>
</div>

<div class="pagination">
     <?php doPages($recordperpage, "shirt.php" . checkurlconnectergiven("shirt.php"), "", count($count)); ?>
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
        url: "displayshirt.php",
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
	var eleid = 2;
	var dataString =  'id=' + eleid ;
	
	 $.ajax({
        type: "GET",
        url: "displayshirt.php",
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