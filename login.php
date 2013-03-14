<?php include("system/config.inc.php");
include("function/login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | <?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
#fancybox-content{
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
		$(".login_link_h").fancybox();
	});
	$(document).ready(function() {
		$(".register_link_h").fancybox();
	});
	$(document).ready(function() {
		$("#register").fancybox();
	});
	$(document).ready(function() {
		$("#forgot").fancybox();
	});
</script>

</head>
<body>
<div style="width:325px;" align="center">
<?php if($_GET['msg']=='1'){ 
		echo '<div class="message errormsg" style="display: block;"><p>Username or password in correct.</p>
		<span class="close" title="Dismiss"></span>
		</div>'; ?>
<?php } ?>
<?php if($_GET['msg']=='2'){ 
		echo '<div class="message errormsg" style="display: block;"><p>Your Account is inactive.</p>
		<span class="close" title="Dismiss"></span>
		</div>'; ?>
<?php } ?>
<?php if($_GET['msg']=='3'){ 
		echo '<div class="message errormsg" style="display: block;"><p>Your Account is block by admin.</p>
		<span class="close" title="Dismiss"></span>
		</div>'; ?>
<?php } ?>
<script language="javascript">
		jQuery(document).ready(function(){
			jQuery("#formID_login").validationEngine();
		});
</script>

<div class="login_main" >
	<form action="login.php" method="post" id="formID_login" class="formular">
		<input type="hidden" name="return" value="<?php echo $_GET['msg']; ?>" />
		<table>
			<tr>
				<td colspan="3"><div class="login_title"><h1>Login</h1></div></td>
			</tr>			
			<tr>
				<td width="80px">Email</td>
				<td>:</td>
				<td><input type="text" class="login_text validate[required,maxSize[250],custom[email]]" name="email" id="email" value="" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" class="login_text validate[required,maxSize[150]]" name="password" id="password" value="" /></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="checkbox" name="remember" value="1"/><span>Remember Me</span></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="submit" class="btn" value="Login" /></td>
			</tr>
			<?php if($_SESSION['redirecturlusedcustomize']){ } else { ?>
			<tr>
				<td colspan="3">
					<div>Don't have an Account? <a id="register" href="register.php">Click here</a> to create one.</div>
					<div>Forgot password? <a id="forgot" href="forgotpassword.php">click here</a></div>
				</td>
			</tr>
			<?php }?>
	</table>
	</form>
<script type="text/javascript">
	$(".message").click(function () {
	  $(".message").hide("slow");
	});    
</script>
</div>
</div>
</body>
</html>