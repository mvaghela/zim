<?php include("system/config.inc.php");
include("function/pages.php");
include("function/login1.php");
include("function/shipping.php");
//$_SESSION['shipping']=15;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Shipping</title>
</head>
<body>
<?php include('include/menuhideheader.php'); ?>
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
				<div class="bread active_bread">
					Shipping
					<span class="arrow_box active_bread"></span>
				</div>
				<div class="bread">
					Review Order
					<span class="arrow_box"></span>
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
				<div class="shipping_left">
                	<center><div class="shipping_title">Shipping Details</div></center>
                    <div class="shipping_details">
                    	<?php if($_GET['msg']=='user_exist'){ 
								echo '<div class="message errormsg" style="display: block;background-image:none;"><p>&nbsp;&nbsp;&nbsp;User with same email already exist please choose another one.</p>
								<span class="close" title="Dismiss"></span>
								</div>'; ?>
						<?php } ?>
                    	<form id="shipping_form" method="post">
                        	<table width="100%" cellspacing="10">
								<tr>
                                	<td class="small">Title :</td>
                                    <td>
										<select name="title" class="login_text validate[required]" style="width:70px;">
											<option value="">Select</option>
											<option value="Mr.">Mr.</option>
											<option value="Mrs.">Mrs.</option>
											<option value="Mrs.">Miss.</option>											
										</select>
									</td>
                                </tr>
								<tr>
                                	<td class="small">First Name :</td>
                                    <td><input type="text" name="name" class="login_text validate[required,maxSize[250]]" /></td>
                                </tr>
                            	<tr>
                                	<td class="small">Last Name :</td>
                                    <td><input type="text" name="lname" class="login_text validate[required,maxSize[250]]" /></td>
                                </tr>
                                <tr>
                                	<td class="small">Address :</td>
                                    <td><input type="text" name="address" class="login_text validate[required,maxSize[1000]]" /></td>
                                </tr>
                                <tr>
                                	<td class="small">Address 2 <span>(optional)</span>:</td>
                                    <td><input type="text" name="address2" class="login_text" />
                                </tr>
                                <tr>
                                	<td class="small">City :</td>
                                    <td><input type="text" name="city" class="login_text validate[required,maxSize[250]]" /></td>
                                </tr>
                                <tr>
                                	<td class="small">Zip Code :</td>
                                    <td><input type="text" name="zip" class="login_text validate[required,maxSize[250]]" /></td>
                                </tr>
                                <tr>
                                	<td class="small">Province/State :</td>
                                    <td><input type="text" name="state" class="login_text validate[required,maxSize[250]]" /></td>
                                </tr>
                                <tr>
                                	<td class="small">Phone :</td>
                                    <td><input type="text" name="telephone" class="login_text validate[required,maxSize[10],custom[phone]]" /></td>
                                </tr>
                                <tr>
                                	<td class="small">Country :</td>
                                    <td><input type="text" name="country" class="login_text validate[required,maxSize[250]]" /></td>
                                </tr> 
								
								<!--<tr>
                                	<td class="small">Billingdetail :</td>
                                    <td><input type="checkbox" name="billingdetail" value="yes" style="width:auto;" class="login_text" /></td>
                                </tr>-->
                                   
                                 <?php if($_SESSION['userid']!=''){?>
                                 <tr>
                                	<td></td>
                                    <td>
                                    	<input type="submit" class="btn" name="checkout" value="checkout" /></td>
                                    </td>
                                </tr>  	
                                 <?php }?>                                                          
                            </table>                        
                                       
                    <?php if($_SESSION['userid']==''){?>
                    <center><div class="shipping_title">Create An Account</div></center>
                                       	
                        	<table width="100%" cellspacing="10">
                            	<tr>
                                	<td class="small">Email* :</td>
                                    <td><input type="text" name="email" class="login_text validate[required,maxSize[250],custom[email]]" /></td>
                                </tr>
                                <tr>
                                	<td class="small">Password* :</td>
                                    <td><input type="password" name="password" id="password" class="login_text validate[required,maxSize[250]]" /></td>
                                </tr>
                                <tr>
                                	<td class="small">Confirm Password:</td>
                                    <td><input type="password" name="confirmpassword" class="login_text validate[required,equals[password]]" /></td>
                                </tr>
                                <tr>
                                	<td></td>
                                    <td>
                                    	<input type="submit" class="btn" name="checkout" value="checkout" />
                                    </td>
                                </tr>   
                                <tr>
                                	<td></td>
                                    <td>
                                    	By creating an account you will have access to:
                                        <ul>
                                        	<li><img src="images/measurement.png" alt="Measurement image" width="16"/> Saving Measurement profile</li>
                                            <li><img src="images/measurement.png" alt="Measurement image" width="16"/> Tracking your order online</li>
                                            <li><img src="images/measurement.png" alt="Measurement image" width="16"/> Viewing order history</li>
                                        </ul>
                                    </td>
                                </tr>
                                                                                           
                            </table>
                         <?php }?>
                        </form>                        
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
                                    <td align="right">Method : </td>
                                    <td align="right">Ground </td>
                                </tr>
                                <!--<tr>
                                    <td align="right">Sales Tax : </td>
                                    <td align="right">$ 00.00</td>
                                </tr>-->
                                <tr>
                                    <td align="right">Estimated Total : </td>
                                    <td align="right">$ <?php if($_SESSION['discount']!=''){ echo $_SESSION['discount']+$_SESSION['shipping']; }else { echo $sum+$_SESSION['shipping'];}?></td>
                                </tr>
                            </table>
                        </div>	
                    </div>
                    
                    <div class="order_summery">
                    	<div style="padding:20px;">
                    	<?php echo $page_res[0]['content'];?>
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