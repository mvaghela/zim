<?php
include("system/config.inc.php");

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
if($result){
?>
<center><div class="loading" id="loading"></div></center>

<table class="shopping_table" width="100%">
	<tr>
		<th colspan="2">Product</th>
		<th width="20px" colspan="2">Quantity</th>
		<th width="20px">Add Measurement</th>
		<th width="65px">Price</th>
		<th width="60px">Grand Total</th>
	</tr>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#proceed_checkout_button").click(function(){
																
				if(<?php for($i=0;$i<count($result);$i++) { ?>$("#measurement<?php echo $i?>").val()==''<?php if((count($result)-1)!=$i){?> || <?php }?><?php }?>)
				
				{
					alert("Please select measurement");
					return (false);	
				}
				
			});
		});
	</script>
	<?php
		$sum=0;
		$qtycount=0;
		for($i=0;$i<count($result);$i++) { 
		$sum+=($result[$i]['cartprice'])*$result[$i]['qty'];
		$qtycount+=$result[$i]['qty']; 
		
		if($result[$i]['producttypeid']=='3'){
			$select_measurement="SELECT * FROM `shirt_measurements` WHERE `user_id`='$user'";						
		}
		if($result[$i]['producttypeid']=='5'){
			$select_measurement="SELECT * FROM `pant_measurements` WHERE `user_id`='$user'";						
		}
		if($result[$i]['producttypeid']=='6'){
			$select_measurement="SELECT * FROM `blazer_measurements` WHERE `user_id`='$user'";						
		}
		$measurement=$obj_db->select($select_measurement);
	?>
	<script type="text/javascript">
   
					$(function() {
					
					  $('#qty<?php echo $i;?>').change(function() {
						
						
						var cartid = $("#cartid<?php echo $i;?>").val();
						var qty = $("#qty<?php echo $i;?>").val();
						var dataString = 'cartid=' + cartid + '&qty=' + qty;
						
					
						$.ajax({
						  type: "POST",
						  url: "updatecart.php",
						  data: dataString,
						  success: function() {
								   $.ajaxSetup(
									{
										cache: false,
										beforeSend: function() {
											$('#contentcart').hide();
											$('#loading').html('<img src="images/loading1.gif">');
											$('#loading').show();
										},
										complete: function() {
											//$('#loading').hide();
											$('#contentcart').show();
										},
										success: function() {
											//$('#loading').html('<img src="images/loading1.gif">');
											$('#loading').fadeOut(300);
											$('#contentcart').show();
											//$('#loading').hide();
										}
									});
						
							var $container = $("#contentcart");
							$container.load("shoppingbagrefresh.php");
						 
							}
						 });
						return false;
						});
					});
					$(function() {
					
					 $('#measurement<?php echo $i?>').change(function() {
						 
						var measure_id = $(this).val();
						var type = $("#measuretype<?php echo $i?>").val();
						var product_id = <?php echo $result[$i]['productid'];?>;
						
						if(measure_id=='addnew'){
							 window.location = type+'_measurement.php';
						 }						
						var dataString = 'id=' + measure_id + '&type=' + type + '&productid=' + product_id ;
						
						$.ajax({
						  type: "POST",
						  url: "updatesession.php",
						  data: dataString,
						  success: function(data){							 	
							  	   $.ajaxSetup(
									{
										cache: false,
										beforeSend: function() {
											$('#contentcart').hide();
											$('#loading').html('<img src="images/loading1.gif">');
											$('#loading').show();
										},
										complete: function() {
											//$('#loading').hide();
											$('#contentcart').show();
										},
										success: function() {
											//$('#loading').html('<img src="images/loading1.gif">');
											$('#loading').fadeOut(300);
											$('#contentcart').show();
											//$('#loading').hide();
										}
									});
						
							var $container = $("#contentcart");
							$container.load("shoppingbagrefresh.php");
						 
							}
						 });
						return false;
						});
					});
					$(function() {
					
					  $('#remove<?php echo $i?>').click(function() {
						if(confirm('Are you sure want to delete this item?'))
						{
								var items = $("#removeitem<?php echo $i?>").val();
								var dataString = 'removeitem=' + items;
								
								$.ajax({
								  type: "POST",
								  url: "removeitem.php",
								  data: dataString,
								  success: function(data){
										    $.ajaxSetup(
									{
										cache: false,
										beforeSend: function() {
											$('#contentcart').hide();
											$('#loading').html('<img src="images/loading1.gif">');
											$('#loading').show();
										},
										complete: function() {
											//$('#loading').hide();
											$('#contentcart').show();
										},
										success: function() {
											//$('#loading').html('<img src="images/loading1.gif">');
											$('#loading').fadeOut(300);
											$('#contentcart').show();
											//$('#loading').hide();
										}
									});
								
									var $container = $("#contentcart");
									$container.load("shoppingbagrefresh.php");						 
									}
								 });
							return false;
						}
						});
					});
					</script>
	<tr>
					<td><img src="admin/upload/image/medthumb/<?php echo $result[$i]['image']; ?>"></td>
					<td><?php echo $result[$i]['productname']; ?></td>					
					<td>
					<input type="hidden" name="cartid" id="cartid<?php echo $i;?>" value="<?php echo $result[$i]['cartid']; ?>" />
         			<input type="text" class="textinput" style="width:50px; " value="<?php echo $result[$i]['qty']; ?>" id="qty<?php echo $i;?>" name="qty<?php echo $i;?>">
					</td>
					<td>
                    	<a id="remove<?php echo $i;?>" href="#" title="Remove Cart"><img src="images/delete.png" /> Remove</a>
                    	<input type="hidden" id="removeitem<?php echo $i;?>" value="<?php echo $result[$i]['cartid'];?>" />
                    </td>
					<td>
                    	<?php if($result[$i]['producttypeid']=='3'){?>
                        	
                            <select name="measurement" id="measurement<?php echo $i?>" style="float:none;">
                            	<option value=""></option>
                                <?php for($j=0;$j<count($measurement);$j++){?>
                                <option <?php if($_SESSION['measurementid'][$result[$i]['measurement_type']][$result[$i]['productid']]==$measurement[$j]['measurement_id']){ ?> selected="selected" <?php }?> value="<?php echo $measurement[$j]['measurement_id'];?>"><?php echo $measurement[$j]['measurement_name']; ?></option>
                                <?php }?>
                                <option value="addnew">Add New</option>
                            </select>
                        	<input type="hidden" id="measuretype<?php echo $i;?>" value="shirt" />
                        <?php }?>
                        <?php if($result[$i]['producttypeid']=='5'){?>
                        
                            <select name="measurement" id="measurement<?php echo $i?>" style="float:none;">
                            	<option value=""></option>
                                <?php for($j=0;$j<count($measurement);$j++){?>
                                <option <?php if($_SESSION['measurementid'][$result[$i]['measurement_type']][$result[$i]['productid']]==$measurement[$j]['measurement_id']){ ?> selected="selected" <?php }?> value="<?php echo $measurement[$j]['measurement_id'];?>"><?php echo $measurement[$j]['measurement_name']; ?></option>
                                <?php }?>
                                <option value="addnew">Add New</option>
                            </select>
                        	<input type="hidden" id="measuretype<?php echo $i;?>" value="pant" />
                        <?php }?>
                        <?php if($result[$i]['producttypeid']=='6'){?>                        
                           <select name="measurement" id="measurement<?php echo $i?>" style="float:none;">
                           		<option value=""></option>
                                <?php for($j=0;$j<count($measurement);$j++){?>
                                <option <?php if($_SESSION['measurementid'][$result[$i]['measurement_type']][$result[$i]['productid']]==$measurement[$j]['measurement_id']){ ?> selected="selected" <?php }?> value="<?php echo $measurement[$j]['measurement_id'];?>"><?php echo $measurement[$j]['measurement_name']; ?></option>
                                <?php }?>
                                <option value="addnew">Add New</option>
                            </select>
                        	<input type="hidden" id="measuretype<?php echo $i;?>" value="blazer" />
                        <?php }?>
                    </td>
					<td>$ <?php echo ($result[$i]['cartprice']); ?></td>
					<td>$ <?php echo (($result[$i]['cartprice'])*$result[$i]['qty']); ?></td>
				</tr>
	<?php } ?>
	<tr>
		<td colspan="7">
			<div class="spacer"></div>
		</td>
	</tr>
	<tr>                
		<td class="td_border" colspan="7" valign="top" style="padding:0 !important;">
			<table width="100%" class="shpooing_inner_table">
				<tr>
					<td width="60%">	
					<?php if($_SESSION['coupon']['coupon_status']==''){?>
					<table> 
						<tr>                
							<td align="right">
								<div class="shopping_coupon">Coupon Code : </div>
							</td>
							<td style="text-align:left !important;"> 
								<form action="" method="post">
									<input type="text" name="coupon_code" id="couponcode" placeholder="Enter Coupon Code here" style="width:200px;" class="login_text"/>
									<input type="submit" class="btn" value="Apply" name="coupon" id="usecoupon"/><br />	
									<label id="message" style="color:#EA1F09;">
										<?php 
										if($_REQUEST['msg']=='notexist'){
											echo "Sorry! This coupon code does not exist.";
										}
										if($_REQUEST['msg']=='used'){
											echo "Sorry! This coupon code is already used.";
										}
										?>
										&nbsp;
									</label>									
								</form>
							</td>									
						</tr>  									 
					</table> 
					<?php }?>
					<?php if($_SESSION['coupon']['coupon_status']!=''){?>
					<table> 
						<tr>                
							<td align="right">
								Coupon Code :
							</td>
							<td style="text-align:left !important;">											
								<div class="used">Coupon Used.</div>
							</td>									
						</tr>  									 
					</table> 
					<?php }?>
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
								<td class="bottom_border"><?php if($_SESSION['amount']>$adminres[0]['shippingrange']) { echo $_SESSION['shipping']=0; } else { echo $_SESSION['shipping']=$adminres[0]['shippingamount']; }?></td>
								
							</tr>
							<?php if($_SESSION['coupon']['coupon_status']=='used'){?>
							<?php 
								$new_total=($sum-$_SESSION['coupon']['coupon_value']);
								$_SESSION['discount'] = max($new_total,0);
							?>
							<tr>
								<td>Discount : </td>
								<td>$<?php echo $_SESSION['coupon']['coupon_value']; ?></td>
							</tr>
							<tr>
								<td><b>Estimated Total : </b></td>
								<td><b>$<?php echo $_SESSION['discount']+$_SESSION['shipping']; ?></b></td>
							</tr>
							<?php }else{?>
							<tr>
								<td><b>Estimated Total : </b></td>
								<td><b>$<?php echo $_SESSION['amount']+$_SESSION['shipping'];?></b></td>
							</tr>
							<?php }?>
						</table>
					</td>
				</tr>
				<tr>
					<td><table><tr><td><a href="shirt.php"><img src="images/leftarrow.png" /> continue shopping</a></td></tr></table></td>
					<td class="td0"></td>
					<td><a href="<?php if($_SESSION['userid']!=''){ echo "shipping.php"; } else { echo "account_settings.php";}?>" class="btn" id="proceed_checkout_button" style="float:right">Proceed To Checkout</a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<script type="text/javascript">
	$(function() {
	  $('#usecoupon').click(function() {					
		var value = $("#couponcode").val();
		if(value=='')
		{
			$("#message").html("Please Enter Coupon Code");
			return (false);
		}					
	});
	});
</script>
<?php }else {?>
<table width="100%">
	<tr>
		<td colspan="3"><center>
				<div class="login_title">
					<h1>YOUR SHOPPING BAG IS EMPTY!!</h1>
				</div>
			</center></td>
	</tr>
	<tr>
		<td colspan="3"><center>
				<a href="shirt.php" class="btn" >Continue Shoping</a>
			</center></td>
	</tr>
</table>
<?php }?>
