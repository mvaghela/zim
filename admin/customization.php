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
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
			<div class="inner-title">
				<ul>
					<li class="last"><a>Customization</a></li>
				</ul>
			</div>
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
                    <div class="customization">
					<div>&nbsp;</div>
					<h2>Shirt Customization</h2>					
                    <?php if(count($shirt_customization)==0){?>
					<table class="heading-shoppingcart" width="100%">
                        <tr>
                            <th></th>                            
                    	</tr>
                        <tr>
                        	<td>
                            	<div class="login_title">
                                	<h2>You don't have any Customized Options for shirt</h2>
                                </div>
                            </td>
                        </tr>
                    </table>
					<?php 
					}
					else 
					{?>
                   <table class="heading-shoppingcart" width="100%">
                    <tr>
                    <th>Name</th>
					<th>View List</th>
                    <th width="18%">Date</th>
                    <th width="18%">Remove</th>
                    </tr>
                    <?php for($i=0;$i<count($shirt_customization);$i++){?>
                    <tr>
                    	<td class=""><?php echo $shirt_customization[$i]['customizename'];?></td>
						<td>View List</td>
                         <td><?php echo $shirt_customization[$i]['createdate'];?></td>
                         <td><a href="customization.php?id=<?php echo $shirt_customization[$i]['saveshirtcustomizeid'];?>" class="remove">Remove</a></td>
                    </tr>
                    <?php }?>                   
                    <tr>
						<td class="total" colspan="4">&nbsp;</td>
                    </tr>
                    </table>
                    <?php }?>
					
					<div>&nbsp;</div>
					<h2>Pant Customization</h2>					
                    <?php if(count($pant_costomization)==0){?>
					<table class="heading-shoppingcart" width="100%">
                        <tr>
                            <th></th>                            
                    	</tr>
                        <tr>
                        	<td>
                            	<div class="login_title">
                                	<h2>You don't have any Customized Options for pant</h2>
                                </div>
                            </td>
                        </tr>
                    </table>
					<?php 
					}
					else 
					{?>
                   <table class="heading-shoppingcart" width="100%">
                    <tr>
                    <th>Name</th>
					<th>View List</th>
                    <th width="18%">Date</th>
                    <th width="18%">Remove</th>
                    </tr>
                    <?php for($i=0;$i<count($pant_costomization);$i++){?>
                    <tr>
                    	<td class=""><?php echo $pant_costomization[$i]['customizename'];?></td>
						<td>View List</td>
                         <td><?php echo $pant_costomization[$i]['createdate'];?></td>
                         <td><a href="customization.php?id=<?php echo $pant_costomization[$i]['savepantcustomizeid'];?>" class="remove">Remove</a></td>
                    </tr>
                    <?php }?>                   
                    <tr>
						<td class="total" colspan="4">&nbsp;</td>
                    </tr>
                    </table>
                    <?php }?>
					
					<div>&nbsp;</div>
					<h2>Blazer Customization</h2>
					<?php if(count($blazer_customization)==0){?>
					<table class="heading-shoppingcart" width="100%">
                        <tr>
                            <th></th>                            
                    	</tr>
                        <tr>
                        	<td>
                            	<div class="login_title">
                                	<h2>You don't have any Customized Options blazer</h2>
                                </div>
                            </td>
                        </tr>
                    </table>
					<?php 
					}
					else 
					{?>
                   <table class="heading-shoppingcart" width="100%">
                    <tr>
                    <th>Name</th>
					<th>View List</th>
                    <th width="18%">Date</th>
                    <th width="18%">Remove</th>
                    </tr>
                    <?php for($i=0;$i<count($blazer_customization);$i++){?>
                    <tr>
                    	<td class=""><?php echo $blazer_customization[$i]['customizename'];?></td>
						<td>View List</td>
                         <td><?php echo $blazer_customization[$i]['createdate'];?></td>
                         <td><a href="customization.php?id=<?php echo $blazer_customization[$i]['saveblazercustomizeid'];?>" class="remove">Remove</a></td>
                    </tr>
                    <?php }?>                   
                    <tr>
						<td class="total" colspan="4">&nbsp;</td>
                    </tr>
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