<?php include("system/config.inc.php");
include("function/register.php");
$sql="SELECT * FROM `user` WHERE `userid`='".$_SESSION['userid']."'"; 
$user_res=$obj_db->select($sql);
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
<script type="text/javascript">
	$(document).ready(function() {
		$("#login_link_h").fancybox();
	});
</script>
</head>
<body>
<div style="width:400px;" align="center">
	<?php if($_REQUEST['msg']=="5") {
			echo '<div class="message success" style="display: block; background-image:none;"><p>Record Uploaded Successfully.</p>
			<span class="close" title="Dismiss"></span>
			</div>';
		}
		if($_REQUEST['msg']=="4") {
			echo '<div class="message errormsg" style="display: block; background-image:none;"><p>This email already exist. </p>
			<span class="close" title="Dismiss"></span>
			</div>';
		} ?>
	<script type="text/javascript">
              jQuery(document).ready(function(){
                // binds form submission and fields to the validation engine
                jQuery("#loginform").validationEngine();
            });
        </script> 
	<script type="text/javascript">
		$(document).ready(function() {
			$("#login").fancybox();
		});
</script>
	<div class="login_main" id="register">
		<form action="register.php" method="post" name="loginform" id="loginform">
			<table width="390">
				<?php if($_SESSION['userid']=='') { ?>
				<tr>
					<th align="left" colspan="3">
						<div class="login_title">
							<h1>Sign up to be a member.</h1>
						</div>
					</th>
				</tr>
				<?php } else { ?>
				<tr>
					<th align="left" colspan="3">
						<div class="login_title">
							<h1>Update Membership Detail.</h1>
						</div>
					</th>
				</tr>
				<?php } ?>
				<!--<tr>
					<td>First name</td>
					<td>:</td>
					<td>
						<input class="validate[required,maxSize[150]] login_text" type="text" name="firstname" id="firstname" value="<?//php if($_SESSION['userid']) { echo $user_res[0]['firstname']; } else { echo $_SESSION['firstname']; } ?>" />
					</td>
				</tr>
				<tr>
					<td>Last name</td>
					<td>:</td>
					<td>
						<input class="validate[required,maxSize[150]] login_text" type="text" name="lastname" id="lastname" value="<?//php if($_SESSION['userid']) { echo $user_res[0]['lastname']; } else { echo $_SESSION['lastname']; } ?>" />
					</td>
				</tr>-->
				<tr>
					<td>Email</td>
					<td>:</td>
					<td>
						<input class="validate[required,custom[email]] login_text"  type="text" name="email" id="email" value="<?php echo $user_res[0]['email'] ?>" />
					</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td>
						<input class="validate[required,maxSize[15],minSize[8]] login_text" type="password" name="password" id="password" value="<?php echo $user_res[0]['password'] ?>" />
					</td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td>:</td>
					<td>
						<input class="validate[required,equals[password]]  login_text" type="password" name="repassword" id="repassword" value="<?php echo $user_res[0]['password'] ?>" />
					</td>
				</tr>
				<!--<tr>
					<td>Phone</td>
					<td>:</td>
					<td>
						<input class="login_text" type="text" name="phone" id="phone" value="<?//php if($_SESSION['userid']) { echo $user_res[0]['phone']; } else { echo $_SESSION['telephone']; } ?>" />
					</td>
				</tr>
				<tr>
					<td>Birthday</td>
					<td>:</td>
					<td>
						<input class="login_text" type="text" name="birthday" value="<?//php if($_SESSION['userid']) { echo $user_res[0]['birthday']; } else { echo $_SESSION['birthday']; } ?>" />
					</td>
				</tr>
				<tr>
					<td>Gender </td>
					<td>:</td>
					<td>
						<select id="gender"  class="login_text validate[required]" style="border:1px solid #024e89;width:105%; padding:3px;"  name="gender" >
							<?//php if($_SESSION['userid']=='') { ?>
							<option value="">---- Select ----</option>
							<option <?//php if($_SESSION['gender']=='male') { ?> selected="selected" <?//php } ?> value="male">Male</option>
							<option <?//php if($_SESSION['gender']=='female') { ?> selected="selected" <?//php } ?> value="female">Female</option>
							<?//php } else { ?>
							<option value="">---- Select ----</option>
							<option <?//php if($user_res[0]['gender']=='male') { ?> selected="selected" <?//php } ?> value="male">Male</option>
							<option <?//php if($user_res[0]['gender']=='female') { ?> selected="selected" <?//php } ?> value="female">Female</option>
							<?//php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Postcode</td>
					<td>:</td>
					<td>
						<input class="login_text" type="text"  name="postcode" id="postcode" value="<?//php if($_SESSION['userid']) { echo $user_res[0]['postcode']; } else { echo $_SESSION['postcode']; } ?>" />
					</td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td>
						<input class="login_text" type="text" name="address" id="address" value="<?//php if($_SESSION['userid']) { echo $user_res[0]['address']; } else { echo $_SESSION['adress']; } ?>" />
					</td>
				</tr>
				<tr>
					<td>State</td>
					<td>:</td>
					<td>
						<input class="login_text" type="text" name="state" id="state" value="<?//php if($_SESSION['userid']) { echo $user_res[0]['state']; } else { echo $_SESSION['state']; } ?>" />
					</td>
				</tr>
				<tr>
					<td>Country</td>
					<td>:</td>
					<td>
						<input class="login_text" type="text" id="country" name="country" value="<?//php if($_SESSION['userid']) { echo $user_res[0]['country']; } else { echo $_SESSION['country']; } ?>" />
					</td>
				</tr>-->
				<tr>
					<?php if($_SESSION['userid']=='') { ?>
					<td colspan="3">
						<input type="submit" class="btn" name="submit" value="Register" />
					</td>
					<?php } else {?>
					<td colspan="3">
						<input type="submit" class="btn" name="submit" value="Update" />
					</td>
					<?php } ?>
				</tr>
				<?php if($_SESSION['userid']=='') { ?>
				<tr>
					<td colspan="3"> Have Account? <a href="login.php" id="login">click here</a> to login. </td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</div>
</div>
<script type="text/javascript">
				$(".message").click(function () {
				  $(".message").hide("slow");
				});    
</script>
</body>
</html>