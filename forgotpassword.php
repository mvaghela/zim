<?php 
include("system/config.inc.php");
include("function/forgotpassword.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot password</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
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
<script language="javascript">
	jQuery(document).ready(function(){
		jQuery("#emailform").validationEngine();
	});
</script>
<body>
	<div style="width:370px;" align="center">
		<div class="login_main" >
			<form id="emailform" method="post" action="forgotpassword.php"> 
				<table width="350">
					<tr>
						<td colspan="2"><div class="login_title"><h1>Forgot Password</h1></div></td>
					</tr>
					<tr>
						<td>Enter your email : </td>
						<td><input type="text" name="email" class="login_text validate[required,maxSize[250],custom[email]]" id="email"/></td>			
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="submit" class="btn" value="Send" /></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>