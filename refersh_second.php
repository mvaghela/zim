<?php 
include("system/config.inc.php"); 

$last_msg_id=$_GET['last_msg_id'];

//echo "<br>session frist =".$_SESSION['last_msg_id_ssss'];
//echo "<br>Last ID ori =".$last_msg_id=$_GET['last_msg_id'];
//echo "<br> Iner Ass=".$_SESSION['last_msg_id_ssss']=$last_msg_id;


/*if($_SESSION['last_msg_id_ssss']!=$last_msg_id) {
echo "<br> Iner Ass=".$_SESSION['last_msg_id_ssss']=$last_msg_id;
} else {
	//die();
}
echo "<br>";

//$_SESSION['action']=$_GET['action'];*/



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

			
			
$sql = "SELECT * FROM( SELECT count( productoption.productoptionid ) AS total,product.price,product.producttypeid as ptype,
					product.productname,product.image,productoption.optiontypeid,product.productid,product.productid AS pid
					from `product`
					LEFT OUTER JOIN `productoption` ON
					product.productid = productoption.productid
					Where ".$cond." 
					GROUP BY product.productid ".$order." ) AS tbl WHERE ".$fabricoptionmain." ".$ccc." LIMIT ".($last_msg_id+1)." , 5"; 
$result=$obj_db->select($sql);
?>
<!--main ul,li for image --->
	<?php for($i=0;$i<count($result);$i++){ 
	$loopcounter=$last_msg_id+$i+1;
	?>

	<div id="<?php echo $loopcounter; ?>" class="message_box" >
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
	<?php } ?>



