<?php 
include("system/config.inc.php"); 
include("function/orderreview.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Shopping Bag</title>
</head>
<body>
<?php include('include/header.php'); ?>

<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
			<!--<div class="inner-title">
				<ul>
                	<li class="last"><a>Payment Options</a></li>
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
				<div class="bread active_bread">
					Review Order
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
			<table width="100%">
				<tr>
					<td colspan="3">
						<center><div class="login_title">
							<h1>Review Order</h1>
						</div></center>
					</td>
				</tr>
			</table>
            <?php if($_GET['sel_measurement']=='true'){ 
					echo '<div class="message errormsg" style="display: block;background-image:none;"><p>&nbsp;&nbsp;&nbsp;Please select measurement.</p>
					<span class="close" title="Dismiss"></span>
					</div>'; ?>
			<?php } ?>
			<?php
			//--------select query for display data-------//
			$sql="SELECT *,cart.price as cartprice FROM `cart` 
							LEFT OUTER JOIN `product`
							ON product.productid=cart.productid
							WHERE cart.cartsessionid='".$_SESSION['key']."'"; 
			$result=$obj_db->select($sql);
			if($_SESSION['userid']){
				$user=$_SESSION['userid'];
			}else{
				$user=session_id();	
			}
			?>
			<center><div class="loading" id="loading"></div></center>

			<div class="contentcart" id="contentcart">
			<table class="shopping_table" width="100%">
				<tr>
					<th width="20px" colspan="2">Product</th>
					<th width="120px">Quantity</th>
					
					<th width="115px">Price</th>
					<th width="100px">Grand Total</th>
				</tr>
                              
				<?php
					$sum=0;
					$qtycount=0;
					for($i=0;$i<count($result);$i++) { 
					$sum+=$result[$i]['cartprice'] *$result[$i]['qty'];
					$qtycount+=$result[$i]['qty']; 
					
					?>                    
					                   
				<tr>
					<td><img src="admin/upload/image/medthumb/<?php echo $result[$i]['image']; ?>"></td>
					<td><?php echo $result[$i]['productname']; ?></td>					
					<td><?php echo $result[$i]['qty']; ?></td>
					
					<td>$ <?php echo ($result[$i]['cartprice']); ?></td>
					<td>$ <?php echo (($result[$i]['cartprice'])*$result[$i]['qty']); ?></td>
				</tr>
				<?php } ?> 
				<tr>
					<td>
						<div class="spacer"></div>
					</td>
				</tr>               
				<tr>                
					<td class="td_border" colspan="7" valign="top" style="padding:0 !important;">
					<form action="" method="post" id="shipping_form">
						<table width="100%" class="shpooing_inner_table">
							<tr>
								<td width="40%">	
								
								<table> 
									<tr>                
										<td align="right">
											<div class="shopping_coupon"> <a href="shoppingbag.php">Edit</a></div>
										</td>
										<td style="text-align:left !important;"> 
											
										</td>									
									</tr>  									 
								</table> 
								</td>
								<td class="td0" width="1"></td>
								<td valign="top" align="right">
									<table class="total_table" width="65%">
										<tr>
											<td>Ordersubtotal : </td>
											<td class="bottom_border" width="40%">$<?php echo $_SESSION['amount'] = $sum;?></td>
										</tr>
										<tr>
											<td>Shipping : </td>
											<td class="bottom_border">$<?php echo $_SESSION['shipping']; ?></td>
										</tr>
										<tr>
											<td><b>Estimated Total : </b></td>
											<td><b>$<?php echo $_SESSION['amount']+$_SESSION['shipping']; ?></b></td>
										</tr>
									</table>
								</td>
								
							</tr>
							<tr>
								<td></td>
								<td class="td0"></td>
								<td style="float:right;">
									<input type="checkbox" id="terms" name="terms" class="validate[required]">
									I agree with all terms and conditions.
								</td>
							</tr>
							<tr>
								<td></td>
								<td class="td0"></td>
								<td style="float:right;">
								<input type="submit" id="Checkout" name="submit" class="btn" value="Checkout" >			
								</td>
							</tr>
						</table>
					</form>
					</td>
				</tr>
			</table> 
			</div> 
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>
