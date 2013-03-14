<?php include("system/config.inc.php"); 
if($_REQUEST['removecart']!='') {
	$removecartsql="DELETE FROM `cart` WHERE `cartid`='".$_REQUEST['removecart']."'";
	$removecart=$obj_db->sql_query($removecartsql);
	$lastpage = $_SERVER['HTTP_REFERER'];
	header("location:".$lastpage."");
	die();
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart |<?php echo $sitename; ?></title>
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
		$(".login_link_h").fancybox();
	});
	$(document).ready(function() {
		$(".register_link_h").fancybox();
	});
	$(document).ready(function() {
			$("#register").fancybox();
		});
</script>
</head>
<body>
<div style="width:600px;" align="center">
  <div class="login_mainx" >
    <table>
      <tr>
        <td colspan="3"><div class="login_title">
            <h1>SHOPPING BAG</h1>
          </div></td>
      </tr>
    </table>
    <?php 
//--------select query for display data-------//
$sql="SELECT *,cart.price as cartprice FROM `cart` 
				LEFT OUTER JOIN `product`
				ON product.productid=cart.productid
				WHERE cart.cartsessionid='".$_SESSION['key']."'"; 
$result=$obj_db->select($sql);
if($result){
?>
    <table class="heading-shoppingcart" width="100%">
      <tr>
        <th width="100px">Image</th>
        <th width="110px">Name</th>
        <th width="65px">Price</th>
        <th width="20px">Quantity</th>
        <th width="60px">Grand Total</th>
        <th width="50px">Remove</th>
      </tr>
      <?php
$sum=0;
$qtycount=0;
for($i=0;$i<count($result);$i++) { 
$sum+=($result[$i]['cartprice'] + $_SESSION['monogramprice'])*$result[$i]['qty'];
$qtycount+=$result[$i]['qty'];

			?>
      <tr>
        <td><img src="admin/upload/image/medthumb/<?php echo $result[$i]['image']; ?>"></td>
        <td><?php echo $result[$i]['productname']; ?></td>
        <td><?php echo ($result[$i]['cartprice']); ?></td>
        <td><?php echo $result[$i]['qty']; ?></td>
        <td><?php echo (($result[$i]['cartprice'])*$result[$i]['qty']); ?></td>
        <td><a href="shoppingcart.php?removecart=<?php echo $result[$i]['cartid']; ?>" OnClick="return confirm('Are you sure want to delete this Record?');" title="Remove Cart">Remove</a></td>
      </tr>
      <?php } ?>
      <tr>
        <td class="total" colspan="3" align="right"><div class="total-price"> Total : </div></td>
        <td class="total" align="center"><div class="total-qty"> <?php echo $qtycount; ?> </div></td>
        <td class="total"><div class="total-price"> <span class="WebRupee">$ </span> <?php echo $sum; ?> </div></td>
        <td class="total"></td>
      </tr>
    </table>
    <table class="shoppingbutton">
      <tr>
        <td colspan="2"><a href="shirt.php" class="btn" >Continue Shoping</a></td>
        <td colspan="3"><a href="shoppingbag.php" class="btn" >Proceed To Checkout</a></td>
      </tr>
    </table>
    <?php } else { ?>
    <table>
      <tr>
        <td colspan="3"><div class="login_title">
            <h1>YOUR SHOPPING BAG IS EMPTY!!</h1>
          </div></td>
      </tr>
      <tr>
        <td colspan="3"><center>
            <a href="shirt.php" class="btn" >Continue Shoping</a>
          </center></td>
      </tr>
    </table>
    <?php } ?>
  </div>
</div>
</body>
</html>