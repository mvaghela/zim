<?php
if($_SESSION['orderid']=='' || $_SESSION['userid']==''){
	header("location:index.php");
	die();	
}
//Select Cart items 
$select_cart_item="SELECT *,cart.price as cartprice FROM `cart`
					LEFT OUTER JOIN `product` ON
					`cart`.`productid`=`product`.`productid`
					WHERE `cart`.`cartsessionid`='".$_SESSION['key']."'";
$cart_item_res=$obj_db->select($select_cart_item);


if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Confirm Payment'){
	
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
	
	//Authorize.net login key
	$authorize_login="7uaVP28s5j2";
	//Authorize.net secrete key
	$authorize_secrete="5e7d6V6v3477PwEd";
	//Mode test and live change Accourdingly
	$post_url = "https://test.authorize.net/gateway/transact.dll";
	
	//$post_url = "https://secure.authorize.net/gateway/transact.dll";
	
	
	
	
	$post_values = array(
		
		// the API Login ID and Transaction Key must be replaced with valid values
		"x_login"			=> $authorize_login,
		"x_tran_key"		=> $authorize_secrete,
	
		"x_version"			=> "3.1",
		"x_delim_data"		=> "TRUE",
		"x_delim_char"		=> "|",
		"x_relay_response"	=> "FALSE",
	
		"x_type"			=> "AUTH_CAPTURE",
		"x_method"			=> "CC",
		"x_card_num"		=> $_REQUEST['card_number'],
		//"x_card_num"		=> "47854",
		"x_exp_date"		=> $expiry_month.$expiry_year,
	
		"x_amount"			=> $payment,
		"x_description"		=> "Zymba",
	
		"x_first_name"		=> ucfirst(stripslashes($order_res[0]['shippingfirstname'])),
		"x_address"			=> ucfirst(stripslashes($order_res[0]['address'])),
		"x_state"			=> ucfirst(stripslashes($order_res[0]['shippingstate'])),
		"x_country"			=> ucfirst(stripslashes($order_res[0]['shippingcountry'])),
		"x_zip"				=> $order_res[0]['postcode'],
		"x_phone"			=> $order_res[0]['shtelephone'],
		"x_email"			=> $order_res[0]['email']		
			
		// Additional fields can be added here as outlined in the AIM integration
		// guide at: http://developer.authorize.net
	);
	
	
	// This section takes the input fields and converts them to the proper format
	$post_string = "";
	foreach( $post_values as $key => $value )
		{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
	$post_string = rtrim( $post_string, "& " );
	
	
	// library enabled in your php configuration
	
	
	
	
	$request = curl_init($post_url); // initiate curl object
		curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
		curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
		$post_response = curl_exec($request); // execute curl post and store results in $post_response
		// additional options may be required depending upon your server configuration
		// you can find documentation on curl options at http://www.php.net/curl_setopt
	curl_close ($request); // close curl object 
	
	
	
	/*echo "<pre>";
	print_r($post_values);
	print_r($post_response);
	echo "</pre>";*/
	
	// This line takes the response and breaks it into an array using the specified delimiting character
	$response_array = explode($post_values["x_delim_char"],$post_response);
	//if(1==1){
	if($response_array[0]=='1' AND $response_array[3]=='This transaction has been approved.'){
	
		//Insert payment details
		$insert_payment_detail="INSERT INTO `payment_details` 
									(`first_name` ,`last_name` ,`email` ,
									`address1` ,`address2` ,`city` ,`state` ,
									`country` ,`phone` ,`payment_method` ,`card_holder` ,
									`card_number` ,`expiry_month` ,`expiry_year` ,
									`varification_code` , `status`, `order_id` ,`userid`)
								VALUES 
									('".$fname."', '".$lfname."', '".$email."', 
									'".$address."', '".$address2."', '".$city."', 
									'".$state."', '".$country."', '".$telephone."', 
									'".$payment_method."', '".$holder_name."', '".$card_code."',
									'".$expiry_month."', '".$expiry_year."', '".$cvv."', 
									'complete','".$_SESSION['orderid']."', '".$_SESSION['userid']."')";	 //die();							
		$payment_methodnew=$obj_db->insert($insert_payment_detail);
		
		$update_order_detail="UPDATE `orderdetail` SET 
								`nameoncard`='".$holder_name."', `cardnumber`='".$card_code."',
								`month`='".$expiry_month."',`year`='".$expiry_year."',
								`payment_method`='".$payment_method."',`transactionid`='".$response_array[6]."',
								`authenticationcode`='".$response_array[4]."',`cvvnumber`='".$cvv."',
								`status`='complete'
								WHERE `orderid`='".$_SESSION['orderid']."' AND `userid`='".$_SESSION['userid']."'";
		$update_res=$obj_db->sql_query($update_order_detail);
		
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
				<td align='left'><img src=".$admin[0]['website']."/admin/upload/image/medthumb/".$cart_item_res[$i]['image']." /></td>
				<td align='left'>".$cart_item_res[$i]['productname']."</td>
				<td align='left'>".$cart_item_res[$i]['qty']."</td>
				<td align='left'>$ ".$customization[0]['monogramprice']."</td>
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
				<a href=''.$admin[0]['website'].''>Zymba</a><br />
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
		
		<div class='orders_title' style='float: left;font-family:Verdana !important; font-size: 24px; padding: 10px; width: 98%;'>
					Order Detail <br /><br />
					Order Placed On : ".$order_res[0]['date']."<br /><br />
		</div>
				
				
		<div class='order_detail' style='width:100%; float:left; font-family:Verdana !important;'>
			<div class='orders' style=' border: 1px solid #9D9D9D; float: left; width: 100%;'>
				<div class='orders_title' style='background: none repeat scroll 0 0 #EFEFEF; float: left; font-size: 24px; padding: 10px; width: 97%;font-family:Verdana !important;'>
					Order Number : ".$order_res[0]['orderid']."
				</div>
				<div class='orders_detail' style=' float: left; font-family:Verdana !important; padding: 10px; width: 98%;'>
					<table width='100%' style='font-family:Verdana !important;'>
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
								
								<table width='250' style='font-family:Verdana !important;'> 
									<tr>
										<td align='right'>Order Subtotal:</td>
										<td align='right'>".($payment-15)."</td>
									</tr>
									<tr>
										<td align='right'>Shipping:</td>
										<td align='right'>$ 15</td>
									</tr>
									<tr>
										<td align='right'>Sales Tax:</td>
										<td align='right'>$ 0</td>
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
			<div class='orders' style=' border: 1px solid #9D9D9D; float: left; width: 100%; font-family:Verdana !important;'>
				<div class='orders_title' style='background: none repeat scroll 0 0 #EFEFEF; float: left; font-size: 24px; padding: 10px; width: 97%;font-family:Verdana !important;'>
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
								<div class='title_bold' style='font-weight: bold;font-family:Verdana !important;'>Shipping Address</div>
								<div class='address' style='font-family:Verdana !important;'>
									".$order_res[0]['address']."<br />
									".$order_res[0]['address2']."<br />
									".$order_res[0]['shippingcity']."<br />
									".$order_res[0]['shippingstate']."<br />
									".$order_res[0]['shippingcountry']."<br />
								</div>
								
								<div class='title_bold' style='font-weight: bold; font-family:Verdana !important;'>Method</div>
								<div class='address' style='font-family:Verdana !important;'>Ground</div>
								
								<div class='title_bold' style='font-weight: bold; font-family:Verdana !important;'>Shipping Status</div>
								<div class='address' style='font-family:Verdana !important;'>None</div>
							</div>
						</td>
					</tr>
					
					<tr>
						<td class='td1' valign='top' style='padding: 20px; width: 600px; font-family:Verdana !important;'>
							<div class='order_items'>
								<table width='100%' style='font-family:Verdana !important;'>
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
						<td colspan='10' style='padding-bottom: 20px; style='font-family:Verdana !important;''>
							<table width='100%' style='font-family:Verdana !important;'>
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
			<div style='font-family:Verdana !important;' >
				Call ".$admin[0]['varphoneno']." for your nearest Zymba or contact us at <a href=".$admin[0]['website'].">www.Zymba.com</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
"; //die();
		
		//$emaildata=explode(",",$admin[0]['varemailid']);
		
		send_mail($admin[0]['varemailid'], $order_res[0]['email'], $subject ,$maildata);
		
		send_mail($order_res[0]['email'], $admin[0]['varemailid'], "admin" ,$maildata);		
			
				
				
		header("location:success.php?tx=done&cm=".$_SESSION['userid']."&item_number=".$_SESSION['orderid']);
		die();
		
	}
	
	else{
		
		header("location:payment.php?msg_payment=".$response_array[3]);
		die();
		
	}
	

}

if(isset($_REQUEST['paypal'])){
	
	$update_order_detail="UPDATE `orderdetail` SET 
								`payment_method`='paypal' WHERE `orderid`='".$_SESSION['orderid']."' AND `userid`='".$_SESSION['userid']."'";
	$update_res=$obj_db->sql_query($update_order_detail);
	
	header("location:paypal.php");
	die();
}

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