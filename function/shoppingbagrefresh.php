<?php
include("system/config.inc.php");

$sql="SELECT * FROM `cart` 
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
<table class="heading-shoppingcart" width="100%">
	<tr>
		<th width="100px">Product Image</th>
		<th width="110px">Name</th>
		<th width="65px">Price</th>
		<th width="20px">Quantity</th>
		<th width="20px">Add Measurement</th>
		<th width="60px">Grand Total</th>
		<th width="50px">Remove</th>
	</tr>
	<?php
		$sum=0;
		$qtycount=0;
		for($i=0;$i<count($result);$i++) { 
		$sum+=$result[$i]['price']*$result[$i]['qty'];
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
											$('#loading').show();
										},
										complete: function() {
											$('#loading').hide();
											$('#contentcart').show();
										},
										success: function() {
											$('#loading').hide();
											$('#contentcart').show();
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
											$('#loading').show();
										},
										complete: function() {
											$('#loading').hide();
											$('#contentcart').show();
										},
										success: function() {
											$('#loading').hide();
											$('#contentcart').show();
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
											$('#loading').show();
										},
										complete: function() {
											$('#loading').hide();
											$('#contentcart').show();
										},
										success: function() {
											$('#loading').hide();
											$('#contentcart').show();
										}
									});
						
							var $container = $("#contentcart");
							$container.load("shoppingbagrefresh.php");						 
							}
						 });
						return false;
						});
					});
					</script>
	<tr>
		<td><img src="admin/upload/image/medthumb/<?php echo $result[$i]['image']; ?>"></td>
		<td><?php echo $result[$i]['productname']; ?></td>
		<td>$ <?php echo $result[$i]['price']; ?></td>
		<td>
			<input type="hidden" name="cartid" id="cartid<?php echo $i;?>" value="<?php echo $result[$i]['cartid']; ?>" />
			<input type="text" class="textinput" style="width:50px; " value="<?php echo $result[$i]['qty']; ?>" id="qty<?php echo $i;?>" name="qty<?php echo $i;?>">
		</td>
		<td>
        	<?php if($result[$i]['producttypeid']=='3'){?>
                        
                <select name="measurement" id="measurement<?php echo $i?>" style="float:none;">
					<?php for($j=0;$j<count($measurement);$j++){?>
                    <option <?php if($_SESSION['measurementid'][$result[$i]['productid']]==$measurement[$j]['measurement_id']){ ?> selected="selected" <?php }?> value="<?php echo $measurement[$j]['measurement_id'];?>"><?php echo $measurement[$j]['measurement_name']; ?></option>
                    <?php }?>
                    <option value="addnew">Add New</option>
                </select>
                <input type="hidden" id="measuretype<?php echo $i;?>" value="shirt" />
            <?php }?>
            <?php if($result[$i]['producttypeid']=='5'){?>
            
                <select name="measurement" id="measurement<?php echo $i?>" style="float:none;">
					<?php for($j=0;$j<count($measurement);$j++){?>
                    <option <?php if($_SESSION['measurementid'][$result[$i]['productid']]==$measurement[$j]['measurement_id']){ ?> selected="selected" <?php }?> value="<?php echo $measurement[$j]['measurement_id'];?>"><?php echo $measurement[$j]['measurement_name']; ?></option>
                    <?php }?>
                    <option value="addnew">Add New</option>
                </select>
                <input type="hidden" id="measuretype<?php echo $i;?>" value="pant" />
            <?php }?>
            <?php if($result[$i]['producttypeid']=='6'){?>
            
                <select name="measurement" id="measurement<?php echo $i?>" style="float:none;">
					<?php for($j=0;$j<count($measurement);$j++){?>
                    <option <?php if($_SESSION['measurementid'][$result[$i]['productid']]==$measurement[$j]['measurement_id']){ ?> selected="selected" <?php }?> value="<?php echo $measurement[$j]['measurement_id'];?>"><?php echo $measurement[$j]['measurement_name']; ?></option>
                    <?php }?>
                    <option value="addnew">Add New</option>
                </select>
                <input type="hidden" id="measuretype<?php echo $i;?>" value="blazer" />
            <?php }?>
        </td>
		<td>$ <?php echo ($result[$i]['price']*$result[$i]['qty']); ?></td>
		<td>
        	<a id="remove<?php echo $i;?>" href="#" OnClick="return confirm('Are you sure want to delete this Record?');" title="Remove Cart">Remove</a>
            <input type="hidden" id="removeitem<?php echo $i;?>" value="<?php echo $result[$i]['cartid'];?>" />
        </td>
	</tr>
	<?php } ?>
	<tr>
		<td class="total" colspan="3" align="right">
			<div class="total-price"> Total : </div>
		</td>
		<td class="total" align="center">
			<div class="total-qty"> <?php echo $qtycount; ?> </div>
		</td>
		<td class="total"></td>
		<td class="total">
			<div class="total-price"> <span class="WebRupee">$ </span> <?php echo $sum; ?> </div>
		</td>
		<td class="total"></td>
	</tr>
</table>
<table class="shoppingbutton" style="float:right;">
	<tr>
		<td colspan="2"> <a href="shirt.php" class="btn" >Continue Shoping</a> </td>
		<td colspan="3"> <a href="index.php" class="btn" >Proceed To Checkout</a> </td>
	</tr>
</table>
<?php }else {?>
<table width="100%">
				<tr>
					<td colspan="3">
						<center><div class="login_title">
							<h1>YOUR SHOPPING BAG IS EMPTY!!</h1>
						</div></center>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<center>
							<a href="shirt.php" class="btn" >Continue Shoping</a>
						</center>
					</td>
				</tr>
			</table>
<?php }?>