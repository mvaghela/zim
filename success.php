<?php include("system/config.inc.php");
include("function/order_confirm.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Order Confirmation</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="wrapper">
	<div class="middle">
		<!--<div class="inner-title">
			<ul>
				<li class="last"><a>Order Detail</a></li>
			</ul>
		</div>-->
		<div class="breadcrumb1">
			<div class="breadcrumb">
				<div class="bread">
					Customization
					<span class="arrow_box"></span>
				</div>
				<div class="bread">
					measurement
					<span class="arrow_box"></span>
				</div>
				<div class="bread">
					Shipping
					<span class="arrow_box"></span>
				</div>
				<div class="bread">
					Review Order
					<span class="arrow_box"></span>
				</div>
				<div class="bread active_bread">
					Order Confirm
					<span class="arrow_box active_bread"></span>
				</div>
			</div>
		</div>
		<div class="inner-page-left-fabric">
			
			<div class="filter-fabric">
				<div class="order_acknowledgement">
					<div class="acknowledgement_title">
						Thank you for shopping at Zymba
					</div>
					<div class="acknowledgement_msg">
						If you have any questions please contact us at
						123 345 3454, Monday-Friday 10:00am-6:30pm, and
						Saturday-Sunday 10:00am-6:00pm
						<br />
						<a href="#">Print Receipt</a> 
						 
					</div>
				</div>
				<h1>Order Detail</h1>
				<h2>Order Placed : <?php echo $result_order[0]['adddate']; ?></h2>
				<div class="orderhistory">
					<div class="orders">
						<div class="orders_title">
							Order Number : <?php echo $result_order[0]['orderid'];?>
						</div>
						<div class="orders_detail">
							<table width="100%">
								<tr>
									<th align="left" valign="top">Billing Address:</th>
									<th align="left" valign="top">Payment Methods</th>
									<th align="right" valign="top">Payment Total</th>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<?php echo $result_order[0]['address'];?><br />
										<?php echo $result_order[0]['address2'];?><br />
										<?php echo $result_order[0]['shippingcity'];?><br />
										<?php echo $result_order[0]['shippingstate'];?><br />
										<?php echo $result_order[0]['shippingcountry'];?><br />
										<table>
											<tr>
												<td><img src="images/phone.png" /></td>
												<td><?php echo $result_order[0]['shtelephone'];?></td>
											</tr>
										</table>
									</td>
									<td align="left" valign="top">
										Paypal
									</td>
									<td align="right" valign="top">
										<?php 
											for($i=0;$i<count($product_res);$i++){
												$sum+=$product_res[$i]['cartprice']*$product_res[$i]['qty'];
											}
										?>
										<table width="250">
											<tr>
												<td align="right">Order Subtotal:</td>
												<td align="right">$ <?php echo $sum;?></td>
											</tr>
											<tr>
												<td align="right">Shipping:</td>
												<td align="right">$ <?php echo $_SESSION['shipping'];?></td>
											</tr>
											<tr>
												<td align="right">Sales Tax:</td>
												<td align="right">$ <?php echo (($result_order[0]['paidamount'])-($sum+$_SESSION['shipping']));?></td>
											</tr>
											<?php if($coupon_res[0]['coupon_id']!=''){?>
											<tr>
												<td align="right">Coupon Discount</td>
												<td align="right"><?php echo $coupon_res[0]['coupon_value']?></td>
											</tr>
											<?php }?>
											<tr>
												<td align="right"><b>Order Total:</b></td>
												<td align="right">$ <?php echo $result_order[0]['paidamount'];?></td>
											</tr>
										</table>
									</td>
								</tr>
								
								<?php if($coupon_res[0]['coupon_id']!=''){?>
								<tr>
									<td colspan="2">
										<b>Coupon Used : </b><?php echo $coupon_res[0]['coupon_code']?>
									</td>
								</tr>
								<?php }?>
								<tr>
									<td><br/></td>
									<td><br/></td>
									<td><br/></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="orders">
						<div class="orders_title">
							Products Shipment
						</div>
						<div class="order_wrapper">
						<table class="order_wrapper-table" >
							<tr>
								<td class="td1" valign="top">
								<div class="order_items">
								<table width="100%">
									<tr>
										<th align="left">Item:</th>
										<th align="left">Name:</th>
										<th align="left">Quantity:</th>
										<th align="left">Price</th>
									</tr>
									<?php for($i=0;$i<count($product_res);$i++){?>
									<tr>
										<td align="left"><img src="admin/upload/image/medthumb/<?php echo $product_res[$i]['image']; ?>"></td>
										<td align="left"><?php echo $product_res[$i]['productname']; ?></td>
										<td align="left"><?php echo $product_res[$i]['qty']; ?></td>
										<td align="left">$ <?php echo $product_res[$i]['cartprice']; ?></td>
									</tr>
									<?php }?>
								</table>
							</div>
								<td>
								<td class="td0" valign="top"></td>
								<td class="td2" valign="top">
								<div class="order_address">
								<div class="title_bold">Shipping Address</div>
								<div class="address"><?php echo $result_order[0]['address'];?></div>
								
								<div class="title_bold">Method</div>
								<div class="address">Ground</div>
								
								<div class="title_bold">Shipping Status</div>
								<div class="address">Done</div>
							</div>
								<td>
							</tr>
						</table>
						</div>
					</div>
				</div>
				<div class="continue_shopping_link">
					<a href="index.php">Continue Shopping</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php'); 
?>
</body>
</html>