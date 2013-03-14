<?php include("system/config.inc.php");
//Select Orders
$sql="SELECT * FROM `orderdetail` WHERE `orderid`='".$_REQUEST['id']."'"; 
$result=$obj_db->select($sql);

//Select order history
$select_orders="SELECT * FROM `cartorder` 
				LEFT OUTER JOIN `product`
				ON `product`.`productid`=`cartorder`.`productid`
				WHERE `cartorder`.`orderid`='".$_REQUEST['id']."'";
$product_res=$obj_db->select($select_orders);

//Check if coupon used
$select_coupon="SELECT * FROM `coupon` WHERE `coupon_order_id`='".$_REQUEST['id']."'";
$coupon_res=$obj_db->select($select_coupon);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>Order Detail</title>
</head>
<body>
<div style="width:400px;" align="center">
	<div class="login_main" id="register">
		<form action="editmeasurement.php" method="post" name="measurement" id="measurement">
			<table class="heading-shoppingcart" width="100%">
				<tr>
					<th width="100px">Product Image</th>
					<th width="110px">Name</th>
					<th width="65px">Price</th>
					<th width="20px">Quantity</th>
					<th width="20px">Add Measurement</th>
					<th width="60px">Grand Total</th>
					<th width="50px">Remove</th>
				</tr>
				<tr>
					<td><img src="admin/upload/image/medthumb/<?php echo $result[$i]['image']; ?>"></td>
					<td><?php echo $result[$i]['productname']; ?></td>
					<td>$ <?php echo $result[$i]['price']; ?></td>
					<td>
					<input type="hidden" name="cartid" id="cartid<?php echo $i;?>" value="<?php echo $result[$i]['cartid']; ?>" />
         			<input type="text" class="textinput" style="width:50px; " value="<?php echo $result[$i]['qty']; ?>" id="qty<?php echo $i;?>" name="qty<?php echo $i;?>">
					</td>
					<td>
                    	<?php echo $result[0][''];?>
                    </td>
					<td>$ <?php echo ($result[$i]['price']*$result[$i]['qty']); ?></td>
					<td>
                    	<a id="remove<?php echo $i;?>" href="#" title="Remove Cart">Remove</a>
                    	<input type="hidden" id="removeitem<?php echo $i;?>" value="<?php echo $result[$i]['cartid'];?>" />
                    </td>
				</tr>				
				<tr>                
					<td class="total" colspan="3" align="right">
						<div class="total-price"> Total : </div>
					</td>
					<td class="total" align="center">
						<div class="total-qty"> <?php echo $qtycount; ?> </div>
					</td>
					<td class="total"></td>
					<td class="total">
						<div class="total-price"> <span class="WebRupee">$ </span> <?php echo $_SESSION['amount'] = $sum; ?> </div>
					</td>
					<td class="total"></td>
				</tr>
                <?php if($_SESSION['coupon']['coupon_status']=='used'){?>                             
                <tr>                
					<td class="total" colspan="3" align="right">
						<div class="total-price"></div>
					</td>
					<td class="total" align="center">
						<div class="total-qty"> </div>
					</td>
					<td class="total">Discount </td>
					<td class="total" align="center">
						<div class="total-price"> <span class="WebRupee">$ </span> <?php echo $_SESSION['coupon']['coupon_value']; ?> </div>
					</td>
					<td class="total"></td>
				</tr>
                <tr>
                	<td class="total" colspan="2">
                	<td class="total" colspan="5">
                    	<hr />
                    </td>
                </tr>
                <?php $new_total=($sum-$_SESSION['coupon']['coupon_value']); ?>
                <tr>                
					<td class="total" colspan="3" align="right">
						<div class="total-price">New Total : </div>
					</td>
					<td class="total" align="center">
						<div class="total-qty"> <?php echo $qtycount; ?> </div>
					</td>
					<td class="total"></td>
					<td class="total" align="center">
						<div class="total-price"> <span class="WebRupee">$ </span> <?php echo $_SESSION['discount'] = max($new_total,0); ?></div>
					</td>
					<td class="total"></td>
				</tr>               
                <?php }?>               
			</table> 
            </form>
            			
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