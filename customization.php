<?php include("system/config.inc.php");
include("function/customization.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Customization</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
				<ul>
					<li class="last"><a>Customization</a></li>
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
			<div class="my-account-middle">
				<div class="my-account-menu">
                    	<ul>
                         	<li><a href="my_account.php">Account Detail</a></li>
                               <li><a href="wishlist.php">Wishlist</a></li>
                              <li class="active"><a href="customization.php">Customization</a></li>
							  <li><a href="measurement.php">Measurement</a></li>
							  <li><a href="orderhistory.php">Order History</a></li>
                         </ul>
                    </div>
					<script type="text/javascript">
				$(document).ready(function() {
					$(".edit").fancybox();
				});
			</script>
                    <div class="customization">
					<h2>Customization</h2>					
					<div>&nbsp;</div>
                    <?php if(count($shirt_customization)==0 && count($pant_costomization)==0 && count($blazer_customization)==0){?>
					<table class="order_table" width="100%">
                        <tr>
                            <th></th>                            
                    	</tr>
                        <tr>
                        	<td>
                            	<div class="login_title">
                                	<h2>You don't have any Customized Options.</h2>
                                </div>
                            </td>
                        </tr>
                    </table>
					<?php 
					}
					else 
					{?>
                   <table class="order_table" width="100%" align="left">
                    <tr>
                    <th>Name</th>
					<th width="10%">Type</th>					
                    <th width="20%">Last Updated date</th>
                    <th width="10%">View</th>
					<th width="10%">Remove</th>
                    </tr>
					<?php $c=0;?>
                    <?php for($i=0;$i<count($shirt_customization);$i++){?>
                    <tr>
                    	<td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $shirt_customization[$i]['customizename'];?></td>
						 <td <?php if($c!=0){?>class="order_table_td"<?php }?>>Shirt</td>
						 <td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $shirt_customization[$i]['createdate'];?></td>
                         <td <?php if($c!=0){?>class="order_table_td"<?php }?>>
						 	<a href="editcustomization.php?productid=<?php echo $shirt_customization[$i]['productid'];?>&type=shirt" class="edit" >View</a>
						</td>
						<td <?php if($c!=0){?>class="order_table_td"<?php }?>>
							<a href="customization.php?id=<?php echo $shirt_customization[$i]['saveshirtcustomizeid'];?>&type=shirt" OnClick="return confirm('Are you sure want to delete this Record?');"  class="remove">Remove</a>							
						 </td>
                    </tr>
                    <?php $c++; }?>
                    <?php for($i=0;$i<count($pant_costomization);$i++){?>
                    <tr>
                    	<td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $pant_costomization[$i]['customizename'];?></td>
						 <td <?php if($c!=0){?>class="order_table_td"<?php }?>>Pant</td>
						 <td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $pant_costomization[$i]['createdate'];?></td>
                         <td <?php if($c!=0){?>class="order_table_td"<?php }?>>
						 	<a href="editcustomization.php?productid=<?php echo $pant_costomization[$i]['productid'];?>&type=pant" class="edit" >View</a>
						</td>
						<td <?php if($c!=0){?>class="order_table_td"<?php }?>>
							<a href="customization.php?id=<?php echo $pant_costomization[$i]['savepantcustomizeid'];?>&type=pant" OnClick="return confirm('Are you sure want to delete this Record?');" class="remove">Remove</a>						 
						 </td>
                    </tr>
                    <?php $c++; }?>                   
                    <?php for($i=0;$i<count($blazer_customization);$i++){?>
                    <tr>
                    	<td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $blazer_customization[$i]['customizename'];?></td>
						<td <?php if($c!=0){?>class="order_table_td"<?php }?>>Suit</td>
						 <td <?php if($c!=0){?>class="order_table_td"<?php }?>><?php echo $blazer_customization[$i]['createdate'];?></td>
                         <td <?php if($c!=0){?>class="order_table_td"<?php }?>>
						 	<a href="editcustomization.php?productid=<?php echo $blazer_customization[$i]['productid'];?>&type=suit" class="edit" >View</a>
						</td>
						<td <?php if($c!=0){?>class="order_table_td"<?php }?>> 
						 	<a href="customization.php?id=<?php echo $blazer_customization[$i]['savesuitcustomizeid'];?>" OnClick="return confirm('Are you sure want to delete this Record?');" class="remove">Remove</a>
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