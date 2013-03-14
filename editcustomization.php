<?php include("system/config.inc.php");
//include("function/editmeasurement.php");
$sql="SELECT * FROM `save".$_REQUEST['type']."customize` WHERE `productid`='".$_REQUEST['productid']."' AND `userid`=".$_SESSION['userid'].""; 
$result=$obj_db->select($sql);

//-------------shirt--------------------------//

$fittype= explode('-',$result[0]['fit']);			
$fitimage = $fittype[1];
$fit_type= explode('_',$fittype[0]);			
			
$sleevetype= explode('-',$result[0]['style']);
$sleevetypeimage = $sleevetype[1];
$sleeve_type= explode('_',$sleevetype[0]);


$collartype= explode('-',$result[0]['collar']);
$collarimage = $collartype[1];
$collar_type= explode('_',$collartype[0]);
			
$cufftype= explode('-',$result[0]['cuff']);
$cuffimage = $cufftype[0];
$cuff_type= explode('_',$cufftype[0]);
			
$pockettype= explode('-',$result[0]['pocket']);
$pocketimage = $pockettype[1];
$pocket_type= explode('_',$pockettype[0]);

$fronttype= explode('-',$result[0]['front']);
$frontimage = $fronttype[1];
$front_type= explode('_',$fronttype[0]);


//-------------pant--------------------------//
$fittype = explode('-',$result[0]['fit']);			
$fitimage = $fittype[1];
$fit_type= explode('_',$fittype[0]);

$styletype = explode('-',$result[0]['style']);
$styleimage = $styletype[1];
$style_type= explode('_',$styletype[0]);


$waisttype = explode('-',$result[0]['waist']);
$waistimage = $waisttype[1];
$waist_type= explode('_',$waisttype[0]);


$frontpocket = explode('-',$result[0]['front_pocket']);
$frontpocketimage = $frontpocket[1];
$front_pocket= explode('_',$frontpocket[0]);


$pleatstype = explode('-',$result[0]['pleats']);
$pleatsimage = $pleatstype[1];
$pleat_stype= explode('_',$pleatstype[0]);


$back_pockettype = explode('-',$result[0]['back_pocket']);
$backpocketimage = $back_pockettype[1];
$back_pocket_type= explode('_',$back_pockettype[0]);


$back_pocket_styletype = explode('-',$result[0]['back_pocket_style']);
$back_pocket_styleimage = $back_pocket_styletype[1];
$back_pocket_style_type= explode('_',$back_pocket_styletype[0]);


$flytype = explode('-',$result[0]['fly']);
$flyimage = $flytype[1];
$fly_type= explode('_',$flytype[0]);


$belt_style = explode('-',$result[0]['belt_style']);
$belt_styleimage = $belt_style[1];
$belt_style_type= explode('_',$belt_style[0]);


/*-------------SUIT--------------------*/
$piecetype = explode('-',$result[0]['piece']);
$pieceimage = $piecetype[1];

$lapeltype = explode('-',$result[0]['lapel']);
$lapelimage = $lapeltype[1];

$ventstype = explode('-',$result[0]['vents']);
$ventsimage = $ventstype[1];

$buttonstype = explode('-',$result[0]['buttons']);
$buttonsimage = $buttonstype[1];

$suit_pocket_type = explode('-',$result[0]['pocket']);
$suit_pocket_image = $suit_pocket_type[1];

$breast_pocket_type = explode('-',$result[0]['breast_pocket']);
$breast_pocket_image = $breast_pocket_type[1];

$ticket_pocket_type = explode('-',$result[0]['ticket_pocket']);
$ticket_pocket_image = $ticket_pocket_type[1];

$suit_sleeve_type = explode('-',$result[0]['sleeve']);
$suit_sleeve_image = $suit_sleeve_type[1];

$buttonhole_type = explode('-',$result[0]['buttonhole']);
$buttonhole_image = $buttonhole_type[1];

$inner_lining_type = explode('-',$result[0]['inner_lining']);
$inner_lining_image = $inner_lining_type[1];

$vests_button_type = explode('-',$result[0]['vests_button']);
$vests_button_image = $vests_button_type[1];

$vests_back_type = explode('-',$result[0]['vests_back']);
$vests_back_image = $vests_back_type[1];

$vests_pocket_type = explode('-',$result[0]['vests_pocket']);
$vests_pocket_image = $vests_pocket_type[1];

$vests_breat_pocket_type = explode('-',$result[0]['vests_breat_pocket']);
$vests_breat_pocket_image = $vests_breat_pocket_type[1];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style type="text/css">
#fancybox-outer {
	-moz-border-radius:5px;
	float:left;
	width:auto !important;
}
#fancybox-content {
	background:#FFF;
	padding:10px;
}
#fancybox-close{
	display:none !important;	
}
</style>
</head>
<body>
<div style="width:400px;" align="center">
	<script type="text/javascript">
		  jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#measurement").validationEngine();
		});
	</script>
	<div class="login_main" id="register">
		<form action="editmeasurement.php" method="post" name="measurement" id="measurement">
			<input type="hidden" name="type" value="<?php echo $_REQUEST['type'];?>" />
			<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
			<table>
			<?php if($_REQUEST['type']=='shirt'){?>
			<h2>Shirt Measurement</h2>
			<div>&nbsp;</div>
				<tr>
					<td>Fit Type</td>
					<td>:</td>
					<td><?php echo $fit_type[1];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=shirt&act=fit" class="confirm">Modify</a></td>
				</tr>
				<tr>
					<td>Sleeve Type</td>
					<td>:</td>
					<td><?php echo $sleeve_type[1];?> Sleeve &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=shirt&act=sleeve" class="confirm">Modify</a></td>
				</tr>
				<tr>
					<td>Collar Type</td>
					<td>:</td>
					<td><?php echo $collar_type[1];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=shirt&act=collar" class="confirm">Modify</a></td>
				</tr>
				<?php if($sleeve_type[1]!='half'){?>
				<tr>
					<td>Cuff Type</td>
					<td>:</td>
					<td><?php echo $cuff_type[1];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=shirt&act=cuff" class="confirm">Modify</a></td>
				</tr>
				<?php } ?>
				<tr>
					<td>Pocket Type</td>
					<td>:</td>
					<td><?php echo $pocket_type[1];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=shirt&act=pocket" class="confirm">Modify</a></td>
				</tr>
				<tr>
					<td>Front Placket Type</td>
					<td>:</td>
					<td><?php echo $front_type[1];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=shirt&act=front_pocket" class="confirm">Modify</a></td>
				</tr>				
				
			<?php }?>
			<?php if($_REQUEST['type']=='pant'){?>
			<h2>Pant Customization</h2>
			<div>&nbsp;</div>				
				<tr>
					<td>Fit Type</td>
					<td>:</td>
					<td><?php echo $fit_type[1];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=pant&act=fit_type" class="confirm">Modify</a></td>
				</tr>
				<tr>
					<td>Style Type</td>
					<td>:</td>
					<td><?php echo $style_type[2];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=pant&act=style_type" class="confirm">Modify</a></td>
				</tr>
				<tr>
					<td>Waist Type</td>
					<td>:</td>
					<td><?php echo $waist_type[1];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=pant&act=waist_type" class="confirm">Modify</a></td>
				</tr>
				<tr>
					<td>Front Pocket Type</td>
					<td>:</td>
					<td><?php echo $front_pocket[2];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=pant&act=front_pocket_type" class="confirm">Modify</a></td>
				</tr>
				<tr>
					<td>Pleats Type</td>
					<td>:</td>
					<td><?php echo $pleat_stype[1];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=pant&act=pleat_type" class="confirm">Modify</a></td>
				</tr>
				<tr>
					<td>Back Pocket Type</td>
					<td>:</td>
					<td><?php echo $back_pocket_type[4];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=pant&act=back_pocket_type" class="confirm">Modify</a></td>
				</tr>
				<tr>
					<td>Back Pocket Style</td>
					<td>:</td>
					<td><?php echo $back_pocket_style_type[5];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=pant&act=back_pocket_style" class="confirm">Modify</a></td>
				</tr>
				<tr>
					<td>Fly Type</td>
					<td>:</td>
					<td><?php echo $fly_type[1];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=pant&act=fly_type" class="confirm">Modify</a></td>
				</tr>
				<tr>
					<td>Belt Style Type</td>
					<td>:</td>
					<td><?php 
					if($belt_style_type[5]=='buttoned'){
					echo $belt_style_type[3]." ".$belt_style_type[4]." ".$belt_style_type[5]; } else {
					echo $belt_style_type[3]." ".$belt_style_type[4];
					}?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=pant&act=belt_style" class="confirm">Modify</a></td>
				</tr>						
			<?php }?>
			<?php if($_REQUEST['type']=='suit'){?>
			<h2>Edit Blazer Measurement</h2>	
			<div>&nbsp;</div>						
				<tr>
					<td>SUIT Piece</td>
					<td>:</td>
					<td>
						<?php echo $piecetype[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=piece&front=true" class="confirm">Modify</a>
					</td>
				</tr>
				<tr>
					<td>Lapel</td>
					<td>:</td>
					<td>
						<?php echo $lapeltype[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=lapel&front=true" class="confirm">Modify</a>
					</td>
				</tr>
				<tr>
					<td>Vent Type</td>
					<td>:</td>
					<td>
						<?php echo $ventstype[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=vent_type&front=true" class="confirm">Modify</a>
					</td>
				</tr>
				<tr>
					<td>Button Type</td>
					<td>:</td>
					<td>
						<?php echo $buttonstype[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=button_type&front=true" class="confirm">Modify</a>
					</td>
				</tr>
				<tr>
					<td>Poket Style</td>
					<td>:</td>
					<td>
						<?php echo $suit_pocket_type[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=pocket_style&front=true" class="confirm">Modify</a>
					</td>
				</tr>
				<tr>
					<td>Breast Pocket</td>
					<td>:</td>
					<td>
						<?php echo $breast_pocket_type[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=breast_pocket&front=true" class="confirm">Modify</a>
					</td>
				</tr>
				<tr>
					<td>Ticket Pocket</td>
					<td>:</td>
					<td>
						<?php echo $ticket_pocket_type[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=ticket_pocket&front=true" class="confirm">Modify</a>
					</td>
				</tr>
				<tr>
					<td>SUIT Sleeve</td>
					<td>:</td>
					<td>
						<?php echo $suit_sleeve_type[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=suit_sleeve&front=true" class="confirm">Modify</a>
					</td>
				</tr>
				<tr>
					<td>Buttonhole</td>
					<td>:</td>
					<td>
						<?php echo $buttonhole_type[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=buttonhole&front=true" class="confirm">Modify</a>
					</td>
				</tr>
				<tr>
					<td>Inner Lining</td>
					<td>:</td>
					<td>
						<?php echo $inner_lining_type[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=inner_lining&front=true" class="confirm">Modify</a>
					</td>
				</tr>
				<?php if($piecetype[0]=='three_piece'){?>
				<tr>
					<td>Vest Button</td>
					<td>:</td>
					<td>
						<?php echo $vests_button_type[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=vest_button&back=true" class="confirm">Modify</a>
					</td>
				</tr>	
				<tr>
					<td>Vest Back</td>
					<td>:</td>
					<td>
						<?php echo $vests_back_type[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=vest_back&back=true" class="confirm">Modify</a>
					</td>
				</tr>
				<tr>
					<td>Vest Pocket</td>
					<td>:</td>
					<td>
						<?php echo $vests_pocket_type[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=vest_pocket&back=true" class="confirm">Modify</a>
					</td>
				</tr>
				<tr>
					<td>Vest Breast Pocket</td>
					<td>:</td>
					<td>
						<?php echo $vests_breat_pocket_type[0];?> &nbsp;&nbsp;<a href="showcustomization.php?productid=<?php echo $result[0]['productid'];?>&type=suit&act=vest_breast_pocket&back=true" class="confirm">Modify</a>
					</td>
				</tr>
				<?php }?>
			<?php }?>
				
			</table>			
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".confirm").fancybox();
	});
</script>
</body>
</html>