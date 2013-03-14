<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href='http://fonts.googleapis.com/css?family=Anaheim' rel='stylesheet' type='text/css' />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Test Page</title>
</head>
<body style="font-family:Anaheim !important;">
<div class="wrapper" style="margin:0 auto; width:850px;">
	<div class="innercontainer" style="width:96.5%; border-top:7px solid #272727; padding:15px; float:left;">
		
	</div>
	<div class="order_info" style="padding:10px; width:100%; float:left;">
		<div class="shopaddress" style="text-align:right; width:100%; float:left;">
			<div style="width:250px; float:left">
				<img src="images/Zymba-logo.jpg" />
			</div>
			<div style="width:250px; float:right">
				<b>Zymba</b><br />
				73 Spring Street #309<br />
				New York, NY 10012<br /> 
				<a href="http://www.manektech.net/Zymba/">zymba.com</a><br />
				Phone: 1.800.215.1300<br />
			</div>
		</div> 
		<div class="ordermessage" style="width:100%; float:left;">
			<p style="font-size:16px; font-weight:bold;">Thank you for your Order.</p>
			<p>
				We will email your Shipping Confirmation with your Tracking Number when your Items have been shipped. Your Order will generally be 										shipped within 24 hours after we've received it. You can check your Order's Status on your Account Pages at <a href="#">Order Track.</a></p>

				<p>If you have Questions about your Order, we're happy to take your Call</p>
				<p>(1.800-215-1300) Monday to Friday : 10 am - 24 pm Saturday & Sunday : 10 am - 6 pm</p>
			 
		</div>
		
		<div class="orders_title" style="float: left; font-size: 24px; padding: 10px; width: 98%;">
					Order Detail <br /><br />
					Order Number : <?php echo $result_order[0]['orderid'];?><br /><br />
		</div>
				
				
		<div class="order_detail" style="width:100%; float:left;">
			<div class="orders" style=" border: 1px solid #9D9D9D; float: left; width: 100%;">
				<div class="orders_title" style="background: none repeat scroll 0 0 #EFEFEF; float: left; font-size: 24px; padding: 10px; width: 97%;">
					Order Number : <?php echo $result_order[0]['orderid'];?>
				</div>
				<div class="orders_detail" style=" float: left; padding: 10px; width: 98%;">
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
										<td align="right">Rs. 15</td>
									</tr>
									<tr>
										<td align="right">Sales Tax:</td>
										<td align="right">Rs. 0</td>
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
			<div class="orders" style=" border: 1px solid #9D9D9D; float: left; width: 100%;">
				<div class="orders_title" style="background: none repeat scroll 0 0 #EFEFEF; float: left; font-size: 24px; padding: 10px; width: 97%;">
					Products Shipment
				</div>
				<div class="order_wrapper" style="float: left; width: 100%;">
				<table class="order_wrapper-table" style="border-collapse: collapse; width: 100%;">
					<tr>
						<td class="td1" valign="top" style="padding: 20px; width: 600px;">
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
									<td align="left">Rs <?php echo $product_res[$i]['price']; ?></td>
								</tr>
								<?php }?>
								
							</table>
							</div>
						</td>
						
						<td class="td0" valign="top" style="border-right: 1px solid #9D9D9D;"></td>
						
						<td class="td2" valign="top" style="padding: 20px;">
							<div class="order_address" style="width: 100%;">
								<div class="title_bold" style="font-weight: bold;">Shipping Address</div>
								<div class="address"><?php echo $result_order[0]['address'];?></div>
								
								<div class="title_bold" style="font-weight: bold;">Method</div>
								<div class="address">Ground</div>
								
								<div class="title_bold" style="font-weight: bold;">Shipping Status</div>
								<div class="address">None</div>
							</div>
						</td>
					</tr>
					
					<tr>
						<td class="td1" valign="top" style="padding: 20px; width: 600px;">
							<div class="order_items">
								<table width="100%">
									<tr>
										<td>Best Regards,</td>
									</tr>
									<tr>
										<td>Zymba Customer Service</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
					
					<tr>
						<td colspan="10" style="padding-bottom: 20px;">
							<table width="100%">
									<tr>
										<td width="300px;"><hr /></td>
										<td><center> Discover <a href="http://www.manektech.net/Zymba/">www.Zymba.com</a></center></td>
										<td width="300px;"><hr /></td>
									</tr>
								</table>
						</td>
					</tr>
				</table>
				</div>					
			</div>
			Call 1.800-215-1300 for your nearest Zymba or contact us at <a href="http://www.manektech.net/Zymba/">www.Zymba.com</a>
		</div>
	</div>
</div>
</body>
</html>
