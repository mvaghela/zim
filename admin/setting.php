<?php include("system/config.inc.php"); 
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 
if(isset($_REQUEST['submit']) & $_REQUEST['submit']=='Change settings') {
	
	if($_REQUEST['newadminpass']!=''){
		if($_REQUEST['newadminpass']!=$_REQUEST['renewadminpass']) {
		header("location:setting.php?msg=Reinc");
		die();
		} else {
			$cnd="`varpassword`='".$_REQUEST['newadminpass']."',";
		}
	}
	session_destroy($_SESSION['list']);
	session_destroy($_SESSION['data']);
	
	 $sql="UPDATE  `admin` SET  `varusername` =  '".addslashes($_REQUEST['username'])."', ".$cnd." `varemailid` =  '".addslashes($_REQUEST['email'])."',`varphoneno` =  '".addslashes($_REQUEST['varphoneno'])."',`address` =  '".addslashes($_REQUEST['address'])."',`shippingrange` =  '".addslashes($_REQUEST['shippingrange'])."',`shippingamount` =  '".addslashes($_REQUEST['shippingamount'])."',`website` =  '".addslashes($_REQUEST['website'])."',`facebooklink` =  '".addslashes($_REQUEST['facebooklink'])."',`twitterlink` =  '".addslashes($_REQUEST['twitterlink'])."',`youtubelink` =  '".addslashes($_REQUEST['youtubelink'])."' WHERE `intid` = '".$_SESSION['adminid']."'";
	 $status_cat=$obj_db->sql_query($sql);
	
	 header("location:setting.php?msg=Done");
		die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password And Other Details | </title>
<link href="images/favicon.ico"  rel="shortcut icon" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
<?php 
   $sql="select * from `admin` where `intid`='".$_SESSION['adminid']."'";
   $res=$obj_db->select($sql);
?>
<?php include("include/header.php");?>
    <div class="block">
      <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        <h2>Change Password And Other Details</h2>
      </div>
      <!-- .block_head ends -->
      
      <div class="block_content" id="days">
        <?php    if ($_REQUEST['msg'] == "Done") {
            echo '<div class="message success" style="display: block;"><p>Settings Change Successfully.</p></div>';
			
        } 
		if ($_REQUEST['msg'] == "inc") {
			 echo '<div class="message errormsg" style="display: block;"><p>You Have Entered Wrong Current Password ! </p></div>';
         } 
		if ($_REQUEST['msg'] == "Reinc") {
			 echo '<div class="message errormsg" style="display: block;"><p>New Password And Re-Enter Password Does Not Match !</p></div>';
            } 
		?>
        <form action="" method="post">
          <input type="hidden" name="originalpass" class="ttx"  value="<?php echo $res[0]['varpassword']; ?>" />
          <table cellpadding="3" cellspacing="8">
            <tr>
              <td>Admin Username</td>
              <td>:</td>
              <td><input type="text" name="username" class="text small"  value="<?php echo $res[0]['varusername']; ?>" /></td>
            </tr>
            <tr>
              <td>Admin Email</td>
              <td>:</td>
              <td><input type="text" name="email" class="text small"  value="<?php echo $res[0]['varemailid']; ?>" />
              <!--<br /><span style="line-height:22px; margin-top:5px;"> To add multiple email use comma separator(,) in email<br />For Example: abc@gmail.com,xyz@yahoo.com,123@gmail.com </span>-->
              </td>
            </tr>
            <tr>
              <td>Phone Number</td>
              <td>:</td>
              <td><input type="text" name="varphoneno" class="text small"  value="<?php echo $res[0]['varphoneno']; ?>" /></td>
            </tr>
            <tr>
              <td>Shipping Range</td>
              <td>:</td>
              <td><input type="text" name="shippingrange" class="text small" style="width:500px;"  value="<?php echo $res[0]['shippingrange']; ?>" /></td>
            </tr>
			<tr>
              <td>Shipping Amount</td>
              <td>:</td>
              <td><input type="text" name="shippingamount" class="text small" style="width:500px;"  value="<?php echo $res[0]['shippingamount']; ?>" /></td>
            </tr>
			<tr>
              <td>Address</td>
              <td>:</td>
              <td><input type="text" name="address" class="text small" style="width:500px;"  value="<?php echo $res[0]['address']; ?>" /></td>
            </tr>
            <tr>
              <td>Website</td>
              <td>:</td>
              <td><input type="text" name="website" class="text small"  value="<?php echo $res[0]['website']; ?>" /></td>
            </tr>
            <tr>
              <td>Facebook</td>
              <td>:</td>
              <td><input type="text" name="facebooklink" class="text small"  value="<?php echo $res[0]['facebooklink']; ?>" /></td>
            </tr>
            <tr>
              <td>Twitter</td>
              <td>:</td>
              <td><input type="text" name="twitterlink" class="text small"  value="<?php echo $res[0]['twitterlink']; ?>" /></td>
            </tr>
            <tr>
              <td>YouTube</td>
              <td>:</td>
              <td><input type="text" name="youtubelink" class="text small"  value="<?php echo $res[0]['youtubelink']; ?>" /></td>
            </tr>
            <tr>
              <td colspan="3"><strong>To Change Admin Password</strong></td>
            </tr>
            <tr>
              <td>New Admin Password</td>
              <td>:</td>
              <td><input type="password" name="newadminpass" class="text small"  value="" /></td>
            </tr>
            <tr>
              <td>Re-Enter New Admin Password</td>
              <td>:</td>
              <td><input type="password" name="renewadminpass" class="text small"  value="" /></td>
            </tr>
            </table><hr />
            <p>
             <input type="submit" name="submit" value="Change settings"  class="submit long"  />
         </p>
        </form>
      </div>
      <!-- .block_content ends -->
      
      <div class="bendl"></div>
      <div class="bendr"></div>
    </div>
    <?php include("include/footer.php");?>
</body>
</html>