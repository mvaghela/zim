<?php include("system/config.inc.php");
include("function/measurement.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Measurement</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
				<ul>
					<li class="last"><a>Measurement</a></li>
				</ul>
			</div>
	</div>
</div>	
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
			<!--<div class="inner-title">
				<ul>
					<li class="last"><a>Customization</a></li>
				</ul>
			</div>-->
			<script type="text/javascript">
				$(document).ready(function() {
					$(".edit").fancybox();
				});
			</script>
			<div class="my-account-middle">
				<div class="my-account-menu">
                    	<ul>
                         	<li><a href="my_account.php">Account Detail</a></li>
                               <li><a href="wishlist.php">Wishlist</a></li>
                              <li><a href="customization.php">Customization</a></li>
							  <li class="active"><a href="measurement.php">Measurement</a></li>
							  <li><a href="orderhistory.php">Order History</a></li>
                         </ul>
                    </div>
                    <div class="customization">
					<h2>Measurements</h2>
					<div>&nbsp;</div>
                    <?php if(count($shirt_measurement)==0 && count($pant_measurement)==0 && count($blazer_measurement)==0){?>					
					<table class="order_table" width="100%">
                        <tr>
                            <th></th>                            
                    	</tr>
                        <tr>
                        	<td>
                            	<div class="login_title">
                                	<h2>You don't have any saved measurements</h2>
                                </div>
                            </td>
                        </tr>
                    </table>
					<?php 
					}
					else 
					{?>
                   <table class="order_table" width="100%">
                    <tr>
                    <th>Name</th>
					<th width="10%">Type</th>
                    <th width="20%">Last updated Date</th>
                    <th width="10%">View</th>
					<th width="10%">Remove </th>
                    </tr>
					<?php $c=0;?>
                    <?php for($i=0;$i<count($shirt_measurement);$i++){?>
                    <tr>
                    	<td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $shirt_measurement[$i]['measurement_name'];?></td>
                        <td <?php if($c!=0){?>class="order_table_td"<?php }?>>Shirt</td>
						 <td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $shirt_measurement[$i]['createdate'];?></td>
                         <td <?php if($c!=0){?>class="order_table_td"<?php }?>>
						 	<a href="editmeasurement.php?id=<?php echo $shirt_measurement[$i]['measurement_id'];?>&type=shirt" class="edit">View</a>
						 </td>
						 <td <?php if($c!=0){?>class="order_table_td"<?php }?>>
							<a href="measurement.php?id=<?php echo $shirt_measurement[$i]['measurement_id'];?>&type=shirt" OnClick="return confirm('Are you sure want to delete this Record?');" class="remove">Remove</a>								
						 </td>
                    </tr>
                    <?php $c++; }?>
					<?php for($i=0;$i<count($pant_measurement);$i++){?>
                    <tr>
                    	<td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $pant_measurement[$i]['measurement_name'];?></td>
                        <td <?php if($c!=0){?>class="order_table_td"<?php }?>>Pant</td>
						 <td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $pant_measurement[$i]['createdate'];?></td>
                         <td <?php if($c!=0){?>class="order_table_td"<?php }?>>
						 	<a href="editmeasurement.php?id=<?php echo $pant_measurement[$i]['measurement_id'];?>&type=pant" class="edit">View</a>
						 </td>
						 <td <?php if($c!=0){?>class="order_table_td"<?php }?>>
							<a href="measurement.php?id=<?php echo $pant_measurement[$i]['measurement_id'];?>&type=pant" OnClick="return confirm('Are you sure want to delete this Record?');" class="remove">Remove</a>						 	
						 </td>
                    </tr>
                    <?php $c++; }?>
					<?php for($i=0;$i<count($blazer_measurement);$i++){?>
                    <tr>
                    	<td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $blazer_measurement[$i]['measurement_name'];?></td>
                        <td <?php if($c!=0){?>class="order_table_td"<?php }?>>Suit</td>
						<td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $blazer_measurement[$i]['createdate'];?></td>
                        <td <?php if($c!=0){?>class="order_table_td"<?php }?>>
							<a href="editmeasurement.php?id=<?php echo $blazer_measurement[$i]['measurement_id'];?>&type=blazer" class="edit">View</a> 
						</td>
						 <td <?php if($c!=0){?>class="order_table_td"<?php }?>>
							<a href="measurement.php?id=<?php echo $blazer_measurement[$i]['measurement_id'];?>&type=blazer" OnClick="return confirm('Are you sure want to delete this Record?');" class="remove">Remove</a>
						</td>
                    </tr>
                    <?php $c++; }?>
                    </table>
                    <?php }?>
                    </div>
			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>