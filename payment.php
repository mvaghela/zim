<?php include("system/config.inc.php");
include("function/payment.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Payment</title>
</head>
<body>
<?php include('include/menuhideheader.php'); ?>
<?php if($_REQUEST['msg_payment']!=''){?>
<script type="text/javascript">
	$(document).ready(function(){
		$.fancybox({
			href:"#error",
			'hideOnOverlayClick' : false
		});	
	});
</script>
<?php }?>
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
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
				<div class="bread active_bread">
					billing
					<span class="arrow_box active_bread"></span>
				</div>
				<div class="bread">
					Order Confirm
					<span class="arrow_box"></span>
				</div>
			</div>
			</div>
            <script language="javascript">
				jQuery(document).ready(function(){
					jQuery("#shipping_form").validationEngine();
				});
			</script>
			<div class="filter-fabric">
				<form id="shipping_form" method="post">
				<div class="shipping_left">
                	<center>
						<div class="shipping_title">Billing Details</div>
						<div>
							<table>
								<tr>
									<td><img src="images/lock2.png" /></td>
									<td>Secure SSL Encryption</td>
								</tr>
							</table>
						</div>
					</center>
					
                    <div class="shipping_details">
                    	<?php if($_GET['msg']=='user_exist'){
							echo '<div class="message errormsg" style="display: block;background-image:none;"><p>&nbsp;&nbsp;&nbsp;User with same email already exist please choose another one.</p>
							<span class="close" title="Dismiss"></span>
							</div>'; ?>
						<?php } 
				$select_user="SELECT * FROM `orderdetail` WHERE `orderid`='".$_SESSION['orderid']."'";
				$exist_user=$obj_db->select($select_user);
				$titile = explode('.',$exist_user[0]['shippingfirstname']);
				
				$title = $titile[0];
				$name = $titile[1];
						
						?>
                        	<table width="100%" cellspacing="10">
								<tr>
                                	<td class="small">Title :</td>
                                    <td>
										<select name="title" class="login_text validate[required]" style="width:70px;">
											<option value="">Select</option>
											<option value="Mr." <?php if($title=='Mr'){ ?> selected="selected" <?php } ?> > Mr.</option>
											<option value="Mrs." <?php if($title=='Mrs'){ ?> selected="selected" <?php } ?> > Mrs.</option>
											<option value="Mrs." <?php if($title=='Mrs'){ ?> selected="selected" <?php } ?> > Miss.</option>											
										</select>
									</td>
                                </tr>
								<tr>
                                	<td class="small">First Name :</td>
                                    <td><input type="text" name="name" class="login_text validate[required,maxSize[250]]" value="<?php echo $name;?>"/></td>
                                </tr>
                            	<tr>
                                	<td class="small">Last Name :</td>
                                    <td><input type="text" name="lname" class="login_text validate[required,maxSize[250]]" value="<?php echo $exist_user[0]['shippinglastname'];?>" /></td>
                                </tr>
								<tr>
                                	<td class="small">Email :</td>
                                    <td><input type="text" name="email" class="login_text validate[required,maxSize[250],custom[email]]" value="<?php echo $exist_user[0]['email'];?>" /></td>
                                </tr>
                                <tr>
                                	<td class="small">Address :</td>
                                    <td><input type="text" name="address" class="login_text validate[required,maxSize[1000]]" value="<?php echo $exist_user[0]['address'];?>"/></td>
                                </tr>
                                <tr>
                                	<td class="small">Address 2 <span>(optional)</span>:</td>
                                    <td><input type="text" name="address2" class="login_text" value="<?php echo $exist_user[0]['address2'];?>"/>
                                </tr>
                                <tr>
                                	<td class="small">City :</td>
                                    <td><input type="text" name="city" class="login_text validate[required,maxSize[250]]" value="<?php echo $exist_user[0]['shippingcity'];?>"/></td>
                                </tr>
                                <tr>
                                	<td class="small">Zip Code :</td>
                                    <td><input type="text" name="zip" class="login_text validate[required,maxSize[250]]" value="<?php echo $exist_user[0]['postcode'];?>"/></td>
                                </tr>
                                <tr>
                                	<td class="small">Province/State :</td>
                                    <td><input type="text" name="state" class="login_text validate[required,maxSize[250]]"value="<?php echo $exist_user[0]['shippingstate'];?>" /></td>
                                </tr>
                                <tr>
                                	<td class="small">Phone :</td>
                                    <td><input type="text" name="telephone" class="login_text validate[required,maxSize[10],custom[phone]]" value="<?php echo $exist_user[0]['shtelephone'];?>"/></td>
                                </tr>
                                <tr>
                                	<td class="small">Country :</td>
                                    <td><input type="text" name="country" class="login_text validate[required,maxSize[250]]" value="<?php echo $exist_user[0]['shippingcountry'];?>"/></td>
                                </tr> 
                            	<tr>
                                	<td class="small">Payment Method :</td>
                                    <td>
										<select name="payment_method" class="login_text validate[required]" style="width:101%;">
											<option value="">--------Select--------</option>
											<option value="visa">Visa</option>
											<option value="mastercard">Mastercard</option>
											<option value="mastercard">Mastercard</option>
											<option value="mastercard">Mastercard</option>
										</select>
									</td>
                                </tr>
							    <tr>
                                	<td class="small">Holder's Name :</td>
                                    <td><input type="text" name="holder_name" class="login_text validate[required,maxSize[1000]]" /></td>
                                </tr>
                                <tr>
                                	<td class="small">Card Number :</td>
                                    <td><input type="text" name="card_number" class="login_text" maxlength="16"/></td>
                                </tr>
                                <tr>
                                	<td class="small">Expiry Date :</td>
                                    <td>
										<select name="expiry_month" class="login_text validate[required]" style="width:70px;">
											<option value="">Month</option>
											<option value="01">1</option>
											<option value="02">2</option>
											<option value="03">3</option>
											<option value="04">4</option>
											<option value="05">5</option>
											<option value="06">6</option>
											<option value="07">7</option>
											<option value="08">8</option>
											<option value="09">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											
										</select>
										<span style="float:left;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
										<select name="expiry_year" class="login_text validate[required]" style="width:70px;">
											<option value="">Year</option>
											<option value="12">2012</option>
											<option value="13">2013</option>
											<option value="14">2014</option>
											<option value="15">2015</option>
											<option value="16">2016</option>
											<option value="17">2017</option>
											<option value="18">2018</option>
											<option value="19">2019</option>
											<option value="20">2020</option>
											<option value="21">2021</option>
											<option value="22">2022</option>
											<option value="23">2023</option>
											<option value="24">2024</option>
										</select>
									</td>
                                </tr>
								<tr>
                                	<td>Verification Card Code :</td>
                                    <td>
										<input type="text" name="card_code" class="login_text small_text validate[required,maxSize[250]]" style="width:50px !important; float:left;"/>
										<table style="float:left;">
											<tr>
												<td><img src="images/securecode.png" height="25"/></td>
												<td><a href="#">What's this?</a></td>
											</tr>
										</table>
									</td>
                                </tr>
								<tr></tr>
								<tr>
									<td></td>
									<td>
										<table width="100%">
											<tr>
												<td align="center">
													<input type="submit" class="btn" name="submit" value="Confirm Payment" /></form>
												</td>
												<td align="center"> Or </td>
												<td align="center">
												<form action="" method="post">
													<input type="submit" class="paypal" name="paypal" value=""/>
												</form>
												</td>								
											</tr>
										</table>
									</td>
								</tr>
                                <tr>
                                	<td class="small"></td>
                                    <td><img src="images/payments.png" /></td>
                                </tr>								
                            </table>
                        
                    </div>                   
                </div>
                <div class="shipping_right">
                    <div class="order_summery" style="margin-top:65px;">
                    	<div class="summery_title">
                        	Order Summery<a href="shoppingbag.php">edit</a>
                        </div>
                        <div class="order_details">
                            <div class="order_wrapper" id="cart">                            
                            	<!-- start Basic Jquery Slider -->                                 
                                    <?php for($i=0;$i<count($cart_item_res);$i++){
									$sum+=$cart_item_res[$i]['cartprice']*$cart_item_res[$i]['qty'];	
									?>
                                    <div class="orders_all">
                                      	<div class="order_img">
                                            <img src="admin/upload/image/medthumb/<?php echo $cart_item_res[$i]['image'];?>" />
                                        </div>
                                        <div class="summery_order_detail">
                                            <div class="order_title">
                                                <?php echo stripslashes($cart_item_res[$i]['productname']);?>
                                            </div>
                                            <div class="order_value">
                                                $ <?php echo stripslashes($cart_item_res[$i]['cartprice']);?>
                                            </div>
                                            <div class="order_qty">
                                                Quantity : <?php echo stripslashes($cart_item_res[$i]['qty']);?>
                                            </div>                                            
                                        </div>
                               		</div>
                                    <?php }?>                    
                            </div>
                            <table width="100%" align="left">
                                <tr>
                                    <td align="right">Order subtotal : </td>
                                    <td align="right">$ <?php echo stripslashes($sum);?></td>
                                </tr>
                                <?php if($_SESSION['coupon']['coupon_status']=='used'){?>
                                <tr>
                                    <td align="right">Discount : </td>
                                    <td align="right">$ <?php echo $_SESSION['coupon']['coupon_value']?></td>
                                </tr>
                                <tr>
                                    <td align="right">New Total : </td>
                                    <td align="right">$ <?php echo $_SESSION['discount'];?></td>
                                </tr>
                                <?php }?>
                                <tr>
                                    <td align="right">Shipping : </td>
                                    <td align="right">$ <?php echo $_SESSION['shipping']?></td>
                                </tr>
                                <tr>
                                    <td align="right">Ground : </td>
                                    <td align="right"></td>
                                </tr>
                                <tr>
                                    <td align="right">Sales Tax : </td>
                                    <td align="right">$ 00.00</td>
                                </tr>
                                <tr>
                                    <td align="right">Estimated Total : </td>
                                    <td align="right">$ <?php if($_SESSION['discount']!=''){ echo $_SESSION['discount']+$_SESSION['shipping']; }else { echo $sum+$_SESSION['shipping'];}?></td>
                                </tr>
                            </table>
                        </div>	
                    </div>
					<div style="padding:20px;">
						
					</div>
                </div>
				<div style="display:none">
					<div class="error" id="error">
						<?php echo $_REQUEST['msg_payment'];?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>