<?php include("system/config.inc.php");
include("function/vieworderdetail.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Orderdetails</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
				<ul>
					<li class="first"><a>Order Detail</a></li>
				</ul>
			</div>
	</div>
</div>	
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
			<!--<div class="inner-title">
				<ul>
					<li class="last"><a>Order Detail</a></li>
				</ul>
			</div>-->
			<div class="filter-fabric">
				<h1>Order Placed</h1>
				<div class="orderhistory">
					<div class="orders">
						<div class="orders_title">
							Order Number : <?php echo $result_order[0]['orderid'];?>
						</div>
						<div class="orders_detail">
							<table width="100%">
								<tr>
									<th align="left">Billing Address:</th>
									<th align="left">Payment Methods</th>
									<th align="right">Payment Total</th>
								</tr>
								<tr>
									<td align="left" valign="top">
										<?php echo $result_order[0]['address'];?><br />
										<table>
											<tr>
												<td><img src="images/phone.png" /></td>
												<td><?php echo $result_order[0]['shtelephone'];?></td>
											</tr>
										</table>
									</td>
									<td align="left" valign="top"><?php echo $result_order[0]['payment_method'];?></td>
									<td align="right">
										<?php 
											for($i=0;$i<count($product_res);$i++){
												$sum+=$product_res[$i]['price']*$product_res[$i]['qty'];
											}
										?>
										<table width="250">
											<tr>
												<td align="right">Order Subtotal:</td>
												<td align="right"><?php echo $sum;?></td>
											</tr>
											<tr>
												<td align="right">Shipping:</td>
												<td align="right">$ 15</td>
											</tr>
											<tr>
												<td align="right">Sales Tax:</td>
												<td align="right">$ 0</td>
											</tr>
											<?php if($coupon_res[0]['coupon_id']!=''){?>
											<tr>
												<td align="right">Coupon Discount</td>
												<td align="right"><?php echo $coupon_res[0]['coupon_value']?></td>
											</tr>	
											<?php }?>
											<tr>
												<td align="right"><b>Order Total:</b></td>
												<td align="right"><?php echo $result_order[0]['paidamount'];?></td>
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
										<td align="left">$ <?php echo $product_res[$i]['price']; ?></td>
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
								<div class="address">None</div>
							</div>
								<td>
							</tr>
						</table>
						</div>					
					</div>
					<div class="orders">
						<div class="orders_detail">
							<div class="link_left">
								<table>
									<tr>
										<td><a href="orderhistory.php"><img src="images/left.png" /></a></td>
										<td><a href="orderhistory.php">Return to Order History</a></td>
									</tr>
								</table>
							</div>
							<div class="link_right">
								<table>
									<tr>
										<td><a href="index.php">Return to Shopping</a></td>
										<td><a href="index.php"><img src="images/right.png" /></a></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>