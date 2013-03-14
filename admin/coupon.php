<?php
include("system/config.inc.php");
include("function/coupon.php");
include("system/paging.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Coupon | <?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body>
<?php include("include/header.php");
		 $current = Removeword(selfURL(),"([m][s][g][=]\w*[&]*)");
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
		$sqlcpont="SELECT count(coupon_id) AS `countno` FROM `coupon` ";
		$count = $obj_db->select($sqlcpont);
		
		$sql="SELECT * FROM `coupon`
				LEFT OUTER JOIN `user` ON
				`coupon`.`coupon_user_id`=`user`.`userid` 
				ORDER BY `coupon`.`coupon_id` DESC LIMIT $s1,$s2";
		$result=$obj_db->select($sql);
?>

	<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>					
                    <h2>Manage Coupons</h2>
                    <ul>
                        <li>
                            <a href="coupon.php?id=addnew">Add New Coupon</a>
                        </li>
                    </ul>
				</div>
				
				<div class="block_content">
					
                    <?php if($_REQUEST['msg']=="added") {
							echo '<div class="message success" style="display: block;"><p>Record Added Sucssesfully.</p></div>';
						}
						if($_REQUEST['msg']=="updated") {
							echo '<div class="message success" style="display: block;"><p> Record Updated Sucssesfully. </p></div>';
						}
						if($_REQUEST['msg']=="deleted") {
							echo '<div class="message errormsg" style="display: block;"><p>Record Deleted Sucssesfully. </p></div>';
						}
						if($_REQUEST['msg']=="1") {
							echo '<div class="message errormsg" style="display: block;"><p>Coupon Code Alredy Exists</p></div>';
						}
						?>

<?php 
		if(isset($_REQUEST['id'])) { ?>        
			<form action="" method="post">
			<?php 
				$user_sql="SELECT * FROM `coupon` WHERE `coupon_id`='".$_REQUEST['id']."' ";
				$user_res=$obj_db->select($user_sql);
			?>
            <script type="text/javascript">
				$(document).ready(function(){
					$(".generate").click(function(){
						
						$.ajax({
							method:"get",
							url: "generatecode.php",							
							success: function(data){
								$("#code").val(data);
							}
						});						
					});
				});
			</script>
			<div style="padding:10px; margin-left:20px;" class="inner" >
				Name :
				<input class="text small" style="width:250px;" type="text" name="cname" value="<?php echo $user_res[0]['coupon_name'] ?>" />
				&nbsp;&nbsp; &nbsp; &nbsp;
                Coupon Value :
				<input class="text small" style="width:100px;" type="text" name="value" value="<?php echo $user_res[0]['coupon_value'] ?>" />
				&nbsp;&nbsp; &nbsp; &nbsp;
				Coupon Code :
				<input class="text small" style="width:140px;" readonly="readonly" id="code" type="text" name="code" value="<?php echo $user_res[0]['coupon_code'] ?>" />
                <a style="cursor:pointer;" class="generate">Generate</a>
				&nbsp;&nbsp;
				<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
				<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
				<input type="submit" name="submit" class="submit small" value="Submit" />
				<a href="coupon.php" title="close">Close</a>
			</div>
		</form>

<?php }  ?>
			<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="totalrow" value="<?php echo $count[0][0]; ?>" />
			    <input type="hidden" name="page" value="<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>" />

                  <table class="adminlist" cellpadding="3" cellspacing="1" width="100%">
                    
                        <tr>
                          <td class="gridheaderbg" width="30"> # </td>
                          <td class="gridheaderbg" width="250px"> <strong>Coupon Name</strong></td>
                          <td class="gridheaderbg" width="200px"> <strong>Coupon Code</strong></td>
                          <td class="gridheaderbg"> <strong>Coupon Value</strong></td>
                          <th class="gridheaderbg" width="10%"><strong>Coupon Created Date</strong></th>
                          <td class="gridheaderbg" width="100"><strong>Coupon Used Date</strong></td>
                          <td class="gridheaderbg" width="100"><strong>User</strong></td>
                          <td class="gridheaderbg" width="100"><strong>Coupon Status</strong></td>
                          <td class="gridheaderbg" width="55"> # </td>
                        </tr>										
                        <?php for($i=0;$i<count($result); $i++) { ?>
                        <tr class="row0">
                        <td class="nrlbg<?php echo ($i & 1); ?>"> <?php  if(isset($_REQUEST['page'])){ echo  ($recordperpage*($_REQUEST['page']-1))+$i+1; } else { echo $i+1; } ?> </td>
                        <td class="nrlbg<?php echo ($i & 1); ?>" nowrap="nowrap"><?php echo $result[$i]['coupon_name']; ?></td>                    
                        <td class="nrlbg<?php echo ($i & 1); ?>" nowrap="nowrap"><?php echo $result[$i]['coupon_code']; ?></td>
                        <td class="nrlbg<?php echo ($i & 1); ?>" nowrap="nowrap">$ <?php echo $result[$i]['coupon_value']; ?></td>
                        <td class="nrlbg<?php echo ($i & 1); ?>" nowrap="nowrap"><?php echo $result[$i]['coupon_created_date']; ?></td>
                        <td class="nrlbg<?php echo ($i & 1); ?>" nowrap="nowrap"><?php echo $result[$i]['coupon_used_date']; ?></td>
                        <td class="nrlbg<?php echo ($i & 1); ?>" nowrap="nowrap"><?php echo $result[$i]['firstname']; ?></td>
                        <td style="text-align:center;"><?php echo ucfirst($result[$i]['coupon_status']); ?></td>	
                        <td class="nrlbg<?php echo ($i & 1); ?>"  style="white-space:nowrap;"><a href="coupon.php?id=<?php echo $result[$i]['coupon_id']; ?>&amp;page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>"><img src="images/edit.png" /></a> &nbsp;&nbsp;&nbsp;<a href="coupon.php?del=<?php echo $result[$i]['coupon_id'] ?>&amp;page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
                       
                    </tr>
                    <?php } ?> 					
					<tr>
						<td colspan="7">
							<div class="pagination right" style="padding-top: 10px;">
								<?php doPages($recordperpage, Removepage($current) . checkurlconnectergiven(Removepage($current)), "", $count[0]['countno']); ?>
							</div>
						</td>
					</tr>

                </table>
        </form>
                                    
        </div>		
        <!-- .block_content ends -->
        <div class="bendl"></div>
        <div class="bendr"></div>
    </div>
    <?php include("include/footer.php");?>
</body>
</html>
