<?php
include("system/config.inc.php");
include("function/producttype.php");
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
<title>Manage Product Type | <?php echo $sitename; ?></title>
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
		$sqlcpont="SELECT count(producttypeid) AS `countno` FROM `producttype` ";
		$count = $obj_db->select($sqlcpont);
		
		$sql="SELECT * FROM `producttype` ORDER BY `producttypeid` DESC LIMIT $s1,$s2";
		$result=$obj_db->select($sql);
?>

<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
							<h2>Manage</h2>
							<ul>
								<li>
									<a href="producttype.php?producttypeid=addnew">Add</a>
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
						?>

<?php 
		if(isset($_REQUEST['producttypeid'])) { ?>
		<form action="" method="post" enctype="multipart/form-data" name="testform">
			<?php 
				$user_sql="SELECT * FROM `producttype` WHERE `producttypeid`='".$_REQUEST['producttypeid']."' ";
				$user_res=$obj_db->select($user_sql);
			?>
			<div style="padding:10px; margin-left:20px;" class="inner" >
				Product Type Name :
				<input class="text small" style="width:250px;" type="text" name="cname" value="<?php echo $user_res[0]['producttypename'] ?>" />
				&nbsp;&nbsp; &nbsp; &nbsp;
				Uniq Name :
				<input class="text small" style="width:250px;" type="text" name="uname" value="<?php echo $user_res[0]['uniqname'] ?>" />
				
				&nbsp;&nbsp;
				Status : 
				Active :<input type="radio"  checked="checked"  name="status" class="nobg" value="active" />
				&nbsp;&nbsp; Inactive :<input type="radio" <?php if($user_res[0]['status']=="inactive") { ?>  checked="checked" <?php } ?> name="status" 		 class="nobg"  value="inactive" />&nbsp;&nbsp;

				<input type="hidden" name="for" value="<?php echo $_REQUEST['for']; ?>" />
				<input type="hidden" name="producttypeid" value="<?php echo $_REQUEST['producttypeid']; ?>" />
				<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
				<input type="submit" name="submit" class="submit small" value="Submit" />
				<a href="producttype.php" title="close">Close</a>
			</div>
		</form>

<?php }  ?>
			<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="totalrow" value="<?php echo $count[0][0]; ?>" />
			    <input type="hidden" name="page" value="<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>" />

                                  <table class="adminlist" cellpadding="3" cellspacing="1" width="100%">
                                    
                                        <tr>
                                          <td class="gridheaderbg" width="30"> # </td>
                                          <td class="gridheaderbg"> <strong>Product Type Name</strong></td>
										  <th class="gridheaderbg" width="10%">Display By</th>
                                      	  <td class="gridheaderbg" width="100">Status</strong></td>
                                          <td class="gridheaderbg" width="55"> # </td>
                                        </tr>
										
                                        <?php for($i=0;$i<count($result); $i++) { ?>
                                        <tr class="row0">
                                          <td class="nrlbg<?php echo ($i & 1); ?>"> <?php  if(isset($_REQUEST['page'])){ echo  ($recordperpage*($_REQUEST['page']-1))+$i+1; } else { echo $i+1; } ?> </td>
                                          <td class="nrlbg<?php echo ($i & 1); ?>" nowrap="nowrap"><?php echo $result[$i]['producttypename']; ?></td>
									
										<td style="text-align:center;">
							<input type="hidden" name="id<?php echo $i; ?>" value="<?php echo $result[$i]['producttypeid'] ?>" />
					        <input type="text" class="text-displayorder-box" name="category<?php echo $i; ?>" value="<?php echo $result[$i]['dispalyorder']; ?>" />
						</td>
									   <td class="nrlbg<?php echo ($i & 1); ?>"><a href="producttype.php?change=<?php echo $result[$i]['producttypeid'].$condition; ?>&status=<?php echo $result[$i]['status']; ?>&amp;page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>"><?php echo ucfirst($result[$i]['status']); ?></a></td>

									  
	
	<td class="nrlbg<?php echo ($i & 1); ?>"  style="white-space:nowrap;"><a href="producttype.php?producttypeid=<?php echo $result[$i]['producttypeid']; ?>&amp;page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>"><img src="images/edit.png" /></a> &nbsp;&nbsp;&nbsp;<a href="producttype.php?del=<?php echo $result[$i]['producttypeid'] ?>&amp;page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
									   
                                            </tr>
                                         <?php } ?> 
					<tr>
						<td colspan="2"></td>
						<td align="center">
							<input class="submit" type="submit" name="changedo" value="OK" />
 						</td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td colspan="7">
							<div class="pagination right" style="padding-top: 10px;">
								<?php doPages($recordperpage, Removepage($current) . checkurlconnectergiven(Removepage($current)), "", $count[0]['countno']); ?>
							</div>
						</td>
					</tr>

                                    </table>
							</form>
                                    
				</div>		<!-- .block_content ends -->
			                <div class="bendl"></div>
                <div class="bendr"></div>
            </div>
              <?php include("include/footer.php");?>
</body>
</html>
