<?php include("system/config.inc.php");
include("function/wishlist.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Wishlist</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
				<ul>
					<li class="first"><a>Wishlist</a></li>
				</ul>
			</div>
	</div>
</div>	
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
			<!--<div class="inner-title">
				<ul>
					<li class="last"><a>Wishlist</a></li>
				</ul>
			</div>-->
			<div class="my-account-middle">
				<div class="my-account-menu">
                    <ul>
                        <li><a href="my_account.php">Account Detail</a></li>
                           <li class="active"><a href="wishlist.php">Wishlist</a></li>
                          <li><a href="customization.php">Customization</a></li>
						  <li><a href="measurement.php">Measurement</a></li>
						  <li><a href="orderhistory.php">Order History</a></li>
                     </ul>
                </div>
                <div id="ajax_specs" class="wishlistdiv">
                    <ul class="all-fabric">
                    	<?php for($i=0;$i<count($wishlist_result);$i++){?>
                        <li id="<?php echo $i;?>" class="pname">
                            <span class="fabric-image">
                            <a href="viewfabric.php?id=<?php echo $wishlist_result[$i]['productid'];?>"><img alt="<?php echo $wishlist_result[$i]['productname'];?>" src="admin/upload/image/thumb/<?php echo $wishlist_result[$i]['image'];?>"></a>
                            </span>
                            <a id="<?php echo $i;?>" class="pname" href="#">
                            <h3><?php echo $wishlist_result[$i]['productname'];?></h3>
                            </a>
                            <a class="fabric-price" href="viewfabric.php?id=<?php echo $wishlist_result[$i]['productid'];?>">
                            <span class="WebRupee">$ <?php echo $wishlist_result[$i]['price'];?></span>                            
                            </a>
                            <a class="fabric-image-hover" href="viewfabric.php?id=<?php echo $wishlist_result[$i]['productid'];?>">&nbsp;</a>
                        </li>
                        <?php }?>
                        <!--<li id="3" class="pname">
                            <span class="fabric-image">
                            <img alt="Gondomar, white" src="admin/upload/image/thumb/50e58a8fa1b13.jpg">
                            </span>
                            <a id="2" class="pname" href="#">
                            <h3>Gondomar, white</h3>
                            </a>
                            <a class="fabric-price" href="viewfabric.php?id=2">
                            <span class="WebRupee">$ 50</span>
                            
                            </a>
                            <a class="fabric-image-hover" href="viewfabric.php?id=2"> </a>
                        </li>
                        <li id="3" class="pname">
                            <span class="fabric-image">
                            <img alt="Gondomar, white" src="admin/upload/image/thumb/50e58a8fa1b13.jpg">
                            </span>
                            <a id="2" class="pname" href="#">
                            <h3>Gondomar, white</h3>
                            </a>
                            <a class="fabric-price" href="viewfabric.php?id=2">
                            <span class="WebRupee">$ 50</span>
                            
                            </a>
                            <a class="fabric-image-hover" href="viewfabric.php?id=2"> </a>
                        </li>-->
                     </ul>	
                </div>
                <script type="text/javascript">
					$(document).ready(function() {
						$(".fabric-name").fancybox();
					});
					$(document).ready(function() {
						$(".fabric-image-hover").fancybox();
					});
					$(document).ready(function() {
						$(".fabric-price").fancybox();
					});
				</script>
			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>