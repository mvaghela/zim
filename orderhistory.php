<?php include("system/config.inc.php");
//sELECT ALL THE ORDERS
$select_orders="SELECT *,DATE_FORMAT(`date`,'%M %d, %Y') AS createdate FROM `orderdetail` WHERE `orderdetail`.`userid`='".$_SESSION['userid']."'";
$order_res=$obj_db->select($select_orders);

//SELECT ITEM COUNT
$count_item="SELECT * FROM `cart_order` WHERE `orderid`='".$order_res[$i]['orderid']."'";
$item_res=$obj_db->select($count_item);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | OrderHistory</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
				<ul>
					<li class="first"><a>Order History</a></li>
				</ul>
			</div>
	</div>
</div>	
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
			<!--<div class="inner-title">
				<ul>
					<li class="last"><a>Order History</a></li>
				</ul>
			</div>-->
			<div class="my-account-middle">
				<div class="my-account-menu">
                    	<ul>
                         	<li><a href="my_account.php">Account Detail</a></li>
                               <li><a href="wishlist.php">Wishlist</a></li>
                              <li><a href="customization.php">Customization</a></li>
							  <li><a href="measurement.php">Measurement</a></li>
							  <li class="active"><a href="orderhistory.php">Order History</a></li>
                         </ul>
                    </div>
					<script type="text/javascript">
						$(document).ready(function(){
							$(".view").fancybox();
						});
					</script>
                    <div class="customization">
                    <?php if(count($order_res)==0){?>
					<table class="order_table" width="100%" cellpadding="10">
                        <tr>
                            <th></th>                            
                    	</tr>
                        <tr>
                        	<td>
                            	<div class="login_title">
                                	<h2>You don't have made any orders yet!</h2>
                                </div>
                            </td>
                        </tr>
                    </table>
					<?php 
					}
					else 
					{?>
						<?php for($i=0;$i<count($order_res);$i++){?>
						<table class="order_table" width="100%">
						<tr>
							<th colspan="3" align="left"><h2>Order Number : <?php echo $order_res[$i]['orderid'];?></h2></th>							
						</tr>
						<tr>
							<td align="left">
								<b>Order Status :</b> <br />
								<?php echo $order_res[$i]['status'];?>
							</td>
							<td align="left">
								<b>Date Ordered :</b> <br />
								<?php echo $order_res[$i]['createdate'];?>
							</td>
							<td align="left"><a href="vieworderdetail.php?id=<?php echo $order_res[$i]['orderid'];?>">Order Details</a></td>
						</tr>
						<tr>
							<td class="order_table_td" align="left">
								<b>Shipped to :</b> <br />
								<?php echo $order_res[$i]['shippingfirstname'];?>
							</td>
							<?php 
								//SELECT ITEM COUNT
								$count_item="SELECT * FROM `cartorder` WHERE `orderid`='".$order_res[$i]['orderid']."'";
								$item_res=$obj_db->select($count_item);
							?>
							<td class="order_table_td" align="left">
								<b>Items Ordered :</b> <br />
								<?php echo count($item_res);?>
							</td>
							<td class="order_table_td" align="left">
								<b>Order Total :</b> <br />
								$ <?php echo $order_res[$i]['paidamount'];?>
							</td>
						</tr>						
						</table>
						<div>&nbsp;</div>
						
						<?php }?>
					<?php }?>
                    </div>
			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>