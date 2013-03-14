<?php include("system/config.inc.php");
//Select Cart items 
$select_cart_item="SELECT *,cart.price as cartprice FROM `cart`
					LEFT OUTER JOIN `product` ON
					`cart`.`productid`=`product`.`productid`
					WHERE `cart`.`cartsessionid`='".$_SESSION['key']."'";
$cart_item_res=$obj_db->select($select_cart_item);


	
	$order_select="SELECT * FROM `orderdetail` WHERE `orderid`='".$_SESSION['orderid']."' AND `userid`='".$_SESSION['userid']."'";
	//echo $order_select="SELECT * FROM `orderdetail` WHERE `orderid`=1";
	$order_res=$obj_db->select($order_select);
	
	$title=$_REQUEST['title'];
	$fname=addslashes($_REQUEST['name']);
	$lfname=addslashes($_REQUEST['lname']);
	$email=addslashes($_REQUEST['email']);
	$address=addslashes($_REQUEST['address']);
	$address2=addslashes($_REQUEST['address2']);
	$city=addslashes($_REQUEST['city']);
	$zip=addslashes($_REQUEST['zip']);
	$state=addslashes($_REQUEST['state']);
	$telephone=addslashes($_REQUEST['telephone']);
	$country=addslashes($_REQUEST['country']);
	
	$priceforcheckout=$order_res[0]['paidamount'];	
	$payment_method=$_REQUEST['payment_method'];
	$holder_name=addslashes($_REQUEST['holder_name']);
	$expiry_month=$_REQUEST['expiry_month'];
	$expiry_year=$_REQUEST['expiry_year'];
	$card_code=formatCreditCard(MaskCreditCard($_REQUEST['card_number']));
	$cvv=$_REQUEST['card_code'];
	
	$payment=$priceforcheckout;
	
	
	
	
	

	
	
	
		
	$admin_sql="SELECT * FROM `admin`";
	$admin=$obj_db->select($admin_sql);

$sum=0;
$qtycount=0;

for($i=0;$i<count($cart_item_res);$i++) { 

	$qtycount+=$cart_item_res[$i]['qty']; 
	
	if($cart_item_res[$i]['producttypeid']=='3'){
		$select_measurement="SELECT * FROM `shirt_measurements` WHERE `measurement_id`='".$cart_item_res[$i]['measurement_id']."'";
		 $select_customization="SELECT * FROM `saveshirtcustomize` WHERE `saveshirtcustomizeid`=".$cart_item_res[$i]['saveshirtcustomizeid']."";
	}
	if($cart_item_res[$i]['producttypeid']=='5'){
		$select_measurement="SELECT * FROM `pant_measurements` WHERE `measurement_id`='".$cart_item_res[$i]['measurement_id']."'";
		$select_customization="SELECT * FROM `savepantcustomize` WHERE `savepantcustomizeid`=".$cart_item_res[$i]['saveshirtcustomizeid']."";
	}
	if($cart_item_res[$i]['producttypeid']=='6'){
		$select_measurement="SELECT * FROM `blazer_measurements` WHERE `measurement_id`='".$cart_item_res[$i]['measurement_id']."'";
		$select_customization="SELECT * FROM `savepantcustomize` WHERE `savepantcustomizeid`=".$cart_item_res[$i]['saveshirtcustomizeid']."";
	}
	$measurement=$obj_db->select($select_measurement);
	$customization=$obj_db->select($select_customization);

$sum+=$customization[0]['monogramprice']*$cart_item_res[$i]['qty'];


$maildata2.="<tr>
				<td align='left'><img src=".$admin[0]['website']."/admin/upload/image/medthumb/".$cart_item_res[$i]['image']."></td>
				<td align='left'>".$cart_item_res[$i]['productname']."</td>
				<td align='left'>".$cart_item_res[$i]['qty']."</td>
				<td align='left'>Rs ".$customization[0]['monogramprice']."</td>
			</tr>";
}


$subject="Product purchased from Zymba (".date("d / M / Y").")";
$maildata="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
	<link href='http://fonts.googleapis.com/css?family=Anaheim' rel='stylesheet' type='text/css' />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<title>Test Page</title>
</head>
<body style='font-family: 'Anaheim', sans-serif; !important;'>
<style type='text/css'>
	@import url(http://fonts.googleapis.com/css?family=Anaheim);
</style>
<div class='wrapper' style='margin:0 auto; width:850px;'>
	<div class='innercontainer' style='width:100%; border-top:7px solid #272727; padding:15px; float:left;'>
		
	</div>
	<div class='order_info' style='padding:10px; width:100%; float:left;'>
		<div class='shopaddress' style='text-align:right; width:100%; float:left;'>
			<div style='width:250px; font-family:Anaheim !important; float:left'>
				<img src='".$admin[0]['website']."/images/Zymba-logo.jpg' />
			</div>
			<div style='width:250px; font-family: 'Anaheim', sans-serif; !important; float:right'>

				<b>Zymbacccc</b><br />
				".$admin[0]['address']."<br />
				<a href=''.$admin[0]['website'].''>Zymba</a><br />
				Phone: ".$admin[0]['varphoneno']."<br />
			</div>
		</div> 
		<div class='ordermessage' style='width:100%; font-family:Anaheim !important; float:left;'>
			<p style='font-size:16px; font-family:Anaheim !important;font-weight:bold;'>Thank you for your Order.</p>
			<p style='font-family:Anaheim !important;'>
				We will email your Shipping Confirmation with your Tracking Number when your Items have been shipped. Your Order will generally be 										shipped within 24 hours after we've received it. You can check your Order's Status on your Account Pages at <a href='".$admin[0]['website']."orderhistory.php' target='_blank' >Order Track.</a></p>

				<p style='font-family:Anaheim !important;'>If you have Questions about your Order, we're happy to take your Call</p>
				<p style='font-family:Anaheim !important;'>".$admin[0]['varphoneno']." Monday to Friday : 10 am - 24 pm Saturday & Sunday : 10 am - 6 pm</p>
			 
		</div>
		
		<div class='orders_title' style='float: left;font-family:Anaheim !important; font-size: 24px; padding: 10px; width: 98%;'>
					Order Detail <br /><br />
					Order Placed On : ".$order_res[0]['date']."<br /><br />
		</div>
				
				
		<div class='order_detail' style='width:100%; float:left; font-family:Anaheim !important;'>
			<div class='orders' style=' border: 1px solid #9D9D9D; float: left; width: 100%;'>
				<div class='orders_title' style='background: none repeat scroll 0 0 #EFEFEF; float: left; font-size: 24px; padding: 10px; width: 97%;font-family:Anaheim !important;'>
					Order Number : ".$order_res[0]['orderid']."
				</div>
				<div class='orders_detail' style=' float: left; font-family:Anaheim !important; padding: 10px; width: 98%;'>
					<table width='100%' style='font-family:Anaheim !important;'>
						<tr>
							<th align='left'>Billing Address:</th>
							<th align='left'>Payment Methods</th>
							<th align='right'>Payment Total</th>
						</tr>
						<tr>
							<td align='left' valign='top'>
								".$address."<br />
								".$city."<br />
								".$state."<br />
								".$country."<br />
								".$telephone."<br />
							</td>
							<td align='left' valign='top'>
								".$payment_method."<br />
								".$card_code."<br />
								".$cvv."<br />
							</td>
							<td align='right'>
								
								<table width='250' style='font-family:Anaheim !important;'> 
									<tr>
										<td align='right'>Order Subtotal:</td>
										<td align='right'>".($payment-15)."</td>
									</tr>
									<tr>
										<td align='right'>Shipping:</td>
										<td align='right'>Rs. 15</td>
									</tr>
									<tr>
										<td align='right'>Sales Tax:</td>
										<td align='right'>Rs. 0</td>
									</tr>
									<tr>
										<td align='right'><b>Order Total:</b></td>
										<td align='right'>".$payment."</td>
									</tr>
								</table>
							</td>
						</tr>
						
					</table>
				</div>
			</div>
			<div class='orders' style=' border: 1px solid #9D9D9D; float: left; width: 100%; font-family:Anaheim !important;'>
				<div class='orders_title' style='background: none repeat scroll 0 0 #EFEFEF; float: left; font-size: 24px; padding: 10px; width: 97%;font-family:Anaheim !important;'>
					Products Shipment
				</div>
				<div class='order_wrapper' style='float: left; width: 100%;font-family:Anaheim !important;'>
				<table class='order_wrapper-table' style='border-collapse: collapse; width: 100%;font-family:Anaheim !important;'>
					<tr>
						<td class='td1' valign='top' style='padding: 20px; width: 600px;'>
							<div class='order_items' style='font-family:Anaheim !important;'>
								<table width='100%' style='font-family:Anaheim !important;'>
								<tr>
									<th align='left'>Item:</th>
									<th align='left'>Name:</th>
									<th align='left'>Quantity:</th>
									<th align='left'>Price</th>
								</tr>
								".$maildata2."
							</table>
							</div>
						</td>
						
						<td class='td0' valign='top' style='border-right: 1px solid #9D9D9D; font-family:Anaheim !important;'></td>
						
						<td class='td2' valign='top' style='padding: 20px;font-family:Anaheim !important;'>
							<div class='order_address' style='width: 100%;font-family:Anaheim !important;'>
								<div class='title_bold' style='font-weight: bold;font-family:Anaheim !important;'>Shipping Address</div>
								<div class='address' style='font-family:Anaheim !important;'>
									".$order_res[0]['address']."<br />
									".$order_res[0]['address2']."<br />
									".$order_res[0]['shippingcity']."<br />
									".$order_res[0]['shippingstate']."<br />
									".$order_res[0]['shippingcountry']."<br />
								</div>
								
								<div class='title_bold' style='font-weight: bold; font-family:Anaheim !important;'>Method</div>
								<div class='address' style='font-family:Anaheim !important;'>Ground</div>
								
								<div class='title_bold' style='font-weight: bold; font-family:Anaheim !important;'>Shipping Status</div>
								<div class='address' style='font-family:Anaheim !important;'>None</div>
							</div>
						</td>
					</tr>
					
					<tr>
						<td class='td1' valign='top' style='padding: 20px; width: 600px; font-family:Anaheim !important;'>
							<div class='order_items'>
								<table width='100%' style='font-family:Anaheim !important;'>
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
						<td colspan='10' style='padding-bottom: 20px; style='font-family:Anaheim !important;''>
							<table width='100%' style='font-family:Anaheim !important;'>
									<tr>
										<td width='300px;'><hr /></td>
										<td><center> Discover <a href=".$admin[0]['website'].">www.Zymba.com</a></center></td>
										<td width='300px;'><hr /></td>
									</tr>
								</table>
						</td>
					</tr>
				</table>
				</div>					
			</div>
			<div style='font-family:Anaheim !important;' >
				Call ".$admin[0]['varphoneno']." for your nearest Zymba or contact us at <a href=".$admin[0]['website'].">www.Zymba.com</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
"; //die();
		
		$emaildata=explode(",",$admin[0]['varemailid']);
		
		send_mail('testineed@gmail.com', 'testineed@gmail.com', $subject ,$maildata);
		
			
				
		header("location:success.php?tx=done&cm=".$_SESSION['userid']."&item_number=".$_SESSION['orderid']);
		die();
		
	

function MaskCreditCard($cc){
	// Get the cc Length
	$cc_length = strlen($cc);
	// Replace all characters of credit card except the last four and dashes
	for($i=0; $i<$cc_length-4; $i++){
		if($cc[$i] == '-'){continue;}
		$cc[$i] = 'X';
	}
	// Return the masked Credit Card #
	return $cc;
}

function FormatCreditCard($cc)
{
	// Clean out extra data that might be in the cc
	$cc = str_replace(array('-',' '),'',$cc);
	// Get the CC Length
	$cc_length = strlen($cc);
	// Initialize the new credit card to contian the last four digits
	$newCreditCard = substr($cc,-4);
	// Walk backwards through the credit card number and add a dash after every fourth digit
	for($i=$cc_length-5;$i>=0;$i--){
		// If on the fourth character add a dash
		if((($i+1)-$cc_length)%4 == 0){
			$newCreditCard = '-'.$newCreditCard;
		}
		// Add the current character to the new credit card
		$newCreditCard = $cc[$i].$newCreditCard;
	}
	// Return the formatted credit card number
	return $newCreditCard;
}
?>