<?php include("system/config.inc.php"); 

$sql = "select * from `shirtcustomization` where productid = ".$_SESSION['productid']."";
$result=$obj_db->select($sql);
//echo ($_REQUEST['productid']);
					
switch($_GET['id'])
	{
		case 'fit':
			//$update_string = substr($_GET['image'],0,3);
			$fittype= explode('-',$_GET['image']);
			echo $_SESSION['fittype'] = $fittype[0];
			$_SESSION['fitimageupper'] = $fittype[1];
			$_SESSION['fitimagebottom'] = $fittype[2];
			break;
		case 'style':
			$sleevetype= explode('-',$_GET['image']);
			echo $_SESSION['sleevetype'] = $sleevetype[0];
			$_SESSION['styleimageleft'] = $sleevetype[1];
			$_SESSION['styleimageright'] = $sleevetype[2];

			//$_SESSION['styleimage'] = $_GET['image'];
			break;
		case 'collar':
			$collarimage= explode('-',$_GET['image']);
			$_SESSION['collarimageouter'] = $collarimage[0];
			$_SESSION['collarimageinner'] = $collarimage[1];
			$_SESSION['collarimagebutton'] = $collarimage[2];
			$_SESSION['collarimagebuttonhole'] = $collarimage[3];
			break;
		case 'cuff':
			$cuffimage= explode('-',$_GET['image']);
			$_SESSION['cuffimage'] = $cuffimage[0];
			$_SESSION['cuffimageinner'] = $cuffimage[1];
			$_SESSION['cuffimagebutton'] = $cuffimage[2];
			$_SESSION['cuffimagebuttonhole'] = $cuffimage[3];
			$_SESSION['cuffimagebuttonsttich'] = $cuffimage[4];
			//$_SESSION['cuffimageinner'] = $cuffimage[5];
			break;
		case 'pocket':
			$_SESSION['pocketimage'] = $_GET['image'];
			break;
		case 'front':
			$frontimage= explode('-',$_GET['image']);
			$_SESSION['frontimageplacket'] = $frontimage[0];
			$_SESSION['frontimagebutton'] = $frontimage[1];
			$_SESSION['frontimagebuttonstitch'] = $frontimage[2];
			break;
		case 'back':
			$_SESSION['backimage'] = $_GET['image'];
			break;	
		
	}
?>
<div id="fabric_design_details_middle_picture_view1" class="">
<!----------------fit ----------------->
<img id="0" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['fitimageupper']; ?>" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 0;">
<img id="1" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['fitimagebottom']; ?>" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 1;">

<!----------------Style---------------->
<img id="2" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['styleimageleft']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 2;">
<img id="2" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['styleimageright']; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 2;">


<!----------------pocket---------------->
<img id="3" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['pocketimage']; ?>" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 3;">


<!----------------Blank---------------->
<img id="20" src="images/shirts/rounded_files/shirtimage/blank.gif" name="undefined" title="undefined" style="position: absolute; display: block; z-index: 20;">
<img id="19" src="images/shirts/rounded_files/shirtimage/blank.gif" name="undefined" title="undefined" style="position: absolute; display: block; z-index: 19;">
<img id="18" src="images/shirts/rounded_files/shirtimage/blank.gif" name="sewn in" title="sewn in" style="position: absolute; display: block; z-index: 18;">
<img id="4" src="images/shirts/rounded_files/shirtimage/blank.gif" name="noloops" title="noloops" style="position: absolute; display: block; z-index: 4;">

<!----------------Cuff---------------->
<img id="5" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['cuffimage']; ?>" name="1buttonangle" title="Peace Maker" style="position: absolute; display: block; z-index: 5;">
<img id="6" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['cuffimageinner']; ?>" name="1buttonangle" title="Peace Maker" style="position: absolute; display: block; z-index: 6;">
<img id="7" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['cuffimagebutton']; ?>" name="1buttonangle" title="shell shocked" style="position: absolute; display: block; z-index: 7;">
<img id="8" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['cuffimagebuttonhole']; ?>" name="1buttonangle" title="white" style="position: absolute; display: block; z-index: 8;">
<img id="9" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['cuffimagebuttonsttich']; ?>" name="1buttonangle" title="Peace Maker" style="position: absolute; display: block; z-index: 9;">
<img id="10" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['cuffimage6']; ?>" name="1buttonangle" title="Peace Maker" style="position: absolute; display: block; z-index: 10;">

<!----------------front placket---------------->
<img id="11" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['frontimageplacket']; ?>" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 11;">
<img id="12" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['frontimagebutton']; ?>" name="standard" title="white" style="position: absolute; display: block; z-index: 12;">
<img id="13" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['frontimagebuttonstitch']; ?>" name="standard" title="shell shocked" style="position: absolute; display: block; z-index: 13;">

<!----------------collar---------------->
<img id="14" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['collarimageouter']; ?>" name="classic" title="Peace Maker" style="position: absolute; display: block; z-index: 14;">
<img id="15" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['collarimageinner']; ?>" name="classic" title="Peace Maker" style="position: absolute; display: block; z-index: 15;">
<img id="16" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['collarimagebutton']; ?>" name="classic" title="shell shocked" style="position: absolute; display: block; z-index: 16;">
<img id="17" src="admin/upload/shirt/<?php echo $_SESSION['product'];?>/<?php echo $_SESSION['collarimagebuttonhole']; ?>" name="classic" title="white" style="position: absolute; display: block; z-index: 17;">
</div>