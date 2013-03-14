<?php 
include("system/config.inc.php");
if($_REQUEST['tx']!='' && $_REQUEST['cm']!='' && $_REQUEST['item_number']!=''){	
	$select_user="SELECT * FROM `user` WHERE `userid`=".$_REQUEST['cm']."";
	$user_res=$obj_db->select($select_user);	
?>	
<html>
<head>
<title>Cancel Payment</title>
<script src="js/jquery-latest.js" type="text/javascript"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
</head>
<body>
<script type="text/javascript">
$(document).ready(function(){
	$.fancybox({
		href:"#cancel",
		'showCloseButton' : false,
		'hideOnOverlayClick' : false
	});	
});
</script>
<div style="width:100%; height:100%;">
	<div id="cancel">
		<div class="cancel_title">
			<img src="images/zymba.png"><br><br>
			Hello, <?php echo $user_res[0]['firstname'];?><br>
			Your last purchase of a product from zymba.com has been cancelled.
		</div>
		<div class="cancel_msg">
			<a href="index.php">Click here</a> to go to Home Page.
		</div>
	</div>
</div>
</body>
</html>
<?php	
}
else{
	header("location:index.php");
}
?>
