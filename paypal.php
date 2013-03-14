<?php 
include("system/config.inc.php");
$sql="SELECT * FROM `orderdetail` WHERE `orderid`='".$_SESSION['orderid']."' AND `userid`='".$_SESSION['userid']."'";
$result=$obj_db->select($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment</title>
<script src="js/jquery-latest.js" type="text/javascript"></script>
</head>
<body>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="target">
      <input type="hidden" name="cmd" value="_xclick">
      <input type="hidden" name="business" value="roger_1334735021_biz@manektech.net">
      <input type="hidden" name="item_name" value="Zymba Purchase">
      <input type="hidden" name="item_number" value="<?php echo $result[0]['orderid'];?>">
	  <input type="hidden" name="notify_url" value="http://www.zimba-customtailor.com/development/ipn.php">
      <input type="hidden" name="image_url" value="http://www.zimba-customtailor.com/development/images/Zymba-logo.jpg">
      <input type="hidden" name="no_shipping" value="1">
      <input type="hidden" name="return" value="http://www.zimba-customtailor.com/development/success.php">
      <input type="hidden" name="cancel_return" value="http://www.zimba-customtailor.com/development/cancel.php">
      <input type="hidden" name="rm" value="2">
      <input type="hidden" name="amount" value="<?php echo $result[0]['paidamount'];?>">
      <input type="hidden" name="no_note" value="1">
      <input type="hidden" name="custom" value="<?php echo $_SESSION['userid']?>">
      <input type="hidden" name="invoice" value="<?php echo $_SESSION['orderid']?>-<?php echo $_SESSION['userid']?>">
      <input type="image" src="" border="0" name="submit" alt="You will be redirected at paypal in a moment">
</form>
 <script type="text/javascript">
  $('#target').submit()
 </script>
</body>
</html>
