<?php include("system/config.inc.php"); 
include("system/paging.php"); 
$_SESSION['filter']['pattern'] = $_GET['patterneleid'];
$_SESSION['filter']['color'] = $_GET['coloreleid'];
$_SESSION['filter']['composition'] = $_GET['compositioneleid'];
$_SESSION['filter']['wearing'] = $_GET['wearingeleid'];
$_SESSION['filter']['weight'] = $_GET['weighteleid'];
$_SESSION['filter']['simplesort'] = $_GET['simplesorteleid'];
$_SESSION['filter']['displayorder'] = $_GET['displayordereleid'];

?>
<?php 
if(($_SESSION['filter']['pattern']==0) && ($_SESSION['filter']['color']==0 ) && ($_SESSION['filter']['composition']==0 ) && ($_SESSION['filter']['wearing']==0 ) && ($_SESSION['filter']['weight']==0 ) && ($_SESSION['filter']['simplesort']) ){
			$cond = " 1 = 1 ";
} 
else
{ 
	//print_r($_SESSION['filter']);
	$cond = "";
	if($_SESSION['filter']['pattern']>0)
	{
		$cond .= "`optiontypeid` = '".$_SESSION['filter']['pattern']."'";
	}
	
	if($_SESSION['filter']['color']>0)
	{
		$cond .= " AND `optiontypeid` = '".$_SESSION['filter']['color']."'";
	}
	else
	{
		$cond .= " OR `optiontypeid` = '".$_SESSION['filter']['color']."'";
	}
	
	if($_SESSION['filter']['composition']>0)
	{
		$cond .= " AND `optiontypeid` = '".$_SESSION['filter']['composition']."'";
	}
	else
	{
		$cond .= " OR `optiontypeid` = '".$_SESSION['filter']['composition']."'";
	}

	if($_SESSION['filter']['wearing']>0)
	{
		$cond .= " AND `optiontypeid` = '".$_SESSION['filter']['wearing']."'";
	}
	else
	{
		$cond .= " OR `optiontypeid` = '".$_SESSION['filter']['wearing']."'";
	}

	if($_SESSION['filter']['weight']>0)
	{
		$cond .= " AND `optiontypeid` = '".$_SESSION['filter']['weight']."'";
	}
	else
	{
		$cond .= " OR `optiontypeid` = '".$_SESSION['filter']['weight']."'";
	}
	
}

$sortorder = $_SESSION['filter']['displayorder'];
$order = "ORDER BY product.".$_SESSION['filter']['simplesort']." ".$sortorder." ";
			
$current = Removemsg(selfURL());
$currenturl = site_Encryption($current);
$recordperpage = 15;
if (isset($_REQUEST['page'])) {
		$page = $_REQUEST['page'];
		$s1 = $page * $recordperpage - $recordperpage;
		$s2 = $recordperpage;
} else {
		$s1 = 0;
		$s2 = $recordperpage;
}		
		
$sqlcpont="SELECT count(product.productid) AS `countno` 
			FROM `product` 
			LEFT OUTER JOIN `productoption` ON
			product.productid = productoption.productid
			Where ".$cond." 
			GROUP BY product.productid "; 
$count = $obj_db->select($sqlcpont);
			
echo $sql = "SELECT product.*,productoption.*,product.productid as pid
					from `product`
					LEFT OUTER JOIN `productoption` ON
					product.productid = productoption.productid
					Where ".$cond." 
					GROUP BY product.productid ".$order." LIMIT $s1,$s2";
$result=$obj_db->select($sql);
?>
<ul class="all-filter-fabric">
	<?php for($i=0;$i<count($result);$i++){ ?>
	<li><span class="fabric-image"><img src="admin/upload/image/thumb/<?php echo $result[$i]['image'];?>"  alt="<?php echo $result[$i]['productname'];?>"/></span> <a class="fabric-name"  href="viewfabric.php?id=<?php echo $result[$i]['pid'];?>">
		<h3><?php echo $result[$i]['productname'];?></h3>
		</a> <a class="fabric-price"  href="viewfabric.php?id=<?php echo $result[$i]['pid'];?>"><span class="WebRupee">Rs</span>: <?php echo $result[$i]['price'];?></a> <a class="fabric-image-hover" href="viewfabric.php?id=<?php echo $result[$i]['pid'];?>">&nbsp;</a> </li>
	<?php } ?>
</ul>
<div class="pagination">
     <?php doPages($recordperpage, "fabric.php" . checkurlconnectergiven("fabric.php"), "", count($count)); ?>
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
