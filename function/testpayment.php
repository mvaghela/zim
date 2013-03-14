<?php
if($_SESSION['orderid']=='' || $_SESSION['userid']==''){
	header("location:index.php");
	die();	
}
//Select Cart items
$select_cart_item="SELECT * FROM `cartorder`
					LEFT OUTER JOIN `product` ON
					`cartorder`.`productid`=`product`.`productid`
					WHERE `cartorder`.`orderid`='".$_SESSION['orderid']."'";
$cart_item_res=$obj_db->select($select_cart_item);

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Confirm Payment'){
	
	$order_select="SELECT * FROM `orderdetail` WHERE `orderid`='".$_SESSION['orderid']."' AND `userid`='".$_SESSION['userid']."'";
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
	
	//Authorize.net login key
	$authorize_login="7uaVP28s5j2";
	//Authorize.net secrete key
	$authorize_secrete="5e7d6V6v3477PwEd";
	//Mode test and live change Accourdingly
	$post_url = "https://test.authorize.net/gateway/transact.dll";
	
	//$post_url = "https://secure.authorize.net/gateway/transact.dll";
	
	$payment=$priceforcheckout;
	
	
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
	
	$admin_sql="SELECT * FROM `admin`";
	$admin=$obj_db->select($admin_sql);
	
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
									'complete','".$_SESSION['orderid']."', '".$_SESSION['userid']."')";								
		$payment_method=$obj_db->insert($insert_payment_detail);
		
		/*$update_order_detail="UPDATE `orderdetail` SET 
								`nameoncard`='".$holder_name."', `cardnumber`='".$card_code."',
								`month`='".$expiry_month."',`year`='".$expiry_year."',
								`payment_method`='".$payment_method."',`transactionid`='".$response_array[6]."',
								`authenticationcode`='".$response_array[4]."',`cvvnumber`='".$cvv."',
								`status`='complete'
								WHERE `orderid`='".$_SESSION['orderid']."' AND `userid`='".$_SESSION['userid']."'";
		$update_res=$obj_db->sql_query($update_order_detail);*/
		
		$subject="Product purchased from Zymba (".date("d / M / Y").")";
		echo $maildata="
		
			<table width='600px' style='font-family:Arial, Helvetica, sans-serif; border:1px solid #999; background:#fff;'>
			<tr>
				<td style='padding:10px;'>
					<img style='float:left; width:150px;' src='".$admin[0]['website']."images/Zymba-logo.jpg' />
					<div style='float:right; padding-top:30px; font-size:13px;'><a style='font-size:13px; color:#01A7E3;' href='".$admin[0]['website']."orderhistory.php'>View order</a></div>
				</td>
			</tr>
			<tr>
				<td style='padding:20px 5%;'>
					<div><strong>Hello ".ucfirst($order_res[0]['shippingfirstname']).",</strong></div><br>
					<div style='color:#FE9601; font-weight:bold; font-size:22px;width:100%;'>
						Thank you for purchasing from Zymba
					</div>
				</td>
			</tr>
			<tr>
				<td style='padding:20px 5%;'>
					<table style='width:100%; border:1px solid #999; background:#F4E9D5; font-size:14px;'>
						<tr>
							<td colspan='2' style='background:#4AB1E3; color:#fff; padding:5px 0 3px 10px;'><strong>Bill To:</strong></td>
						</tr>
						<tr>
							<td width=150px>Name</td>
							<td>".ucfirst($order_res[0]['shippingfirstname'])."</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>".$order_res[0]['address']."</td>
						</tr>
						<tr>
							<td>State</td>
							<td>".$order_res[0]['shippingstate']."</td>
						</tr>
						<tr>
							<td>City</td>
							<td>".$order_res[0]['shippingcity']."</td>
						</tr>
						<tr>
							<td>Zip</td>
							<td>".$order_res[0]['postcode']."</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>".$order_res[0]['shtelephone']."</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>".$order_res[0]['email']."</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style='padding:20px 5%;'>
					<table style='width:100%; border:1px solid #999; background:#F4E9D5; font-size:14px;'>
						<tr>
							<td colspan='2' style='background:#4AB1E3; color:#fff; padding:5px 0 3px 10px;'><strong>Payment info:</strong></td>
						</tr>
						<tr>
							<td width=150px>Name</td>
							<td>".ucfirst($order_res[0]['shippingfirstname'])."</td>
						</tr>
						<tr>
							<td>Card Number</td>
							<td>".$card_code."</td>
						</tr>
						<tr>
							<td>Authorization code</td>
							<td>".$response_array[4]."</td>
						</tr>
						<tr>
							<td>Transaction ID</td>
							<td>".$response_array[6]."</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style='padding:20px 5%;'>
					<table style='width:100%; border:1px solid #999; background:#F4E9D5; font-size:14px;'>
						<tr>
							<td colspan='2' style='background:#4AB1E3; color:#fff; padding:5px 0 3px 10px;'><strong>Order Details:</strong></td>
						</tr>
						<tr>
							<td colspan='2'>
								<table width='100%'>
									<tr>
										<th width='50%' align='left'>Item</th>
										<th width='50%' align='left'>Quantity</th>
										<th width='50%' align='left'>Price</th>
									</tr>";
							
									for($i=0;$i<count($cart_item_res);$i++){
										$maildata.="<tr>
														<td><img src='".$admin[0]['website']."admin/upload/image/medthumb/".$cart_item_res[$i]['image']."'/></td>
														<td>".$cart_item_res[$i]['qty']."</td>
														<td>".$cart_item_res[$i]['qty']*$cart_item_res[$i]['price']."</td>
													</tr>";
										}							
						$maildata.="<tr>
										<td colspan='2'>Shipping : ".$_SESSION['shipping']."
									</tr>
								</table>
							</td>
						</tr>						
					</table>
				</td>
			</tr>
			<tr>
				<td style='padding:20px 5%;  font-size:14px;'>
					Thank you,<br>
					<a href='".$admin[0]['website']."' style='color:#01A7E3;'>Zymba</a>
				</td>
			</tr>
		</table>		
		";
		
		$emaildata=explode(",",$admin[0]['varemailid']);
		
		send_mail($emaildata[0], $order_res[0]['email'], $subject ,$maildata);
		
		$subject="Product purchased from Zymba (".date("d / M / Y").")";
		echo $maildata2="		
			<table width='600px' style='font-family:Arial, Helvetica, sans-serif; border:1px solid #999; background:#fff;'>
			<tr>
				<td style='padding:10px;'>
					<img style='float:left; width:150px;' src='".$admin[0]['website']."images/Zymba-logo.jpg' />					
				</td>
			</tr>
			<tr>
				<td style='padding:20px 5%;'>
					<div><strong>Hello Admin,</strong></div><br>
					<div style='color:#FE9601; font-weight:bold; font-size:22px;width:100%;'>
						".ucfirst($order_res[0]['shippingfirstname'])." has purchased a product from Zymba
					</div>
				</td>
			</tr>
			<tr>
				<td style='padding:20px 5%;'>
					<table style='width:100%; border:1px solid #999; background:#F4E9D5; font-size:14px;'>
						<tr>
							<td colspan='2' style='background:#4AB1E3; color:#fff; padding:5px 0 3px 10px;'><strong>Bill To:</strong></td>
						</tr>
						<tr>
							<td width=150px>Name</td>
							<td>".ucfirst($order_res[0]['shippingfirstname'])."</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>".$order_res[0]['address']."</td>
						</tr>
						<tr>
							<td>State</td>
							<td>".$order_res[0]['shippingstate']."</td>
						</tr>
						<tr>
							<td>City</td>
							<td>".$order_res[0]['shippingcity']."</td>
						</tr>
						<tr>
							<td>Zip</td>
							<td>".$order_res[0]['postcode']."</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>".$order_res[0]['shtelephone']."</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>".$order_res[0]['email']."</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style='padding:20px 5%;'>
					<table style='width:100%; border:1px solid #999; background:#F4E9D5; font-size:14px;'>
						<tr>
							<td colspan='2' style='background:#4AB1E3; color:#fff; padding:5px 0 3px 10px;'><strong>Payment info:</strong></td>
						</tr>
						<tr>
							<td width=150px>Name</td>
							<td>".ucfirst($order_res[0]['shippingfirstname'])."</td>
						</tr>
						<tr>
							<td>Card Number</td>
							<td>".$card_code."</td>
						</tr>
						<tr>
							<td>Authorization code</td>
							<td>".$response_array[4]."</td>
						</tr>
						<tr>
							<td>Transaction ID</td>
							<td>".$response_array[6]."</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style='padding:20px 5%;'>
					<table style='width:100%; border:1px solid #999; background:#F4E9D5; font-size:14px;'>
						<tr>
							<td colspan='2' style='background:#4AB1E3; color:#fff; padding:5px 0 3px 10px;'><strong>Order Details:</strong></td>
						</tr>
						<tr>
							<td colspan='2'>
								<table width='100%'>
									<tr>
										<th width='50%' align='left'>Item</th>
										<th width='50%' align='left'>Quantity</th>
										<th width='50%' align='left'>Price</th>
									</tr>";
									
									for($i=0;$i<count($cart_item_res);$i++){
									$maildata2.="<tr>
													<td><img src='".$admin[0]['website']."admin/upload/image/medthumb/".$cart_item_res[$i]['image']."'/></td>
													<td>".$cart_item_res[$i]['qty']."</td>
													<td>".$cart_item_res[$i]['qty']*$cart_item_res[$i]['price']."</td>
												</tr>";
									}
						$maildata2.="<tr>
										<td colspan='2'>Shipping : ".$_SESSION['shipping']."
									</tr>
								</table>
							</td>
						</tr>						
					</table>
				</td>
			</tr>
			<tr>
				<td style='padding:20px 5%;  font-size:14px;'>
					Thank you,<br>
					<a href='".$admin[0]['website']."' style='color:#01A7E3;'>Zymba</a>
				</td>
			</tr>
		</table>		
		";
		
		for($i=0;$i<count($emaildata);$i++) {
			send_mail($order_res[0]['email'], $emaildata[$i], $subject ,$maildata2);
		}
			
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