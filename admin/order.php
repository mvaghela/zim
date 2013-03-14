<?php
include("system/config.inc.php");
include("system/paging.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
}
  $for="Orders";
  $title=" Manage Orders";
  $title2="Orders";
  $txt="Orders";
  $disname="Orders";
//include("function/order.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Orders | <?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body>
<?php include("include/header.php");?>
    <link media="screen" rel="stylesheet" href="css/colorbox.css" />
    <script src="js/jquery.colorbox-min.js"></script>
    <?php if(isset($_REQUEST['id'])) { 
				  $user_sql="SELECT * FROM `orderdetail` WHERE `orderid`='".$_REQUEST['id']."'";
				  $user_res=$obj_db->select($user_sql);
				  
	$adminsql="SELECT * FROM `admin`";
	$adminres=$obj_db->select($adminsql);

				  ?>
    <div class="block">
      <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        <h2>Add/Edit <?php echo $title2; ?></h2>
        <ul>
          <li><a href="order.php<?php echo $condition2; ?>">Back to listing</a></li>
        </ul>
      </div>
      <!-- .block_head ends -->
      
      <div class="block_content">
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"  />
          <input type="hidden" name="oldstatus" value="<?php echo $user_res[0]['status']; ?>"  />
          <table style="margin:25px;" cellpadding="5">
            <tr>
              <td>Shipping Name</td>
              <td>:</td>
              <td><?php echo $user_res[0]['shippingfirstname'] ?> <?php echo $user_res[0]['shippinglastname'] ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td><?php echo $user_res[0]['email'] ?></td>
            </tr>
            <tr>
              <td>Address</td>
              <td>:</td>
              <td><?php echo $user_res[0]['address'] ?></td>
            </tr>
             <tr>
              <td>Address 2</td>
              <td>:</td>
              <td><?php echo $user_res[0]['address2'] ?></td>
            </tr>
            <tr>
              <td>City</td>
              <td>:</td>
              <td><?php echo $user_res[0]['shippingcity'] ?></td>
            </tr>
            <tr>
              <td>State</td>
              <td>:</td>
              <td><?php echo $user_res[0]['shippingstate'] ?></td>
            </tr>
            <tr>
              <td>Country</td>
              <td>:</td>
              <td><?php echo $user_res[0]['shippingcountry'] ?></td>
            </tr>
            <tr>
              <td>Postal Code</td>
              <td>:</td>
              <td><?php echo $user_res[0]['postcode'] ?></td>
            </tr>
            <tr>
              <td>Gender </td>
              <td>:</td>
              <td><?php echo ucfirst($user_res[0]['gender']); ?></td>
            </tr>
            <!--<tr>
              <td>Ammount Paid</td>
              <td>:</td>
              <td><?php echo $user_res[0]['paidamount'] ?></td>
            </tr>
            <tr>
              <td>Payment Status</td>
              <td>:</td>
              <td><?php echo ucfirst($user_res[0]['status']); ?></td>
            </tr>-->
          </table>
          <hr />
          <?php
		  	//Select order history
		  	$select_orders="SELECT * FROM `cartorder` 
							LEFT OUTER JOIN `product`
							ON `product`.`productid`=`cartorder`.`productid`
							WHERE `cartorder`.`orderid`='".$_REQUEST['id']."'";
			$product_res=$obj_db->select($select_orders);
		  	
			//Check if coupon used
			$select_coupon="SELECT * FROM `coupon` WHERE `coupon_order_id`='".$_REQUEST['id']."'";
			$coupon_res=$obj_db->select($select_coupon);
		  ?>
		  <table width="100%;">
          	<tr>
            	<td colspan="6"><h2>Order Details</h2></td>
            </tr>
            <tr>
                <th class="gridheaderbg" width="100px">Product Image</th>
                <th class="gridheaderbg" >Name</th>
                <th class="gridheaderbg"  width="65px">Price</th>
                <th class="gridheaderbg"  width="20px">Quantity</th>
                <th class="gridheaderbg"  width="100px">Measurement</th>
                <th class="gridheaderbg"  width="100px">Customization</th>
                <th class="gridheaderbg"  width="90px">Grand Total</th>               				
            </tr>
            <?php
				$sum=0;
				$qtycount=0;
				for($i=0;$i<count($product_res);$i++) { 
				//$sum+=$product_res[$i]['price']*$product_res[$i]['qty'];
				$qtycount+=$product_res[$i]['qty']; 
				
				if($product_res[$i]['producttypeid']=='3'){
					$select_measurement="SELECT * FROM `shirt_measurements` WHERE `measurement_id`='".$product_res[$i]['measurement_id']."'";
					$select_customization="SELECT * FROM `saveshirtcustomize` WHERE `saveshirtcustomizeid`=".$product_res[$i]['saveshirtcustomizeid']."";
				}
				if($product_res[$i]['producttypeid']=='5'){
					$select_measurement="SELECT * FROM `pant_measurements` WHERE `measurement_id`='".$product_res[$i]['measurement_id']."'";
					$select_customization="SELECT * FROM `savepantcustomize` WHERE `savepantcustomizeid`=".$product_res[$i]['saveshirtcustomizeid']."";
				}
				if($product_res[$i]['producttypeid']=='6'){
					$select_measurement="SELECT * FROM `blazer_measurements` WHERE `measurement_id`='".$product_res[$i]['measurement_id']."'";
					$select_customization="SELECT * FROM `savesuitcustomize` WHERE `savesuitcustomizeid`=".$product_res[$i]['saveshirtcustomizeid']."";
				}
				$measurement=$obj_db->select($select_measurement);
				$customization=$obj_db->select($select_customization);
				$sum+=$customization[0]['monogramprice']*$product_res[$i]['qty'];
			?>
            <tr>
                <td><img src="upload/image/medthumb/<?php echo $product_res[$i]['image']; ?>"></td>
                <td><?php echo $product_res[$i]['productname']; ?></td>
                <td>$ <?php echo $customization[0]['monogramprice']; ?></td>
                <td>					
                    <?php echo $product_res[$i]['qty']; ?>
                </td>
                <td>
                    <a href="measurement_sample.php?orderid=<?php echo $_REQUEST['id'];?>&id=<?php echo $measurement[0]['measurement_id']; ?>&type=<?php echo $product_res[$i]['measurement_type']; ?>"><?php echo $measurement[0]['measurement_name']; ?></a>                        
                </td>
                <td>
                    <a href="customization_sample.php?orderid=<?php echo $_REQUEST['id'];?>&id=<?php echo $product_res[$i]['saveshirtcustomizeid']; ?>&type=<?php echo $product_res[$i]['measurement_type']; ?>&productid=<?php echo $product_res[$i]['productid']; ?>"><?php echo $customization[0]['customizename']; ?></a>
                </td>
                <td>$ <?php echo ceil($customization[0]['monogramprice']*$product_res[$i]['qty']); ?></td>					
            </tr>
            <?php } ?>
            <tr>
                <td class="total" style="border-top:1px solid #999999;"></td>
				 <td class="total" style="border-top:1px solid #999999;"></td>
                <td class="total" style="border-top:1px solid #999999;"></td>
                <td class="total" align="center" style="border-top:1px solid #999999;">
                    <div class="total-qty"> <?php echo $qtycount; ?> </div>
                </td>
                <td class="total" style="border-top:1px solid #999999;"></td>
                <td class="total" align="right" style="border-top:1px solid #999999;">
                    <div class="total-price"> SubTotal : </div>
                </td>

                <td class="total" style="border-top:1px solid #999999;">
                    <div class="total-price"> <span class="WebRupee">$ </span> <?php echo $sum; ?> </div>
                </td>
                <td class="total"></td>
            </tr>
			
			<tr>
			    <td class="total" ></td>
				 <td class="total"></td>
                <td class="total" ></td>

                <td class="total"></td>
                <td class="total"></td>
                <td class="total" align="right" >
                    <div class="total-price"> Shipping : </div>
                </td>
				<?php if($sum>$adminres[0]['shippingrange']) {  $_SESSION['shipping']=0; } else {  $_SESSION['shipping']=$adminres[0]['shippingamount']; }?>
                <td class="total">
                    <div class="total-price"> <span class="WebRupee">$ </span> <?php echo $_SESSION['shipping']; ?> </div>
                </td>
                <td class="total"></td>
            </tr>
			
			<tr>
			    <td class="total" ></td>
				 <td class="total"></td>
                <td class="total" ></td>

                <td class="total"></td>
                <td class="total"></td>
			<td class="total"  align="right" >
                    <div class="total-price"> Tax : </div>
                </td>
				
                <td class="total">
                    <div class="total-price"> <span class="WebRupee">$ </span> <?php echo ($user_res[0]['paidamount']-($sum+$_SESSION['shipping'])); ?> </div>
                </td>
                <td class="total"></td>
            </tr>
			
			<tr>
			    <td class="total" ></td>
				 <td class="total"></td>
                <td class="total" ></td>

                <td class="total"></td>
                <td class="total"></td>
				 <td class="total" align="right" >
                    <div class="total-price"> Total : </div>
                </td>

                <td class="total">
                    <div class="total-price"> <span class="WebRupee">$ </span> <?php echo $user_res[0]['paidamount']; ?> </div>
                </td>
                <td class="total"></td>
            </tr>
			<?php if(count($coupon_res)!=0){?>
			<tr>
                <td class="total" colspan="3" align="right">                    
                </td>
                <td class="total" align="center">
                    <div class="total-qty"></div>
                </td>
                <td class="total"></td>
                <td class="total">Discount</td>
                <td class="total">
                    <div class="total-price"> <span class="WebRupee">$ </span> <?php echo $coupon_res[0]['coupon_value']; ?> </div>
                </td>
                <td class="total"></td>
            </tr>
			<tr>
                <td class="total" colspan="3" align="right" style="border-top:1px solid #999999;">
                    <div class="total-price">New Total : </div>
                </td>
                <td class="total" align="center" style="border-top:1px solid #999999;">
                    <div class="total-qty"> <?php echo $qtycount; ?> </div>
                </td>
                <td class="total" style="border-top:1px solid #999999;"></td>
                <td class="total" style="border-top:1px solid #999999;"></td>
                <td class="total" style="border-top:1px solid #999999;">
                    <div class="total-price"> <span class="WebRupee">$ </span> <?php echo ceil(max(($sum-$coupon_res[0]['coupon_value']),0)); ?> </div>
                </td>
                <td class="total"></td>
            </tr>
			<?php }?>
          </table>          
          <div style="clear:both;">&nbsp;</div>
        </form>
      </div>
      <!-- .block_content ends -->
      
      <div class="bendl"></div>
      <div class="bendr"></div>
    </div>
    <?php } else 
			{ 
			   $current = Removemsg(selfURL());
				$currenturl = site_Encryption($current);
				$recordperpage = 10;
				if (isset($_REQUEST['page'])) {
						$page = $_REQUEST['page'];
						$s1 = $page * $recordperpage - $recordperpage;
						$s2 = $recordperpage;
				} else {
						$s1 = 0;
						$s2 = $recordperpage;
				}
				$sqlcpont="SELECT count(orderid) AS `countno` FROM `orderdetail` ";
				$count = $obj_db->select($sqlcpont);
			  
			  $sql="SELECT *,DATE_FORMAT(`date`,'%d-%m-%Y') AS `cdate` FROM `orderdetail`  ORDER BY `orderid` DESC LIMIT $s1,$s2";
			  $result=$obj_db->select($sql);
			?>
    <div class="block">
      <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        <h2><?php echo $title; ?></h2>        
      </div>
      <!-- .block_head ends -->
      
      <div class="block_content">
        <?php if($_REQUEST['msg']=="added") {
			echo '<div class="message success" style="display: block;"><p>Record Added Successfully.</p></div>';
			}
			if($_REQUEST['msg']=="updated") {
				echo '<div class="message success" style="display: block;"><p> Record Updated Successfully. </p></div>';
			}
			if($_REQUEST['msg']=="deleted") {
				echo '<div class="message errormsg" style="display: block;"><p>Record Deleted Successfully. </p></div>';
			}
			if($_REQUEST['msg']=="2") {
				echo '<div class="message errormsg" style="display: block;"><p>Email Alredy Exist. </p></div>';
			}
		?>
        <table class="adminlist" cellpadding="3" cellspacing="1" width="100%">
          <tr>
            <td class="gridheaderbg" width="50px"> # </td>
            <td class="gridheaderbg"><strong>Name</strong></td>
            <td class="gridheaderbg" width="250px"><strong>Email</strong></td>
            <td class="gridheaderbg" width="150px"><strong>Phone</strong></td>
            <td class="gridheaderbg" width="110px"><strong>Payment Status</strong></td>
            <td class="gridheaderbg" width="100px"><strong>Order Date</strong></td>            
            <td class="gridheaderbg" width="30px"><strong>#</strong></td>
          </tr>
          <?php for($i=0;$i<count($result); $i++) { ?>
          <script>
				$(document).ready(function(){
					$("a[rel='viewimahe<?php echo $i; ?>']").colorbox({slideshow:true});
				});
			</script>
          <tr class="row0">
            <td class="nrlbg<?php echo ($i & 1); ?>" ><?php  if(isset($_REQUEST['page'])){ echo  ($recordperpage*($_REQUEST['page']-1))+$i+1; } else { echo $i+1; } ?></td>
            <td class="nrlbg<?php echo ($i & 1); ?>" ><?php echo $result[$i]['shippingfirstname']." ".$result[$i]['lastname']; ?></td>
            <td class="nrlbg<?php echo ($i & 1); ?>" ><?php echo $result[$i]['email']; ?></td>
            <td class="nrlbg<?php echo ($i & 1); ?>" ><?php echo $result[$i]['shtelephone']; ?></td>
            <td class="nrlbg<?php echo ($i & 1); ?>"><?php echo ucfirst($result[$i]['status']); ?></td>
            <td class="nrlbg<?php echo ($i & 1); ?>"><?php echo $result[$i]['cdate']?></td>
            <td class="nrlbg<?php echo ($i & 1); ?>" style="white-space:nowrap;"><a href="order.php?id=<?php echo $result[$i]['orderid'].$condition; ?>"><img src="images/edit.png" /></a></td>
          </tr>
          <?php } ?>
        </table>
        <div class="pagination right">
          <?php doPages($recordperpage, Removepage($current) . checkurlconnectergiven(Removepage($current)), "", $count[0]['countno']); ?>
        </div>
      </div>
      <!-- .block_content ends -->
      </div>
      <div class="bendl"></div>
      <div class="bendr"></div>
    </div>
    <?php } ?>
    <?php include("include/footer.php");?>
</body>
</html>
