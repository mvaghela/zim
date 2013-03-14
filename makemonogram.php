<?php include("system/config.inc.php"); 

$option_sql="select * from `monogramoption`";
$option_result=$obj_db->select($option_sql);


$colour_sql="select * from `monogramcolor` where `id` = '".$_REQUEST['colour']."'";
$colour_result=$obj_db->select($colour_sql);
$red = $colour_result[0]['rgb_r'];
$green = $colour_result[0]['rgb_g'];
$blue = $colour_result[0]['rgb_b'];
$_SESSION['monogramcolour'] = $colour_result[0]['name'];

$font_sql="select * from `monogramfont` where `id` = '".$_REQUEST['fonttype']."'";
$font_result=$obj_db->select($font_sql);
$fonttype = $font_result[0]['font'];
$_SESSION['monogramfont'] = $font_result[0]['name'];

$_SESSION['monogramtext'] = $_REQUEST['name'];

switch($_REQUEST['place'])
			{
				case $option_result[0]['name'] :
				$_SESSION['monogramcuff'] = 'yes';
				$_SESSION['monogramoption'] = $option_result[0]['name'];
				$_SESSION['monogrampricenew'] = $_SESSION['monogramprice'] + $option_result[0]['price'];
				 ?>
					<img src="imagegenerate.php?name=<?php echo $_REQUEST['name']; ?>&red=<?php echo $red; ?>&green=<?php echo $green; ?>&blue=<?php echo $blue; ?>&fonttype=<?php echo $fonttype; ?>&angle1=-40&angle2=-40" style="position: absolute; left: 200px; top: 395px; z-index:999 ;"/>
 		<?php break;
				case $option_result[1]['name'] :
				$_SESSION['monogrampocket'] = 'yes';
				$_SESSION['monogramoption'] = $option_result[1]['name'];
				$_SESSION['monogrampricenew'] = $_SESSION['monogramprice'] + $option_result[1]['price'];
				?>
					<img src="imagegenerate.php?name=<?php echo $_REQUEST['name']; ?>&red=<?php echo $red; ?>&green=<?php echo $green; ?>&blue=<?php echo $blue; ?>&fonttype=<?php echo $fonttype; ?>&angle1=0&angle2=0" style="position: absolute; left:145px; top: 145px; z-index:999 ;"/> 
		<?php break;
				case $option_result[2]['name'] :
				$_SESSION['monogramplacket'] = 'yes';
				$_SESSION['monogramoption'] = $option_result[2]['name'];
				$_SESSION['monogrampricenew'] = $_SESSION['monogramprice'] + $option_result[2]['price'];
				?>
						<img src="imagegenerate.php?name=<?php echo $_REQUEST['name']; ?>&red=<?php echo $red; ?>&green=<?php echo $green; ?>&blue=<?php echo $blue; ?>&fonttype=<?php echo $fonttype; ?>&angle1=0&angle2=0&for=placket" style="position: absolute; left: 110px; top: 450px; z-index:999 ;" height="80px"/>
		<?php break; 
		case $option_result[3]['name'] :
				$_SESSION['monogramcuffpocket'] = 'yes';
				$_SESSION['monogramoption'] = $option_result[3]['name'];
				$_SESSION['monogrampricenew'] = $_SESSION['monogramprice'] + $option_result[3]['price'];
				?>
						<img src="imagegenerate.php?name=<?php echo $_REQUEST['name']; ?>&red=<?php echo $red; ?>&green=<?php echo $green; ?>&blue=<?php echo $blue; ?>&fonttype=<?php echo $fonttype; ?>&angle1=-40&angle2=-40" style="position: absolute; left: 200px; top: 395px; z-index:999 ;"/>
						<img src="imagegenerate.php?name=<?php echo $_REQUEST['name']; ?>&red=<?php echo $red; ?>&green=<?php echo $green; ?>&blue=<?php echo $blue; ?>&fonttype=<?php echo $fonttype; ?>&angle1=0&angle2=0" style="position: absolute; left:145px; top: 145px; z-index:999 ;"/>
		<?php break; ?>
<?php } ?>


<script type="text/javascript">
	$(document).ready(function() {
		$(".proprice").html("<?php echo $_SESSION['monogrampricenew']?>");
	});
</script>
