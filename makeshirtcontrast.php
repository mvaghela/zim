<?php include("system/config.inc.php"); 

//$contastimage= explode('-',$_GET['class']);
$sql = "select * from `shirtcustomization` where productid = ".$_GET['image']."";
$result=$obj_db->select($sql);

?>
<span style="position:absolute" id="collarfabric" name="<?php echo $_GET['image']; ?>" class="<?php echo $_SESSION['productid'];?>">&nbsp;</span>

<?php
$_SESSION['contrastfabric'] = $_GET['fabricid'];

if($_GET['class']=='location' || $_GET['class']=='location active' || $_GET['class']=='fabric' ){				
		switch($_GET['id'])
			{
					
				case 'collar' :
					//echo "collar";
					if($_GET['image']==$_SESSION['productid']){
						//echo "no";
						$_SESSION['contrastfabriccollar'] = 'yes';
					} else {
						//echo "yes";
						$_SESSION['contrastfabriccollar'] = 'no';
					}
					$left =  $_SESSION['collartype'];
					$_SESSION['collarimage'] = $result[0][$left]; ?>
					<img id="14" src="admin/upload/shirt/<?php echo $_GET['image'];?>/<?php echo $_SESSION['collarimage']; ?>" name="classic" title="Peace Maker" style="position: absolute; display: block; z-index: 14;">
					
 					<?php
					break;
				case 'cuff':
					if($_GET['image']==$_SESSION['productid']){
						//echo "no";
						$_SESSION['contrastfabriccuff'] = 'no';
					} else {
						//echo "yes";
						$_SESSION['contrastfabriccuff'] = 'yes';
					}
					$left =  $_SESSION['cufftype'];
					//echo "cuff";
					$_SESSION['cuffimage'] = $result[0][$left];	?>
					<img id="5" src="admin/upload/shirt/<?php echo $_GET['image'];?>/<?php echo $_SESSION['cuffimage']; ?>" name="1buttonangle" title="Peace Maker" style="position: absolute; display: block; z-index: 5;">
					<?php
					break;
				case 'placket':
				
					if($_GET['image']==$_SESSION['productid']){
						//echo "no";
						$_SESSION['contrastfabricplacket'] = 'no';
					} else {
						//echo "yes";
						$_SESSION['contrastfabricplacket'] = 'yes';
					}
					$left =  $_SESSION['fronttype'];
					$_SESSION['frontimageplacket'] = $result[0][$left];	?>
						<img id="11" src="admin/upload/shirt/<?php echo $_GET['image'];?>/<?php echo $_SESSION['frontimageplacket']; ?>" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 11;">
					<?php
					break;
				default :
					$collar =  $_SESSION['collartype'];
				 	$_SESSION['collarimage'] = $result[0][$collar];
				 ?>
					<img id="14" src="admin/upload/shirt/<?php echo $_GET['image'];?>/<?php echo $_SESSION['collarimage']; ?>" name="classic" title="Peace Maker" style="position: absolute; display: block; z-index: 14;">
			<?php }
}
?>

