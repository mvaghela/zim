<link href='http://fonts.googleapis.com/css?family=Anaheim' rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<!--<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font" />-->
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="css/validationEngine.css" type="text/css"/>
<script src="js/validationEngine_001.js" type="text/javascript" charset="utf-8"></script>
<script src="js/validationEngine_002.js" type="text/javascript" charset="utf-8"></script>

<!-- fancy box script end-->
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<link rel="stylesheet" href="css/basic-jquery-slider.css">
<script src="js/basic-jquery-slider.js"></script> 
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
	$(document).ready(function() {
		$(".confirm").fancybox();
	});
	$(document).ready(function() {
		$(".login_link_h").fancybox();
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".login_link_h").fancybox();
	});
	$(document).ready(function() {
		$(".register_link_h").fancybox();
	});
	$(document).ready(function() {
			$("#register").fancybox();
		});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#login_link_h").fancybox();
	});
	$(document).ready(function() {
		$("#register_link_h").fancybox();
	});
	$(document).ready(function() {
		$(".shop").fancybox();
	});
<?php if($_REQUEST['acn']=='addtobag'){ ?>
	$(document).ready(function () {
		$.fancybox({
			'href': 'confirmmsg.php?acn=addtobag',
		});
	});
<?php } ?>

<?php if($_REQUEST['acn']=='savecust'){ ?>
	$(document).ready(function () {
		$.fancybox({
			'href': 'savecustomize.php?acn=savecust',
		});
	});
<?php } ?>

<?php if($_REQUEST['acn']=='usedcustomize'){ ?>
	$(document).ready(function () {
		$.fancybox({
			'href': 'savecustomize.php?acn=usedcustomize',
		});
	});
<?php } ?>	



<?php if($_REQUEST['acn']=='usedcustomizesuit'){ ?>
	$(document).ready(function () {
		$.fancybox({
			'href': 'savecustomizesuit.php?acn=usedcustomizesuit',
		});
	});
<?php } ?>



<?php if($_REQUEST['acn']=='usedcustomizepant'){ ?>
	$(document).ready(function () {
		$.fancybox({
			'href': 'savecustomizepants.php?acn=usedcustomizepant',
		});
	});
<?php } ?>

<?php if($_REQUEST['msg']==1){ ?>
	$(document).ready(function () {
		$.fancybox({
			'href': 'login.php?msg=1',
		});
	});
<?php } ?>
<?php if($_REQUEST['msg']==2){ ?>
	$(document).ready(function () {
		$.fancybox({
			'href': 'login.php?msg=2'
		});
	});
<?php } ?>
<?php if($_REQUEST['msg']==3){ ?>
	$(document).ready(function () {
		$.fancybox({
			'href': 'login.php?msg=3'
		});
	});
<?php } ?>
<?php if($_REQUEST['msg']==4){ ?>
	$(document).ready(function () {
		$.fancybox({
			'href': 'register.php?msg=4'
		});
	});
<?php } ?>
<?php if($_REQUEST['msg']==5){ ?>
	$(document).ready(function () {
		$.fancybox({
			'href': 'register.php?msg=5'
		});
	});
<?php } ?>

</script>
<!-- fancy box script end-->
<?php
/*if($_SESSION['userid']) {
	$user = $_SESSION['userid']; }
else {
	$user = $_SESSION['key']; 
}*/

$sql="SELECT * FROM `cart` 
				LEFT OUTER JOIN `product`
				ON product.productid=cart.productid
				WHERE cart.cartsessionid='".$_SESSION['key']."' ORDER BY `cart`.`cartid` DESC "; 
$result=$obj_db->select($sql);
?>

<div class="top">
	<div class="wrapper">
		<ul>
			<?php if (($_SESSION['userid'])=='') { ?>
			<li><a href="login.php" id="login_link_h">LOGIN</a></li>
			<li><a href="register.php" id="register_link_h">REGISTER</a></li>
			<?php } else { ?>
			<li><a href="my_account.php">Hi, <?php if($_SESSION['firstname']=='') { echo $_SESSION['email']; } else { echo $_SESSION['firstname']; } ?></a></li>
			<li><a href="logout.php" >LOGOUT</a></li>
			<?php }?>            
			<li><a href="shoppingcart.php" class="shop" id="shopping">SHOPPING BAG (<?php echo count($result);?>)</a>
				<div class="cartpop" id="addedtocart"  >
					<table class="notification">
						<tbody>
							<tr>
								<td colspan="2"> Following product Added to your bag. </td>
							</tr>
							<tr>
								<td><?php echo $result[0]['productname']; ?></td>
								<td>$<?php echo $result[0]['price']; ?></td>
							</tr>
							<tr>
								<td colspan="2">
								 	<a href="shoppingcart.php" class="shop btn" id="shopping">View SHOPPING BAG</a>
									<a href="shirt.php" class="btn" >Continue Shoping</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</li>
			<!--<li><a href="#"><img src="images/search-icon.png" alt="Search Icon" /></a></li>-->
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="header">
		<div class="logo"><a href="index.php"><img src="images/Zymba-logo.jpg" alt="Zymaba" /></a></div>
	</div>
</div>
