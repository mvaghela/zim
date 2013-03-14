<?php   
include('system/config.inc.php');   

// STEP 1: Read POST data

// reading posted data from directly from $_POST causes serialization 
// issues with array data in POST
// reading raw POST data from input stream instead. 
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
  $keyval = explode ('=', $keyval);
  if (count($keyval) == 2)
     $myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc')) {
   $get_magic_quotes_exists = true;
} 
foreach ($myPost as $key => $value) {        
   if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
        $value = urlencode(stripslashes($value)); 
   } else {
        $value = urlencode($value);
   }
   $req .= "&$key=$value";
}

 
// STEP 2: Post IPN data back to paypal to validate

$ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

// In wamp like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path 
// of the certificate as shown below.
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
if( !($res = curl_exec($ch)) ) {
    // error_log("Got " . curl_error($ch) . " when processing IPN data");
    curl_close($ch);
    exit;
}
curl_close($ch);
 

// STEP 3: Inspect IPN validation result and act accordingly

if (strcmp ($res, "VERIFIED") == 0) {
    // check whether the payment_status is Completed
    // check that txn_id has not been previously processed
    // check that receiver_email is your Primary PayPal email
    // check that payment_amount/payment_currency are correct
    // process payment

    // assign posted variables to local variables
    $item_number = $_POST['item_number'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];
	$payer_id = $_POST['payer_id'];	
	$amt = $_POST['amt'];	
	
	if($_POST['txn_id']!='' AND $_POST['payment_status']='Completed'){
		//Update Orderdetail for successfull payment
		$updatesql="update `orderdetail` set `status`='complete', `transactionid`='".$_POST['txn_id']."',`authenticationcode`='".$_POST['verify_sign']."',`paidamount` = '".$payment_amount."' where `orderid`='".$item_number."' AND `userid`='".$_POST['custom']."'";
		$update=$obj_db->sql_query($updatesql); 
		
		//Select orderdeail for successfull payment
		$order_select="SELECT *,DATE_FORMAT(`date`,'%d %M, %Y') AS adddate FROM `orderdetail` WHERE `orderid`='".$item_number."' AND `userid`='".$_POST['custom']."'";
		$order_res=$obj_db->select($order_select);
		
		//Select admin email
		$admin_sql="SELECT * FROM `admin`";
		$admin=$obj_db->select($admin_sql);
		
		
		//Select order items
		$select_cart_item="SELECT *,cartorder.price as cartprice FROM `cartorder`
					LEFT OUTER JOIN `product` ON
					`cartorder`.`productid`=`product`.`productid`
					WHERE `cartorder`.`orderid`='".$item_number."'";
		$cart_item_res=$obj_db->select($select_cart_item);

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
				<td align='left' style='font-family:Verdana !important;'><img src=".$admin[0]['website']."/admin/upload/image/medthumb/".$cart_item_res[$i]['image']." /></td>
				<td align='left' style='font-family:Verdana !important;'>".$cart_item_res[$i]['productname']."</td>
				<td align='left' style='font-family:Verdana !important;'>".$cart_item_res[$i]['qty']."</td>
				<td align='left' style='font-family:Verdana !important;'>$ ".$customization[0]['monogramprice']."</td>
			</tr>";
}		
		//Mail to buyer
		$subject="Product purchased from Zymba (".date("d / M / Y").")";
		
$maildata="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
	<link href='http://fonts.googleapis.com/css?family=Verdana' rel='stylesheet' type='text/css' />

	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<title>Test Page</title>
</head>
<body style='font-family:Verdana !important;'>
<div class='wrapper' style='margin:0 auto; width:850px;'>
	<div class='innercontainer' style='width:100%; border-top:7px solid #272727; padding:15px; float:left;'>
		
	</div>
	<div class='order_info' style='padding:10px; width:100%; float:left;'>
		<div class='shopaddress' style='text-align:right; width:100%; float:left;'>
			<div style='width:250px; font-family:Verdana !important; float:left'>
				<img src='".$admin[0]['website']."/images/Zymba-logo.jpg' />
			</div>
			<div style='width:250px; font-family:Verdana !important; float:right'>
				<b>Zymba</b><br />
				".$admin[0]['address']."<br />
				<a href=".$admin[0]['website'].">zimba-customtailor</a><br />
				Phone: ".$admin[0]['varphoneno']."<br />
			</div>
		</div> 
		<div class='ordermessage' style='width:100%; font-family:Verdana !important; float:left;'>
			<p style='font-size:16px; font-family:Verdana !important;font-weight:bold;'>Thank you for your Order.</p>
			<p style='font-family:Verdana !important;'>
				We will email your Shipping Confirmation with your Tracking Number when your Items have been shipped. Your Order will generally be 										shipped within 24 hours after we've received it. You can check your Order's Status on your Account Pages at <a href='".$admin[0]['website']."orderhistory.php' target='_blank' >Order Track.</a></p>

				<p style='font-family:Verdana !important;'>If you have Questions about your Order, we're happy to take your Call</p>
				<p style='font-family:Verdana !important;'>".$admin[0]['varphoneno']." Monday to Friday : 10 am - 24 pm Saturday & Sunday : 10 am - 6 pm</p>
			 
		</div>
		
		<div class='orders_title' style='float: left;font-family:Verdana !important; font-size: 20px; padding: 10px; width: 98%;'>
					Order Detail <br /><br />
					Order Placed On : ".$order_res[0]['adddate']."<br /><br />
		</div>
				
				
		<div class='order_detail' style='width:100%; float:left; font-family:Verdana !important;'>
			<div class='orders' style=' border: 1px solid #9D9D9D; float: left; width: 100%;'>
				<div class='orders_title' style='background: none repeat scroll 0 0 #EFEFEF; float: left; font-size: 24px; padding: 8px; width: 98%;font-family:Verdana !important;'>
					Order Number : ".$order_res[0]['orderid']."
				</div>
				<div class='orders_detail' style=' float: left; font-family:Verdana !important; padding: 8px; width: 98%;'>
					<table width='100%' style='font-family:Verdana !important;'>
						<tr>
							<th align='left'>Billing Address:</th>
							<th align='left'>Payment Methods</th>
							<th align='right'>Payment Total</th>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td style='font-family:Verdana !important;' align='left' valign='top'>
								".$order_res[0]['address']."<br />
								".$order_res[0]['address2']."<br />
								".$order_res[0]['shippingcity']."<br />
								".$order_res[0]['shippingstate']."<br />
								".$order_res[0]['shippingcountry']."<br />
							</td>
							<td style='font-family:Verdana !important;' align='left' valign='top'>
								Paypal<br /><br />
							</td>
							<td align='right' style='font-family:Verdana !important;'>
								
								<table width='250' style='font-family:Verdana !important;'> 
									<tr>
										<td style='font-family:Verdana !important;' align='right'>Order Subtotal:</td>
										<td style='font-family:Verdana !important;' align='right'>$ ".($sum)."</td>
									</tr>
									<tr>
										<td style='font-family:Verdana !important;' align='right'>Shipping:</td>
										<td style='font-family:Verdana !important;' align='right'>$ ".$_SESSION['shipping']."</td>
									</tr>
									<tr>
										<td style='font-family:Verdana !important;' align='right'>Sales Tax:</td>
										<td style='font-family:Verdana !important;' align='right'>$ ".(($payment_amount)-($sum+$_SESSION['shipping']))."</td>
									</tr>
									<tr>
										<td style='font-family:Verdana !important;' align='right'><b>Order Total:</b></td>
										<td style='font-family:Verdana !important;' align='right'>$ ".($payment_amount)."</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						
					</table>
				</div>
			</div>
			<div class='orders' style=' border: 1px solid #9D9D9D; float: left; width: 100%; font-family:Verdana !important;'>
				<div class='orders_title' style='background: none repeat scroll 0 0 #EFEFEF; float: left; font-size: 24px; padding: 8px; width: 98%;font-family:Verdana !important;'>
					Products Shipment
				</div>
				<div class='order_wrapper' style='float: left; width: 100%;font-family:Verdana !important;'>
				<table class='order_wrapper-table' style='border-collapse: collapse; width: 100%;font-family:Verdana !important;'>
					<tr>
						<td class='td1' valign='top' style='padding: 20px; width: 600px;'>
							<div class='order_items' style='font-family:Verdana !important;'>
								<table width='100%' style='font-family:Verdana !important;'>
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
						
						<td class='td0' valign='top' style='border-right: 1px solid #9D9D9D; font-family:Verdana !important;'></td>
						
						<td class='td2' valign='top' style='padding: 20px;font-family:Verdana !important;'>
							<div class='order_address' style='width: 100%;font-family:Verdana !important;'>
								<div class='title_bold' style='font-weight: bold;font-family:Verdana !important;'>Shipping Address</div><br />
								<div class='address' style='font-family:Verdana !important;'>
									".$order_res[0]['address']."<br />
									".$order_res[0]['address2']."<br />
									".$order_res[0]['shippingcity']."<br />
									".$order_res[0]['shippingstate']."<br />
									".$order_res[0]['shippingcountry']."<br />
								</div><br />
								
								<div class='title_bold' style='font-weight: bold; font-family:Verdana !important;'>Method</div><br />
								<div class='address' style='font-family:Verdana !important;'>Ground</div><br />
								
								<div class='title_bold' style='font-weight: bold; font-family:Verdana !important;'>Shipping Status</div><br />
								<div class='address' style='font-family:Verdana !important;'>Done</div><br />
							</div>
						</td>
					</tr>
					
					<tr>
						<td class='td1' valign='top' style='padding: 20px; width: 600px; font-family:Verdana !important;'>
							<div class='order_items'>
								<table width='100%' style='font-family:Verdana !important;'>
									<tr>
										<td style='font-family:Verdana !important;'>Best Regards,</td>
									</tr>
									<tr>
										<td style='font-family:Verdana !important;'>Zymba Customer Service</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
					
					<tr>
						<td colspan='10' style='padding-bottom: 20px; style='font-family:Verdana !important;''>
							<table width='100%' style='font-family:Verdana !important;'>
									<tr>
										<td style='font-family:Verdana !important;' width='275px;'><hr /></td>
										<td style='font-family:Verdana !important;'><center> Discover <a href=".$admin[0]['website'].">www.zimba-customtailor.com</a></center></td>
										<td style='font-family:Verdana !important;' width='275px;'><hr /></td>
									</tr>
								</table>
						</td>
					</tr>
				</table>
				</div>					
			</div>
			<div style='font-family:Verdana !important;' >
				Call ".$admin[0]['varphoneno']." for your nearest Zymba or contact us at <a href=".$admin[0]['website'].">www.zimba-customtailor.com</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
"; //die();

		send_mail($admin[0]['varemailid'], $order_res[0]['email'], $subject ,$maildata);
		
		send_mail($order_res[0]['email'], $admin[0]['varemailid'], "admin" ,$maildata);		
	}
} 
else if (strcmp ($res, "INVALID") == 0) {
    // log for manual investigation
	
	/*$insert = "insert into `demo` (`data`) values ('Invalid,".$res."')";
	$result=$obj_db->insert($insert); */
}
?>
