<?php include("system/config.inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wish List |<?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
#fancybox-content {
	background:#FFF;
	padding:30px;
}
#fancybox-outer {
	-moz-border-radius:5px;
	float:left;
	width:auto !important;
}
#fancybox-close{
	display:none !important;	
}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$(".login_link_h").click(function(){
			var id = <?php echo $_REQUEST['id'];?>;			
			var dataString =  'id=' + id;
			$.ajax({
				type: "GET",
				url: "addtowishlist.php",
				data: dataString,
				cache: false,
				success: function(html){
					parent.$.fancybox.close();					
				}
			});
		});
	});	
	$(document).ready(function() {
		$(".close").click(function(){
			parent.$.fancybox.close();
		});
	});	
	
</script>
</head>
<body>
<div style="width:550px;" align="center">
	<div class="login_mainx" >
<!--		<table>
			<tr>
				<td colspan="3">
					<div class="login_title">
						<h1>SHOPPING BAG</h1>
					</div>
				</td>
			</tr>
		</table>
-->		
		
			<table>
			<tr>
				<td colspan="3">
					<div class="login_title">
						<h2>DO YOU WANT ADD THIS ITEM TO YOUR WISHLIST??</h2>
					</div>
				</td>				
			</tr>
			<tr>
				<td colspan="2">
                	
					<center><a id="login_link_h" class="login_link_h btn">&nbsp; &nbsp; &nbsp; &nbsp; YES &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
				<td>
					<center><a class="btn close"> &nbsp; &nbsp; &nbsp; &nbsp; NO &nbsp; &nbsp; &nbsp; &nbsp;</a></center>
				</td>
			</tr>
		</table>
	</div>
	</div>
</body>
</html>