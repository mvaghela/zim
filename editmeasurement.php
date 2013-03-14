<?php include("system/config.inc.php");
//include("function/editmeasurement.php");
$sql="SELECT * FROM `".$_REQUEST['type']."_measurements` WHERE `measurement_id`='".$_REQUEST['id']."' AND `user_id`=".$_SESSION['userid'].""; 
$result=$obj_db->select($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Measurement</title>
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
					<td>Body Shape</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['body_shape']; ?>&nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=shirt&col=body_shape&row=17&image=image" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Shirt Fit</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['shirt_fit']; ?>&nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=shirt&col=shirt_fit&row=18&image=image" class="edit">modify</a>
					</td>
				</tr>
				
				<tr>
					<td>Shirt Length</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['shirt_length']; ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=shirt&col=shirt_length&row=1" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Shoulder</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['shirt_shoulder']; ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=shirt&col=shirt_shoulder&row=2" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Sleeve</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['shirt_sleeve_length'] ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=shirt&col=shirt_sleeve_length&row=3" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Chest</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['chest'] ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=shirt&col=chest&row=4" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Stomach</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['stomach'] ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=shirt&col=stomach&row=5" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Hip</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['hip'];?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=shirt&col=hip&row=6" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Neck</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['shirt_neck']; ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=shirt&col=shirt_neck&row=7" class="edit">modify</a>
					</td>
				</tr>				
				<tr>
					<td>Knee</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['shirt_knee']; ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=shirt&col=shirt_knee&row=8" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Wrist</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['wrist']; ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=shirt&col=wrist&row=9" class="edit">modify</a>
					</td>
				</tr>
			<?php }?>
			<?php if($_REQUEST['type']=='pant'){?>
			<h2>Pant Measurement</h2>
			<div>&nbsp;</div>	
			
				<tr>
					<td>Body Shape</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['body_shape']; ?>&nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=pant&col=body_shape&row=19&image=image" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Pant Fit</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['pant_fit']; ?>&nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=pant&col=pant_fit&row=20&image=image" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Pant Waitst Type</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['pant_waist_image']; ?>&nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=pant&col=pant_waist_image&row=21&image=image" class="edit">modify</a>
					</td>
				</tr>
							
				<tr>
					<td>Waist Level</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['waist_level']; ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=pant&col=waist_level&row=12" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Pant Length</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['pant_length']; ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=pant&col=pant_length&row=13" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Pant Waist</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['pant_waist'] ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=pant&col=pant_waist&row=14" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Pant Hip</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['pant_hip'] ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=pant&col=pant_hip&row=15" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>Pant Bottom</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['pant_bottom'] ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=pant&col=pant_bottom&row=16" class="edit">modify</a>
					</td>
				</tr>
			<?php }?>
			<?php if($_REQUEST['type']=='blazer'){?>
			<h2>Blazer Measurement</h2>
			<div>&nbsp;</div>
				<tr>
					<td>SUIT Length</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['suit_length']; ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=blazer&col=suit_length&row=0" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>SUIT Shoulder</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['suit_shoulder']; ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=blazer&col=suit_shoulder&row=10" class="edit">modify</a>
					</td>
				</tr>
				<tr>
					<td>SUIT Sleeve</td>
					<td>:</td>
					<td>
						<?php echo $result[0]['suit_sleeve_length'] ?>" &nbsp;&nbsp;&nbsp; <a href="showmeasurement.php?id=<?php echo $result[0]['measurement_id'];?>&type=blazer&col=suit_sleeve_length&row=11" class="edit">modify</a>
					</td>
				</tr>			
			<?php }?>
			</table>			
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".edit").fancybox();
	});
</script>
</body>
</html>