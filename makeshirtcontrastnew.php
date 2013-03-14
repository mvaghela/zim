<?php include("system/config.inc.php"); 

//$contastimage= explode('-',$_GET['class']);
$sql = "select * from `shirtcustomization` where productid = ".$_GET['class']."";
$result=$obj_db->select($sql);

$productsql = "select * from `product` where productid = ".$_SESSION['productid']."";
$productresult=$obj_db->select($productsql);
//echo ($_REQUEST['productid']);	?>


<?php
if($_GET['id']=='location'){				
		switch($_GET['image'])
			{
					
				case 'collar':
					//$_SESSION['collartype'] = $collartype[0];
					//$_SESSION['collarimage'] = $collartype[1];
					//$left =  $_SESSION['collartype'];
					$left =  $_SESSION['collartype'];
					//echo "<br>". $leftas =   $result[0][$left];
					$_SESSION['collarimage'] = $result[0][$left]; ?>
 					<?php
					break;
				case 'cuff':
					//$_SESSION['fronttype'] = $fronttype[0];
					//$_SESSION['frontimageplacket'] = $fronttype[1];
					$left =  $_SESSION['cufftype'];
					//echo "<br>". $leftas =   $result[0][$left];
					$_SESSION['cuffimage'] = $result[0][$left];
					?>
					<img id="5" src="admin/upload/shirt/<?php echo $_GET['class'];?>/<?php echo $_SESSION['cuffimage']; ?>" name="1buttonangle" title="Peace Maker" style="position: absolute; display: block; z-index: 5;">
					<?php
					break;
				case 'placket':
					//$_SESSION['fronttype'] = $fronttype[0];imageplacket
					//$_SESSION['frontimageplacket'] = $fronttype[1];
					$left =  $_SESSION['fronttype'];
					//echo "<br>". $leftas =   $result[0][$left];
					$_SESSION['frontimageplacket'] = $result[0][$left];
					?>
						<img id="11" src="admin/upload/shirt/<?php echo $_GET['class'];?>/<?php echo $_SESSION['frontimageplacket']; ?>" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 11;">
					<?php
					break;
				
			}
}
?>
<span id="collarfabric" name="<?php echo $_SESSION['productid']; ?>" class="<?php echo $_GET['class'];?>">&nbsp;</span>
<script type="text/javascript">
	$(document).ready(function() {
		$(".confirm").fancybox();
		$(".lastname").html("<?php echo $productresult[0]['productname']?>");
		var oldid_fabric =  "abc";
		var newid_fabric =  "def";
	});
</script>