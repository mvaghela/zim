<?php include("system/config.inc.php"); ?>
<?php
$sql = "select * from `shirtcustomization` where productid = ".$_GET['productid']."";
$result=$obj_db->select($sql); ?>

<?php if($_GET['eleid']=='fit') { ?>
<div class="customize-right-all-icon">
	<ul class="customize-icon">
		<?php if($result[0]['fit_slimfit']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['fit_slimfit'];?>"  alt="Slim Fit"/> <span>Slim Fit</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['fit_normalfit']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['fit_normalfit'];?>"  alt="Normal Fit"/> <span>Normal Fit</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['fit_loosefit']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['fit_loosefit'];?>"  alt="Loose Fit"/> <span>Loose Fit</span> </a> </li>
		<?php } ?>
	</ul>
</div>
<?php } ?>

<?php if($_GET['eleid']=='style') { ?>

<div class="customize-right-all-icon">
	<ul class="customize-icon">
		<?php if($result[0]['style_fullsleeve']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['style_fullsleeve'];?>"  alt="Full Sleeve"/> <span>Full Sleeve</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['style_halfsleeve']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['style_halfsleeve'];?>"  alt="Half Sleeve"/> <span>Half Sleeve</span> </a> </li>
		<?php } ?>
	</ul>
</div>
<?php } ?>

<?php if($_GET['eleid']=='collar') { ?>
<div class="customize-right-all-icon">
	<ul class="customize-icon">
		<?php if($result[0]['collar_straight']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_straight'];?>"  alt="Straight Collar"/> <span>Straight </span> </a> </li>
		<?php } ?>
		<?php if($result[0]['collar_classic']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_classic'];?>"  alt="Classic Collar"/> <span>Classic </span> </a> </li>
		<?php } ?>
		<?php if($result[0]['collar_spread']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_spread'];?>"  alt="Spread Collar"/> <span>Spread </span> </a> </li>
		<?php } ?>
		
		<?php if($result[0]['collar_cutaway']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_cutaway'];?>"  alt="Cutaway Collar"/> <span>Cutaway </span> </a> </li>
		<?php } ?>
		<?php if($result[0]['collar_fullcutaway']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_fullcutaway'];?>"  alt="Fullcutaway Collar"/> <span>Fullcutaway </span> </a> </li>
		<?php } ?>
		<?php if($result[0]['collar_englishcutaway']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_englishcutaway'];?>"  alt="Englishcutaway Collar"/> <span>Englishcutaway </span> </a> </li>
		<?php } ?>
		
		<?php if($result[0]['collar_curvedcutaway']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_curvedcutaway'];?>"  alt="Curvedcutaway Collar"/> <span>Curvedcutaway </span> </a> </li>
		<?php } ?>
		<?php if($result[0]['collar_cutawaybutton']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_cutawaybutton'];?>"  alt="Cutawaybutton Collar"/> <span>Cutawaybutton </span> </a> </li>
		<?php } ?>
		<?php if($result[0]['collar_bandedcollar']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_bandedcollar'];?>"  alt="Banded Collar"/> <span>Banded </span> </a> </li>
		<?php } ?>
		
		<?php if($result[0]['collar_wingup']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_wingup'];?>"  alt="Wingup Collar"/> <span>Wingup </span> </a> </li>
		<?php } ?>
		<?php if($result[0]['collar_buttondown']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_buttondown'];?>"  alt="Buttondown Collar"/> <span>Buttondown </span> </a> </li>
		<?php } ?>
		<?php if($result[0]['collar_rounded']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['collar_rounded'];?>"  alt="Rounded Collar"/> <span>Rounded </span> </a> </li>
		<?php } ?>
		
	</ul>
</div>
<?php } ?>

<?php if($_GET['eleid']=='cuff') { ?>
<div class="customize-right-all-icon">
	<ul class="customize-icon">
		<?php if($result[0]['cuff_singlebuttonmiter']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['cuff_singlebuttonmiter'];?>"  alt="SingleButtonMiter Cuff"/> <span>SingleButtonMiter</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['cuff_doublebuttonmiter']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['cuff_doublebuttonmiter'];?>"  alt="DoublButtonMiter Cuff"/> <span>DoubleButtonMiter</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['cuff_frenchbuttonmiter']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['cuff_frenchbuttonmiter'];?>"  alt="FrenchButtonMiter Cuff"/> <span>FrenchButtonMiter</span> </a> </li>
		<?php } ?>
		
		<?php if($result[0]['cuff_singlebuttonround']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['cuff_singlebuttonround'];?>"  alt="SingleButtonRound Cuff"/> <span>SingleButtonRound</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['cuff_doublebuttonround']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['cuff_doublebuttonround'];?>"  alt="DoubleButtonRound Cuff"/> <span>DoubleButtonRound</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['cuff_frenchbuttonround']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['cuff_frenchbuttonround'];?>"  alt="FrenchButtonRound Cuff"/> <span>FrenchButtonRound</span> </a> </li>
		<?php } ?>
		
		<?php if($result[0]['cuff_singlebuttonsquare']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['cuff_singlebuttonsquare'];?>"  alt="SingleButtonSquare Cuff"/> <span>SingleButtonSquare</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['cuff_doublebuttonsquare']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['cuff_doublebuttonsquare'];?>"  alt="DoubleButtonSquare Cuff"/> <span>DoubleButtonSquare</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['cuff_frenchbuttonsquare']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['cuff_frenchbuttonsquare'];?>"  alt="FrenchButtonSquare Cuff"/> <span>FrenchButtonSquare</span> </a> </li>
		<?php } ?>
	</ul>
</div>
<?php } ?>

<?php if($_GET['eleid']=='pocket') { ?>
<div class="customize-right-all-icon">
	<ul class="customize-icon">
		<?php if($result[0]['pocket_miter']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['pocket_miter'];?>"  alt="Pocket Miter"/> <span>Pocket Miter</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['pocket_round']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['pocket_round'];?>"  alt="Pocket Round"/> <span>Pocket Round</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['pocket_square']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['pocket_square'];?>"  alt="Pocket Square"/> <span>Pocket Square</span> </a> </li>
		<?php } ?>
		
		<?php if($result[0]['pocket_vshape']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['pocket_vshape'];?>"  alt="Pocket Vshape"/> <span>Pocket Vshape</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['pocket_nopocket']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['pocket_nopocket'];?>"  alt="No Pocket"/> <span>No Pocket</span> </a> </li>
		<?php } ?>
	</ul>
</div>
<?php } ?>

<?php if($_GET['eleid']=='front') { ?>
<div class="customize-right-all-icon">
	<ul class="customize-icon">
		<?php if($result[0]['front_placket']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['front_placket'];?>"  alt="Front Placket"/> <span>Front Placket</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['front_covered']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['front_covered'];?>"  alt="Front Covered"/> <span>Front Covered</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['front_noplacket']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['front_noplacket'];?>"  alt="Front No Placket"/> <span>Front No Placket</span> </a> </li>
		<?php } ?>
	</ul>
</div>
<?php } ?>

<?php if($_GET['eleid']=='back') { ?>
<div class="customize-right-all-icon">
	<ul class="customize-icon">
		<?php if($result[0]['back_sidepleats']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['back_sidepleats'];?>"  alt="Side Pleats"/> <span>Side Pleats</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['back_boxpleats']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['back_boxpleats'];?>"  alt="Box Pleats"/> <span>Box Pleats</span> </a> </li>
		<?php } ?>
		<?php if($result[0]['back_nopleats']) { ?>
		<li> <a href="#"> <img src="admin/upload/shirt/<?php echo $result[0]['back_nopleats'];?>"  alt="No Pleats"/> <span>No Pleats</span> </a> </li>
		<?php } ?>
		
		</ul>
</div>
<?php } ?>

