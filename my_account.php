<?php include("system/config.inc.php");
include("function/my_account.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | My Account</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
			<ul>
			  <li class="last"><a>My Account</a></li>
			</ul>
      </div>
	</div>
</div>	
<div class="wrapper">
  <div class="middle">
    <div class="inner-page-left-fabric">
      <!--<div class="inner-title">
        <ul>
          <li class="last"><a>My Account</a></li>
        </ul>
      </div>-->
      <div class="my-account-middle">
        <div class="my-account-menu">
          <ul>
            <li class="active"><a href="my_account.php">Account Detail</a></li>
            <li><a href="wishlist.php">Wishlist</a></li>
            <li><a href="customization.php">Customization</a></li>
			<li><a href="measurement.php">Measurement</a></li>
			<li><a href="orderhistory.php">Order History</a></li>
          </ul>
        </div>
        <script language="javascript">
			jQuery(document).ready(function(){
				jQuery("#userForm").validationEngine();
			});
		</script>
        <div class="my-account-div">
          <div class="accunt-detail">
          	<?php if($_GET['msg']=='user_exist'){ 
					echo '<div class="message errormsg" style="display: block;background-image:none;"><p>&nbsp;&nbsp;&nbsp;User with same email already exist please choose another one.</p>
					<span class="close" title="Dismiss"></span>
					</div>'; ?>
			<?php } ?>
            <form action="" method="post" id="userForm">
              <table>
                <tr>
                  <td width="30%">First name</td>
                  <td>:</td>
                  <td><input type="text" name="fname" id="fname" value="<?php echo stripslashes($user_res[0]['firstname']);?>" class="validate[required,maxSize[250]] login_text"/></td>
                </tr>
                 <tr>
                  <td>Last name</td>
                  <td>:</td>
                  <td><input type="text" name="lname" id="lname" value="<?php echo stripslashes($user_res[0]['lastname']);?>" class="validate[required,maxSize[250]] login_text"/></td>
                </tr>
                 <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td><input type="text" name="email" id="email" value="<?php echo stripslashes($user_res[0]['email']);?>" class="validate[required,maxSize[250],custom[email]] login_text"/></td>
                </tr>
                 <tr>
                  <td>Password</td>
                  <td>:</td>
                  <td><input type="password" name="password" id="password" value="<?php echo stripslashes($user_res[0]['password']);?>" class="validate[required,maxSize[250]] login_text"/></td>
                </tr>
                 <tr>
                  <td>Confirm Password</td>
                  <td>:</td>
                  <td><input type="password" name="cpassword" id="cpassword" value="<?php echo stripslashes($user_res[0]['password']);?>" class="validate[required,equals[password]] login_text"/></td>
                </tr>
                 <tr>
                  <td>Phone</td>
                  <td>:</td>
                  <td><input type="text" name="phone" id="phone" value="<?php echo stripslashes($user_res[0]['phone']);?>" class="validate[required,maxSize[250],custom[phone]] login_text"/></td>
                </tr>
                <tr>
                  <td>Birthday</td>
                  <td>:</td>
                  <td><input type="text" name="bday" id="bday" value="<?php echo stripslashes($user_res[0]['birthday']);?>" class="validate[required] login_text"/></td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td>:</td>
				<td><select name="gender" id="gender" class="select validate[required] login_text">
                         <option value="">---- Select ----</option>
                         <option value="male" <?php if($user_res[0]['gender']=='male'){?>selected="selected"<?php }?>>Male</option>
                         <option value="female" <?php if($user_res[0]['gender']=='female'){?>selected="selected"<?php }?>>Female</option>
                         </select>
                         </td>
                </tr>
                <tr>
                  <td>Postcode</td>
                  <td>:</td>
                  <td><input type="text" name="zip" id="zip" value="<?php echo stripslashes($user_res[0]['postcode']);?>" class="validate[required,maxSize[250],custom[number]] login_text"/></td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td>:</td>
                  <td><input type="text" name="address" id="address" value="<?php echo stripslashes($user_res[0]['address']);?>" class="validate[required,maxSize[250]] login_text"/></td>
                </tr>
                <tr>
                  <td>State</td>
                  <td>:</td>
                  <td><input type="text" name="state" id="state" value="<?php echo stripslashes($user_res[0]['state']);?>" class="validate[required,maxSize[250]] login_text"/></td>
                </tr>
                <tr>
                  <td>Country</td>
                  <td>:</td>
                  <td><input type="text" name="country" id="country" value="<?php echo stripslashes($user_res[0]['country']);?>" class="validate[required,maxSize[250]] login_text"/></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td><input type="submit" name="submit" value="Save" class="btn"/></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
       </div>
    </div>
  </div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>